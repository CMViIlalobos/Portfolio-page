@php
    $links = [
        ['label' => 'Home', 'href' => url('/'), 'active' => request()->is('/')],
        ['label' => 'Work', 'href' => route('projects.index'), 'active' => request()->routeIs('projects.*')],
        ['label' => 'About', 'href' => route('about'), 'active' => request()->routeIs('about')],
        ['label' => 'Contact', 'href' => route('contact'), 'active' => request()->routeIs('contact')],
    ];
@endphp

<nav class="site-nav fixed inset-x-0 top-0 z-50" aria-label="Primary navigation">
    <div class="section-wrap">
        <div class="topbar-inner">
            <a href="{{ url('/') }}" class="mark" aria-label="Carlos Miguel home">
                Carl Villalobos
            </a>

            <div class="nav-links">
                @foreach($links as $link)
                    <a href="{{ $link['href'] }}" class="nav-link {{ $link['active'] ? 'active' : '' }}" @if($link['active']) aria-current="page" @endif>
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            <span class="seal" aria-hidden="true">CV</span>
        </div>
    </div>
</nav>

<div class="nav-spacer"></div>
