<nav class="fixed inset-x-0 top-0 z-50 border-b border-slate-950/10 bg-white/[0.76] shadow-sm shadow-slate-950/[0.03] backdrop-blur-2xl dark:border-white/10 dark:bg-slate-950/[0.72]">
    <div class="section-wrap">
        <div class="flex h-20 items-center justify-between gap-5">
            <a href="{{ url('/') }}" class="group flex min-w-0 items-center gap-3" aria-label="Carlos Miguel home">
                <span class="grid h-10 w-10 shrink-0 place-items-center rounded-md bg-slate-950 text-sm font-black text-white shadow-lg shadow-slate-950/10 transition group-hover:bg-teal-700 dark:bg-white dark:text-slate-950 dark:group-hover:bg-teal-200">CV</span>
                <span class="min-w-0">
                    <span class="block truncate font-display text-sm font-extrabold text-slate-950 dark:text-white">Carlos Miguel</span>
                    <span class="block truncate text-xs font-semibold text-slate-500 dark:text-slate-400">Product-minded full-stack</span>
                </span>
            </a>

            <div class="hidden items-center gap-1 rounded-md border border-slate-950/10 bg-white/60 p-1 shadow-sm dark:border-white/10 dark:bg-white/5 md:flex">
                <a href="{{ url('/') }}" class="rounded px-4 py-2 text-sm font-bold transition {{ request()->is('/') ? 'bg-slate-950 text-white dark:bg-white dark:text-slate-950' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950 dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white' }}">Home</a>
                <a href="{{ route('projects.index') }}" class="rounded px-4 py-2 text-sm font-bold transition {{ request()->routeIs('projects.*') ? 'bg-slate-950 text-white dark:bg-white dark:text-slate-950' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950 dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white' }}">Projects</a>
                <a href="{{ route('about') }}" class="rounded px-4 py-2 text-sm font-bold transition {{ request()->routeIs('about') ? 'bg-slate-950 text-white dark:bg-white dark:text-slate-950' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950 dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white' }}">About</a>
                <a href="{{ route('contact') }}" class="rounded px-4 py-2 text-sm font-bold transition {{ request()->routeIs('contact') ? 'bg-slate-950 text-white dark:bg-white dark:text-slate-950' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950 dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white' }}">Contact</a>
            </div>

            <div class="flex items-center gap-2">
                <span class="hidden items-center gap-2 rounded-md border border-teal-700/20 bg-teal-50 px-3 py-2 text-xs font-extrabold text-teal-800 dark:border-teal-300/20 dark:bg-teal-300/10 dark:text-teal-100 lg:inline-flex">
                    <span class="h-2 w-2 rounded-full bg-teal-500"></span>
                    Available for builds
                </span>
                <button @click="darkMode = !darkMode" class="grid h-10 w-10 place-items-center rounded-md border border-slate-950/10 bg-white/60 text-slate-700 transition hover:border-slate-950/30 hover:bg-white dark:border-white/10 dark:bg-white/5 dark:text-slate-200 dark:hover:border-white/30" aria-label="Toggle color theme">
                    <svg x-show="!darkMode" x-cloak class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.07 6.07-1.42-1.42M7.35 7.35 5.93 5.93m12.14 0-1.42 1.42M7.35 16.65l-1.42 1.42M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/></svg>
                    <svg x-show="darkMode" x-cloak class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 15.31A8 8 0 1 1 8.69 4 6.5 6.5 0 0 0 20 15.31Z"/></svg>
                </button>
                <a href="{{ route('contact') }}" class="hidden rounded-md bg-teal-600 px-4 py-2.5 text-sm font-extrabold text-white transition hover:-translate-y-0.5 hover:bg-slate-950 dark:bg-teal-300 dark:text-slate-950 dark:hover:bg-white sm:inline-flex">Start a project</a>
            </div>
        </div>
        <div class="flex gap-2 overflow-x-auto border-t border-slate-950/10 py-2 dark:border-white/10 md:hidden">
            <a href="{{ url('/') }}" class="shrink-0 rounded px-3 py-1.5 text-xs font-extrabold {{ request()->is('/') ? 'bg-slate-950 text-white dark:bg-white dark:text-slate-950' : 'text-slate-600 dark:text-slate-300' }}">Home</a>
            <a href="{{ route('projects.index') }}" class="shrink-0 rounded px-3 py-1.5 text-xs font-extrabold {{ request()->routeIs('projects.*') ? 'bg-slate-950 text-white dark:bg-white dark:text-slate-950' : 'text-slate-600 dark:text-slate-300' }}">Projects</a>
            <a href="{{ route('about') }}" class="shrink-0 rounded px-3 py-1.5 text-xs font-extrabold {{ request()->routeIs('about') ? 'bg-slate-950 text-white dark:bg-white dark:text-slate-950' : 'text-slate-600 dark:text-slate-300' }}">About</a>
            <a href="{{ route('contact') }}" class="shrink-0 rounded px-3 py-1.5 text-xs font-extrabold {{ request()->routeIs('contact') ? 'bg-slate-950 text-white dark:bg-white dark:text-slate-950' : 'text-slate-600 dark:text-slate-300' }}">Contact</a>
        </div>
    </div>
</nav>

<div class="h-32 md:h-20"></div>
