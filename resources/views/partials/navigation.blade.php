@php
    $links = [
        ['label' => 'Home', 'href' => url('/'), 'active' => request()->is('/')],
        ['label' => 'Work', 'href' => route('projects.index'), 'active' => request()->routeIs('projects.*')],
        ['label' => 'About', 'href' => route('about'), 'active' => request()->routeIs('about')],
        ['label' => 'Contact', 'href' => route('contact'), 'active' => request()->routeIs('contact')],
    ];
@endphp

<nav class="site-nav fixed inset-x-0 top-0 z-50" aria-label="Primary navigation" x-data="{ open: false }" @keydown.escape.window="open = false">
    <div class="section-wrap">
        <div class="topbar-inner">
            <a href="{{ url('/') }}" class="mark" aria-label="Carlos Miguel home">
                Carl Villalobos
            </a>

            <button
                type="button"
                class="mobile-menu-toggle"
                aria-controls="mobile-primary-navigation"
                :aria-expanded="open.toString()"
                @click="open = !open"
            >
                <span class="mobile-menu-toggle__icon" aria-hidden="true">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
                <span>Menu</span>
            </button>

            <div class="nav-links" aria-label="Desktop navigation">
                @foreach($links as $link)
                    <a href="{{ $link['href'] }}" class="nav-link {{ $link['active'] ? 'active' : '' }}" @if($link['active']) aria-current="page" @endif>
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            <span class="seal" aria-hidden="true">CV</span>
        </div>

        <div
            id="mobile-primary-navigation"
            class="mobile-nav-panel"
            x-cloak
            x-show="open"
            x-transition.opacity.duration.160ms
            @click.outside="open = false"
        >
            @foreach($links as $link)
                <a href="{{ $link['href'] }}" class="mobile-nav-link {{ $link['active'] ? 'active' : '' }}" @click="open = false" @if($link['active']) aria-current="page" @endif>
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</nav>

<div class="nav-spacer"></div>
