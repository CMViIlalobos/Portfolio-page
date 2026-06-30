import './bootstrap';

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
let THREE;

function initReveals() {
    const revealItems = document.querySelectorAll('[data-reveal]');

    if (!revealItems.length) {
        return;
    }

    revealItems.forEach((item) => item.classList.add('reveal'));

    if (prefersReducedMotion.matches || !('IntersectionObserver' in window)) {
        revealItems.forEach((item) => item.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        rootMargin: '0px 0px -12% 0px',
        threshold: 0.16,
    });

    revealItems.forEach((item) => observer.observe(item));
}

function initScrollProgress() {
    const progress = document.querySelector('[data-scroll-progress]');

    if (!progress) {
        return;
    }

    const update = () => {
        const scrollable = document.documentElement.scrollHeight - window.innerHeight;
        const ratio = scrollable > 0 ? window.scrollY / scrollable : 0;
        progress.style.transform = `scaleX(${Math.min(Math.max(ratio, 0), 1)})`;
    };

    update();
    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update);
}

function initMagneticTargets() {
    if (prefersReducedMotion.matches) {
        return;
    }

    document.querySelectorAll('[data-magnetic]').forEach((target) => {
        target.classList.add('magnetic');

        target.addEventListener('pointermove', (event) => {
            const rect = target.getBoundingClientRect();
            const x = event.clientX - rect.left - rect.width / 2;
            const y = event.clientY - rect.top - rect.height / 2;
            target.style.transform = `translate(${x * 0.08}px, ${y * 0.12}px)`;
        });

        target.addEventListener('pointerleave', () => {
            target.style.transform = '';
        });
    });
}

function initPageTransitions() {
    if (prefersReducedMotion.matches) {
        return;
    }

    document.querySelectorAll('a[href]').forEach((link) => {
        const href = link.getAttribute('href');
        const target = link.getAttribute('target');

        if (!href || href.startsWith('#') || href.startsWith('mailto:') || href.startsWith('tel:') || target === '_blank') {
            return;
        }

        link.addEventListener('click', (event) => {
            const destination = new URL(href, window.location.href);

            if (destination.origin !== window.location.origin) {
                return;
            }

            event.preventDefault();
            document.body.classList.add('is-leaving');

            window.setTimeout(() => {
                window.location.href = destination.href;
            }, 150);
        });
    });
}

function initHeroTilt() {
    const hero = document.querySelector('[data-hero-tilt]');

    if (!hero || prefersReducedMotion.matches) {
        return;
    }

    hero.addEventListener('pointermove', (event) => {
        const rect = hero.getBoundingClientRect();
        const x = ((event.clientX - rect.left) / rect.width - 0.5) * 2;
        const y = ((event.clientY - rect.top) / rect.height - 0.5) * 2;
        hero.style.setProperty('--tilt', `perspective(1100px) rotateX(${(-y * 2).toFixed(2)}deg) rotateY(${(x * 2.4).toFixed(2)}deg)`);
    });

    hero.addEventListener('pointerleave', () => {
        hero.style.removeProperty('--tilt');
    });
}

function createMaterial(color, roughness = 0.72, metalness = 0.04) {
    return new THREE.MeshStandardMaterial({
        color,
        roughness,
        metalness,
    });
}

function addBox(group, size, position, color, rotation = [0, 0, 0]) {
    const mesh = new THREE.Mesh(
        new THREE.BoxGeometry(size[0], size[1], size[2]),
        createMaterial(color),
    );

    mesh.position.set(position[0], position[1], position[2]);
    mesh.rotation.set(rotation[0], rotation[1], rotation[2]);
    mesh.castShadow = true;
    mesh.receiveShadow = true;
    group.add(mesh);

    return mesh;
}

function addCylinder(group, radiusTop, radiusBottom, height, position, color, rotation = [0, 0, 0], segments = 32) {
    const mesh = new THREE.Mesh(
        new THREE.CylinderGeometry(radiusTop, radiusBottom, height, segments),
        createMaterial(color),
    );

    mesh.position.set(position[0], position[1], position[2]);
    mesh.rotation.set(rotation[0], rotation[1], rotation[2]);
    mesh.castShadow = true;
    mesh.receiveShadow = true;
    group.add(mesh);

    return mesh;
}

