<footer class="relative z-10 border-t border-slate-950/10 bg-white/45 py-10 dark:border-white/10 dark:bg-slate-950/45">
    <div class="section-wrap">
        <div class="footer-cta" data-reveal>
            <div>
                <p class="eyebrow">Available for focused builds</p>
                <h2 class="mt-4 font-display text-2xl font-bold leading-tight text-slate-950 dark:text-white md:text-3xl">
                    Clean systems, thoughtful interfaces, reliable delivery.
                </h2>
            </div>
            <a href="{{ route('contact') }}" class="btn-primary shrink-0" data-magnetic>Start a conversation</a>
        </div>

        <div class="mt-8 grid gap-6 text-sm text-slate-600 dark:text-slate-400 md:grid-cols-3">
            <div>
                <div class="font-display text-sm font-bold text-slate-950 dark:text-white">Carlos Miguel S. Villalobos</div>
                <p class="mt-2 max-w-sm">Developer portfolio for Laravel systems, Flutter apps, dashboards, workflow automation, and full-stack product work.</p>
            </div>
            <div class="md:text-center">
                <p class="font-bold text-slate-950 dark:text-white">Reach me</p>
                <p class="mt-2">
                    <a class="hover:text-teal-700 dark:hover:text-teal-200" href="mailto:villaloboscarlosmiguel@gmail.com">villaloboscarlosmiguel@gmail.com</a>
                </p>
                <p>
                    <a class="hover:text-teal-700 dark:hover:text-teal-200" href="tel:+639085929220">0908-592-9220</a>
                </p>
            </div>
            <div class="flex flex-wrap gap-3 md:justify-end">
                <a href="https://www.facebook.com/vcarlosmiguel19" target="_blank" rel="noopener" class="btn-secondary px-4 py-2">Facebook</a>
                <a href="https://www.instagram.com/villaloboscarll/" target="_blank" rel="noopener" class="btn-secondary px-4 py-2">Instagram</a>
            </div>
        </div>

        <p class="mt-8 text-xs font-bold uppercase tracking-[0.16em] text-slate-400">&copy; {{ date('Y') }} Carlos Miguel. Built with Laravel, Blade, Tailwind, and focused motion.</p>
    </div>
</footer>
