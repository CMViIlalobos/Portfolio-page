import './bootstrap';

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

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
            target.style.transform = `translate(${x * 0.05}px, ${y * 0.08}px)`;
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
            }, 140);
        });
    });
}

initReveals();
initScrollProgress();
initMagneticTargets();
initPageTransitions();
