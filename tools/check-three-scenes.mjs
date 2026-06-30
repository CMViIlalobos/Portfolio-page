import { writeFile } from 'node:fs/promises';

const chrome = 'http://127.0.0.1:9222';
const pages = [
    { name: 'home-desktop', url: 'http://127.0.0.1:8000/', width: 1366, height: 900 },
    { name: 'home-mobile', url: 'http://127.0.0.1:8000/', width: 390, height: 844 },
    { name: 'about-desktop', url: 'http://127.0.0.1:8000/about', width: 1366, height: 900 },
    { name: 'projects-desktop', url: 'http://127.0.0.1:8000/projects', width: 1366, height: 900 },
    { name: 'contact-mobile', url: 'http://127.0.0.1:8000/contact', width: 390, height: 844 },
];

const version = await fetch(`${chrome}/json/version`).then((response) => response.json());
const socket = new WebSocket(version.webSocketDebuggerUrl);
let nextId = 1;
const pending = new Map();
const sessionEvents = new Map();

socket.addEventListener('message', (event) => {
    const message = JSON.parse(event.data);

    if (message.id && pending.has(message.id)) {
        pending.get(message.id)(message);
        pending.delete(message.id);
        return;
    }

    if (message.sessionId && sessionEvents.has(message.sessionId)) {
        sessionEvents.get(message.sessionId).push(message);
    }
});

await new Promise((resolve) => socket.addEventListener('open', resolve, { once: true }));

function send(method, params = {}, sessionId = undefined) {
    const id = nextId;
    nextId += 1;

    socket.send(JSON.stringify({
        id,
        method,
        params,
        ...(sessionId ? { sessionId } : {}),
    }));

    return new Promise((resolve, reject) => {
        pending.set(id, (message) => {
            if (message.error) {
                reject(new Error(`${method}: ${message.error.message}`));
                return;
            }

            resolve(message.result);
        });
    });
}

async function sleep(ms) {
    await new Promise((resolve) => setTimeout(resolve, ms));
}

async function waitForLoad(sessionId) {
    for (let i = 0; i < 50; i += 1) {
        const events = sessionEvents.get(sessionId) ?? [];

        if (events.some((event) => event.method === 'Page.loadEventFired')) {
            return;
        }

        await sleep(100);
    }
}

const expression = `(() => {
    const canvases = [...document.querySelectorAll('[data-three-scene] canvas')];

    return canvases.map((canvas, index) => {
        const width = canvas.width;
        const height = canvas.height;
        const rect = canvas.getBoundingClientRect();
        const probe = document.createElement('canvas');
        const probeSize = 24;
        probe.width = probeSize;
        probe.height = probeSize;
        const context = probe.getContext('2d', { willReadFrequently: true });
        context.drawImage(canvas, 0, 0, probeSize, probeSize);
        const data = context.getImageData(0, 0, probeSize, probeSize).data;
        let colored = 0;
        let alpha = 0;

        for (let i = 0; i < data.length; i += 4) {
            const r = data[i];
            const g = data[i + 1];
            const b = data[i + 2];
            const a = data[i + 3];

            if (a > 12) {
                alpha += 1;
            }

            if (a > 12 && Math.abs(r - g) + Math.abs(g - b) + Math.abs(r - b) > 18) {
                colored += 1;
            }
        }

        return {
            index,
            width,
            height,
            rectWidth: Math.round(rect.width),
            rectHeight: Math.round(rect.height),
            alpha,
            colored,
            ok: width > 0 && height > 0 && rect.width > 80 && rect.height > 80 && colored > 8,
        };
    });
})()`;

const results = [];

for (const page of pages) {
    const { targetId } = await send('Target.createTarget', { url: 'about:blank' });
    const { sessionId } = await send('Target.attachToTarget', { targetId, flatten: true });
    sessionEvents.set(sessionId, []);

    await send('Page.enable', {}, sessionId);
    await send('Runtime.enable', {}, sessionId);
    await send('Log.enable', {}, sessionId);
    await send('Emulation.setDeviceMetricsOverride', {
        width: page.width,
        height: page.height,
        deviceScaleFactor: page.width < 500 ? 2 : 1,
        mobile: page.width < 500,
    }, sessionId);
    await send('Page.navigate', { url: page.url }, sessionId);
    await waitForLoad(sessionId);
    await sleep(2200);

    const evaluation = await send('Runtime.evaluate', {
        expression,
        returnByValue: true,
    }, sessionId);
    const diagnostics = await send('Runtime.evaluate', {
        expression: `({
            readyState: document.readyState,
            scripts: [...document.scripts].map((script) => script.src).filter(Boolean),
            revealClass: document.querySelector('[data-reveal]')?.className ?? null,
            resources: performance.getEntriesByType('resource').map((entry) => entry.name).filter((name) => name.includes('/build/') || name.includes('517')),
        })`,
        returnByValue: true,
    }, sessionId);
    const canvases = evaluation.result.value;
    const screenshot = await send('Page.captureScreenshot', { format: 'png', fromSurface: true }, sessionId);
    const screenshotPath = `/tmp/${page.name}-three-check.png`;
    await writeFile(screenshotPath, Buffer.from(screenshot.data, 'base64'));
    await send('Target.closeTarget', { targetId });

    results.push({
        ...page,
        screenshotPath,
        canvases,
        diagnostics: diagnostics.result.value,
        events: (sessionEvents.get(sessionId) ?? [])
            .filter((event) => ['Runtime.exceptionThrown', 'Log.entryAdded'].includes(event.method))
            .map((event) => event.params),
        ok: canvases.length > 0 && canvases.every((canvas) => canvas.ok),
    });
}

socket.close();

console.log(JSON.stringify(results, null, 2));

if (results.some((result) => !result.ok)) {
    process.exitCode = 1;
}
