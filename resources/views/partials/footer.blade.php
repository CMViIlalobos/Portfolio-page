<footer class="relative z-10 border-t border-[rgb(var(--line))] bg-[rgb(var(--panel)/0.38)] py-10">
    <div class="section-wrap">
        <div class="footer-cta" data-reveal>
            <div>
                <p class="eyebrow">Available for focused builds</p>
                <h2 class="mt-4 font-display text-2xl font-bold leading-tight md:text-3xl">
                    Clean systems, thoughtful interfaces, reliable delivery.
                </h2>
            </div>
            <a href="{{ route('contact') }}" class="btn-primary shrink-0" data-magnetic>Start a conversation</a>
        </div>

        <div class="mt-8 grid gap-6 text-sm text-[rgb(var(--muted))] md:grid-cols-3">
            <div>
                <div class="font-display text-sm font-bold text-[rgb(var(--ink))]">Carlos Miguel S. Villalobos</div>
                <p class="mt-2 max-w-sm">Developer portfolio for Laravel systems, Flutter apps, dashboards, workflow automation, and full-stack product work.</p>
            </div>
            <div class="md:text-center">
                <p class="font-bold text-[rgb(var(--ink))]">Reach me</p>
                <p class="mt-2">
                    <a class="hover:text-[rgb(var(--brand))]" href="mailto:villaloboscarlosmiguel@gmail.com">villaloboscarlosmiguel@gmail.com</a>
                </p>
                <p>
                    <a class="hover:text-[rgb(var(--brand))]" href="tel:+639085929220">0908-592-9220</a>
                </p>
            </div>
            <div class="flex flex-wrap gap-3 md:justify-end">
                <a href="https://www.facebook.com/vcarlosmiguel19" target="_blank" rel="noopener" class="social-link" aria-label="Facebook profile">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M14 8.4V6.9c0-.7.3-1.1 1.2-1.1h1.5V3.2A20 20 0 0 0 14.5 3c-2.2 0-3.7 1.3-3.7 3.7v1.7H8.4v3h2.4V21H14v-9.6h2.4l.4-3H14Z"/>
                    </svg>
                    <span>Facebook</span>
                </a>
                <a href="https://www.instagram.com/villaloboscarll/" target="_blank" rel="noopener" class="social-link" aria-label="Instagram profile">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.6 3h8.8A4.6 4.6 0 0 1 21 7.6v8.8a4.6 4.6 0 0 1-4.6 4.6H7.6A4.6 4.6 0 0 1 3 16.4V7.6A4.6 4.6 0 0 1 7.6 3Zm0 2A2.6 2.6 0 0 0 5 7.6v8.8A2.6 2.6 0 0 0 7.6 19h8.8a2.6 2.6 0 0 0 2.6-2.6V7.6A2.6 2.6 0 0 0 16.4 5H7.6Zm8.9 2.1a.9.9 0 1 1 0 1.8.9.9 0 0 1 0-1.8ZM12 8.2a3.8 3.8 0 1 0 0 7.6 3.8 3.8 0 0 0 0-7.6Zm-1.8 3.8a1.8 1.8 0 1 1 3.6 0 1.8 1.8 0 0 1-3.6 0Z" clip-rule="evenodd"/>
                    </svg>
                    <span>Instagram</span>
                </a>
            </div>
        </div>

        <p class="mt-8 text-xs font-bold uppercase tracking-[0.16em] text-[rgb(var(--muted)/0.72)]">&copy; {{ date('Y') }} Carlos Miguel. Built with Laravel, Blade, Tailwind, and focused motion.</p>
    </div>
</footer>
