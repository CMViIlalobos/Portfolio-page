import './bootstrap';

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

function initReveals() {
    const revealItems = document.querySelectorAll('[data-reveal]');

    if (!revealItems.length) {
        return;
    }

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
        threshold: 0.18,
    });

    revealItems.forEach((item) => observer.observe(item));
}

function initBrowserShowcase() {
    const showcase = document.querySelector('[data-browser-showcase]');

    if (!showcase || prefersReducedMotion.matches) {
        return;
    }

    const panels = showcase.querySelectorAll('.film-panel, .film-project-card');

    showcase.addEventListener('pointermove', (event) => {
        const rect = showcase.getBoundingClientRect();
        const x = ((event.clientX - rect.left) / rect.width - 0.5) * 2;
        const y = ((event.clientY - rect.top) / rect.height - 0.5) * 2;

        showcase.style.setProperty('--tilt-x', `${(-y * 0.8).toFixed(2)}deg`);
        showcase.style.setProperty('--tilt-y', `${(x * 0.9).toFixed(2)}deg`);

        panels.forEach((panel, index) => {
            const depth = (index % 3 + 1) * 2.4;
            panel.style.transform = `translate3d(${(x * depth).toFixed(2)}px, ${(y * depth * 0.55).toFixed(2)}px, 0)`;
        });
    });

    showcase.addEventListener('pointerleave', () => {
        showcase.style.removeProperty('--tilt-x');
        showcase.style.removeProperty('--tilt-y');
        panels.forEach((panel) => {
            panel.style.transform = '';
        });
    });
}

initReveals();
initBrowserShowcase();
