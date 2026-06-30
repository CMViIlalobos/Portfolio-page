@php
    $links = [
        ['label' => 'Home', 'href' => url('/'), 'active' => request()->is('/')],
        ['label' => 'Projects', 'href' => route('projects.index'), 'active' => request()->routeIs('projects.*')],
        ['label' => 'About', 'href' => route('about'), 'active' => request()->routeIs('about')],
        ['label' => 'Contact', 'href' => route('contact'), 'active' => request()->routeIs('contact')],
    ];
@endphp

<nav class="fixed inset-x-0 top-0 z-50 border-b border-black/5 bg-white/78 backdrop-blur-xl dark:border-white/10 dark:bg-slate-950/78" aria-label="Primary navigation">
    <div class="section-wrap">
        <div class="flex h-16 items-center justify-between gap-4">
            <a href="{{ url('/') }}" class="group flex min-w-0 items-center gap-3" aria-label="Carlos Miguel home">
                <span class="grid h-9 w-9 shrink-0 place-items-center rounded-md bg-slate-950 text-xs font-bold text-white shadow-sm shadow-slate-950/10 transition group-hover:-translate-y-0.5 dark:bg-white dark:text-slate-950">CV</span>
                <span class="min-w-0">
                    <span class="block truncate font-display text-sm font-bold text-slate-950 dark:text-white">Carlos Miguel</span>
                    <span class="block truncate text-[0.7rem] font-medium text-slate-500 dark:text-slate-400">Laravel · Flutter · Systems</span>
                </span>
            </a>

            <div class="hidden items-center gap-1 rounded-lg border border-slate-950/10 bg-white/50 p-1 dark:border-white/10 dark:bg-white/5 md:flex">
                @foreach($links as $link)
                    <a href="{{ $link['href'] }}" class="nav-link {{ $link['active'] ? 'active' : '' }}" @if($link['active']) aria-current="page" @endif>
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            <div class="flex items-center gap-2">
                <button
                    type="button"
                    @click="toggleTheme()"
                    class="grid h-9 w-9 place-items-center rounded-md border border-slate-950/10 bg-white/60 text-slate-700 transition hover:border-teal-600 hover:text-teal-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-200 dark:hover:border-teal-300 dark:hover:text-teal-200"
                    aria-label="Toggle color theme"
                >
                    <svg x-show="!darkMode" x-cloak class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.07 6.07-1.42-1.42M7.35 7.35 5.93 5.93m12.14 0-1.42 1.42M7.35 16.65l-1.42 1.42M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/>
                    </svg>
                    <svg x-show="darkMode" x-cloak class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 15.31A8 8 0 1 1 8.69 4 6.5 6.5 0 0 0 20 15.31Z"/>
                    </svg>
                </button>
                <a href="{{ route('contact') }}" class="hidden btn-primary px-3.5 py-2 text-sm lg:inline-flex" data-magnetic>Hire me</a>
            </div>
        </div>

        <div class="flex gap-2 overflow-x-auto border-t border-slate-950/10 py-2 dark:border-white/10 md:hidden">
            @foreach($links as $link)
                <a href="{{ $link['href'] }}" class="mobile-nav-link {{ $link['active'] ? 'active' : '' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</nav>

<div class="h-28 md:h-16"></div>
