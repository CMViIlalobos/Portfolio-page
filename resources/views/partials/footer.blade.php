<footer class="relative z-10 border-t border-slate-950/10 bg-white/45 py-12 dark:border-white/10 dark:bg-slate-950/55">
    <div class="section-wrap">
        <div class="flex flex-col gap-8 md:flex-row md:items-end md:justify-between">
            <div class="max-w-2xl">
                <p class="eyebrow mb-3">Available for focused builds</p>
                <h2 class="font-display text-3xl font-extrabold text-slate-950 dark:text-white md:text-4xl">Laravel systems, mobile workflows, and dashboards that feel calm under pressure.</h2>
            </div>
            <a href="{{ route('contact') }}" class="btn-primary shrink-0">Contact Carlos</a>
        </div>

        <div class="mt-10 grid gap-6 border-t border-slate-950/10 pt-8 text-sm text-slate-600 dark:border-white/10 dark:text-slate-400 md:grid-cols-3">
            <div>
                <div class="font-display text-base font-extrabold text-slate-950 dark:text-white">Carlos Miguel S. Villalobos</div>
                <p class="mt-2 max-w-sm">Full-stack developer building portfolio-grade products for family care, HR operations, and public-service workflows.</p>
            </div>
            <div class="md:text-center">
                <p class="font-bold text-slate-950 dark:text-white">Reach me</p>
                <p class="mt-2">villaloboscarlosmiguel@gmail.com</p>
                <p>0908-592-9220</p>
            </div>
            <div class="flex gap-3 md:justify-end">
                <a href="https://www.facebook.com/vcarlosmiguel19" target="_blank" class="rounded-md border border-slate-950/10 px-4 py-2 font-bold text-slate-700 transition hover:border-teal-600 hover:text-teal-700 dark:border-white/10 dark:text-slate-300 dark:hover:border-teal-300 dark:hover:text-teal-200">Facebook</a>
                <a href="https://www.instagram.com/villaloboscarll/" target="_blank" class="rounded-md border border-slate-950/10 px-4 py-2 font-bold text-slate-700 transition hover:border-teal-600 hover:text-teal-700 dark:border-white/10 dark:text-slate-300 dark:hover:border-teal-300 dark:hover:text-teal-200">Instagram</a>
            </div>
        </div>

        <p class="mt-8 text-xs font-semibold uppercase tracking-[0.16em] text-slate-400">&copy; {{ date('Y') }} Carlos Miguel. Designed and built with Laravel.</p>
    </div>
</footer>