function addTorus(group, radius, tube, position, color, rotation = [0, 0, 0]) {
    const mesh = new THREE.Mesh(
        new THREE.TorusGeometry(radius, tube, 36, 96),
        createMaterial(color, 0.55, 0.12),
    );

    mesh.position.set(position[0], position[1], position[2]);
    mesh.rotation.set(rotation[0], rotation[1], rotation[2]);
    mesh.castShadow = true;
    group.add(mesh);

    return mesh;
}

function createStudioScene(group) {
    addBox(group, [5.4, 0.22, 3.6], [0, -1.18, 0], 0x8edbd2);
    addBox(group, [5.4, 2.8, 0.18], [0, 0.1, -1.72], 0xf4f0ff);
    addBox(group, [0.18, 2.8, 3.6], [-2.7, 0.1, 0], 0xc7b5ff);
    addBox(group, [2.3, 2.8, 0.16], [1.55, 0.1, -1.82], 0xf45f9b, [0, -0.08, 0]);
    addBox(group, [2.1, 0.18, 0.86], [0.45, -0.32, -0.35], 0xffffff);
    addBox(group, [0.16, 0.9, 0.16], [-0.42, -0.79, -0.35], 0xe6d6ff);
    addBox(group, [0.16, 0.9, 0.16], [1.25, -0.79, -0.35], 0xe6d6ff);
    addBox(group, [0.9, 0.62, 0.08], [0.3, 0.18, -0.42], 0x12182d, [-0.08, 0, 0]);
    addBox(group, [0.54, 0.08, 0.36], [0.3, -0.2, -0.38], 0xf9a8d4);
    addBox(group, [0.85, 1.05, 0.26], [-1.72, -0.62, -0.62], 0xff8f70);
    addBox(group, [0.62, 0.82, 0.2], [-1.74, -0.28, -0.74], 0x9b8cff);
    addCylinder(group, 0.22, 0.26, 1.25, [1.75, -0.52, -0.95], 0x27c6b2);
    addCylinder(group, 0.16, 0.19, 0.94, [2.05, -0.68, -0.72], 0x14a794, [0.12, 0, 0.2]);
    addBox(group, [0.72, 0.08, 0.22], [0.8, -0.18, 0.04], 0xfacc15, [0, 0.2, 0]);
    addBox(group, [0.72, 0.08, 0.22], [0.78, -0.06, 0.05], 0x60a5fa, [0, 0.2, 0]);
    addTorus(group, 0.18, 0.018, [-1.45, 0.82, -1.58], 0xf472b6, [0.2, 0.4, 0]);
    addTorus(group, 0.18, 0.018, [-1.04, 0.76, -1.58], 0x2dd4bf, [0.6, 0.2, 0.5]);

    const skateboard = new THREE.Group();
    addBox(skateboard, [1.15, 0.08, 0.28], [0, 0, 0], 0xef7fb4, [0, 0, -0.05]);
    addCylinder(skateboard, 0.06, 0.06, 0.1, [-0.4, -0.08, 0.15], 0x111827, [Math.PI / 2, 0, 0]);
    addCylinder(skateboard, 0.06, 0.06, 0.1, [0.4, -0.08, 0.15], 0x111827, [Math.PI / 2, 0, 0]);
    skateboard.position.set(0.45, -1.02, 0.78);
    group.add(skateboard);
}

function createStackScene(group) {
    addBox(group, [4.8, 0.16, 2.8], [0, -1.1, 0], 0xe2f6f2);

    const colors = [0x101827, 0x14b8a6, 0x3b82f6, 0xf59e0b, 0xf472b6, 0x94a3b8];
    for (let i = 0; i < 18; i += 1) {
        const x = (i % 6) * 0.72 - 1.8;
        const z = Math.floor(i / 6) * 0.62 - 0.62;
        const h = 0.24 + (i % 4) * 0.12;
        addBox(group, [0.48, h, 0.48], [x, -0.95 + h / 2, z], colors[i % colors.length]);
    }

    addTorus(group, 1.9, 0.018, [0, 0.32, 0], 0x14b8a6, [Math.PI / 2, 0.4, 0]);
    addTorus(group, 1.25, 0.018, [0, 0.1, 0], 0x60a5fa, [1.2, 0.1, 0.4]);
    addCylinder(group, 0.16, 0.16, 0.16, [-1.7, 0.1, 0.58], 0xf59e0b);
    addCylinder(group, 0.13, 0.13, 0.13, [1.6, 0.22, -0.4], 0x14b8a6);
}

function createPipelineScene(group) {
    addBox(group, [4.7, 0.12, 1.8], [0, -1, 0], 0xf6f7fb);

    for (let i = 0; i < 3; i += 1) {
        const x = i * 1.35 - 1.35;
        addBox(group, [0.78, 0.52, 0.78], [x, -0.5, 0], [0xc7d2fe, 0x99f6e4, 0xfbcfe8][i]);
        if (i < 2) {
            addCylinder(group, 0.035, 0.035, 0.68, [x + 0.67, -0.5, 0], 0x0f172a, [0, 0, Math.PI / 2], 16);
        }
    }

    addTorus(group, 1.7, 0.012, [0, -0.2, 0], 0x14b8a6, [Math.PI / 2, 0, 0]);
}

function createDeskScene(group) {
    addBox(group, [4.8, 0.18, 3], [0, -1.15, 0], 0xe0f2fe);
    addBox(group, [4.8, 2.4, 0.18], [0, -0.05, -1.45], 0xf8fafc);
    addBox(group, [1.8, 0.16, 0.86], [0, -0.42, -0.25], 0xffffff);
    addBox(group, [0.88, 0.64, 0.08], [-0.36, 0.06, -0.32], 0x111827);
    addBox(group, [0.36, 0.08, 0.28], [-0.36, -0.32, -0.3], 0x14b8a6);
    addBox(group, [0.42, 0.74, 0.12], [0.72, -0.14, -0.22], 0x38bdf8, [0, -0.18, 0]);
    addCylinder(group, 0.24, 0.3, 0.84, [1.52, -0.68, -0.74], 0x2dd4bf);
    addTorus(group, 0.5, 0.022, [-1.34, 0.55, -1.36], 0xf472b6, [0.45, 0.2, 0.2]);
    addTorus(group, 0.34, 0.018, [-0.75, 0.45, -1.36], 0x22d3ee, [0.5, 0.4, 0.1]);
}

function createContactScene(group) {
    addBox(group, [4.5, 0.14, 1.8], [0, -1, 0], 0xf8fafc);
    addBox(group, [1.4, 0.82, 0.08], [-0.3, -0.38, 0], 0xffffff);
    addBox(group, [1.1, 0.12, 0.08], [-0.3, -0.18, 0.06], 0x14b8a6);
    addBox(group, [0.76, 0.1, 0.08], [-0.3, -0.38, 0.06], 0x94a3b8);
    addBox(group, [0.96, 0.1, 0.08], [-0.3, -0.58, 0.06], 0x60a5fa);
    addTorus(group, 0.86, 0.018, [0.8, -0.33, 0], 0x14b8a6, [Math.PI / 2, 0, 0]);
    addTorus(group, 1.18, 0.012, [0.8, -0.33, 0], 0x60a5fa, [Math.PI / 2, 0, 0]);
    addCylinder(group, 0.12, 0.12, 0.12, [0.8, -0.33, 0.06], 0xf59e0b);
}

function createProjectsScene(group) {
    addBox(group, [5, 0.16, 3], [0, -1.14, 0], 0xf8fafc);
    for (let i = 0; i < 9; i += 1) {
        const x = (i % 3) * 1.18 - 1.18;
        const z = Math.floor(i / 3) * 0.8 - 0.8;
        const color = [0x111827, 0x14b8a6, 0x60a5fa, 0xf59e0b, 0xf472b6][i % 5];
        addBox(group, [0.84, 0.58, 0.08], [x, -0.55, z], color, [-0.12, 0.18 - i * 0.03, 0]);
    }
    addTorus(group, 1.8, 0.018, [0, -0.2, 0], 0x14b8a6, [1.1, 0.35, 0.1]);
}

function createCaseScene(group) {
    addBox(group, [4.6, 0.16, 2.6], [0, -1.1, 0], 0xe2e8f0);
    addBox(group, [2.8, 1.45, 0.12], [0, -0.25, -0.5], 0xffffff);
    addBox(group, [2.42, 0.16, 0.08], [0, 0.28, -0.42], 0x111827);
    for (let i = 0; i < 6; i += 1) {
        addBox(group, [0.58, 0.32, 0.08], [(i % 3) * 0.78 - 0.78, -0.28 - Math.floor(i / 3) * 0.44, -0.38], i % 2 ? 0x99f6e4 : 0xdbeafe);
    }
    addCylinder(group, 0.12, 0.12, 0.12, [1.75, 0.28, -0.25], 0xf59e0b);
    addTorus(group, 1.55, 0.015, [0, -0.3, 0], 0x60a5fa, [Math.PI / 2, 0.2, 0]);
}

const sceneBuilders = {
    studio: createStudioScene,
    stack: createStackScene,
    pipeline: createPipelineScene,
    desk: createDeskScene,
    contact: createContactScene,
    projects: createProjectsScene,
    case: createCaseScene,
};

async function initThreeScenes() {
    const sceneHosts = document.querySelectorAll('[data-three-scene]');

    if (!sceneHosts.length || prefersReducedMotion.matches) {
        return;
    }

    THREE = await import('three');

    sceneHosts.forEach((host) => {
        const canvas = host.querySelector('canvas');
        const builder = sceneBuilders[host.dataset.threeScene] ?? createStackScene;

        if (!canvas) {
            return;
        }

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(34, 1, 0.1, 100);
        camera.position.set(4.8, 3.1, 5.4);
        camera.lookAt(0, -0.35, 0);

        let renderer;

        try {
            renderer = new THREE.WebGLRenderer({
                canvas,
                antialias: true,
                alpha: true,
                preserveDrawingBuffer: true,
                powerPreference: 'high-performance',
            });
        } catch (error) {
            host.classList.add('three-scene-fallback');
            return;
        }

        renderer.setClearColor(0x000000, 0);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 2));
        renderer.shadowMap.enabled = true;
        renderer.shadowMap.type = THREE.PCFSoftShadowMap;

        const ambient = new THREE.HemisphereLight(0xffffff, 0x94a3b8, 2.2);
        scene.add(ambient);

        const key = new THREE.DirectionalLight(0xffffff, 3.2);
        key.position.set(3.8, 5, 4);
        key.castShadow = true;
        key.shadow.mapSize.width = 1024;
        key.shadow.mapSize.height = 1024;
        scene.add(key);

        const accent = new THREE.PointLight(0x2dd4bf, 2.8, 8);
        accent.position.set(-2.5, 1.5, 2.5);
        scene.add(accent);

        const group = new THREE.Group();
        group.rotation.set(-0.12, -0.42, 0);
        scene.add(group);
        builder(group);
        group.traverse((child) => {
            child.userData.baseY = child.position.y;
        });

        const resize = () => {
            const { width, height } = host.getBoundingClientRect();

            if (width < 1 || height < 1) {
                return;
            }

            camera.aspect = width / height;
            camera.updateProjectionMatrix();
            renderer.setSize(width, height, false);
        };

        let pointerX = 0;
        let pointerY = 0;
        let frameId = 0;
        const clock = new THREE.Clock();

        const animate = () => {
            const elapsed = clock.getElapsedTime();
            group.rotation.y = -0.42 + Math.sin(elapsed * 0.28) * 0.08 + pointerX * 0.16;
            group.rotation.x = -0.12 + Math.sin(elapsed * 0.21) * 0.03 + pointerY * 0.08;
            group.position.y = Math.sin(elapsed * 0.9) * 0.035;

            group.children.forEach((child, index) => {
                if (child instanceof THREE.Mesh || child instanceof THREE.Group) {
                    child.position.y = child.userData.baseY + Math.sin(elapsed * 1.4 + index) * 0.018;
                }
            });

            renderer.render(scene, camera);
            frameId = window.requestAnimationFrame(animate);
        };

        host.addEventListener('pointermove', (event) => {
            const rect = host.getBoundingClientRect();
            pointerX = ((event.clientX - rect.left) / rect.width - 0.5) * 2;
            pointerY = ((event.clientY - rect.top) / rect.height - 0.5) * 2;
        });

        host.addEventListener('pointerleave', () => {
            pointerX = 0;
            pointerY = 0;
        });

        resize();
        animate();

        window.addEventListener('resize', resize);
        window.addEventListener('pagehide', () => {
            window.cancelAnimationFrame(frameId);
            renderer.dispose();
        }, { once: true });
    });
}

initReveals();
initScrollProgress();
initMagneticTargets();
initPageTransitions();
initHeroTilt();
initThreeScenes();
