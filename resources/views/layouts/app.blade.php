<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    @php
        $siteTitle = trim($__env->yieldContent('title', 'Carlos Miguel S. Villalobos'));
        $pageDescription = trim($__env->yieldContent('description', 'Carlos Miguel S. Villalobos developer portfolio for Laravel, Flutter, dashboards, workflow systems, APIs, and full-stack product work.'));
        $canonical = url()->current();
        $ogImage = asset('project-assets/hris-dashboard.png');
    @endphp
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="theme-color" content="#f3ede3">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ $canonical }}">

    <title>{{ $siteTitle }} | Portfolio</title>

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Carlos Miguel S. Villalobos Portfolio">
    <meta property="og:title" content="{{ $siteTitle }} | Portfolio">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $siteTitle }} | Portfolio">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;600&family=Shippori+Mincho:wght@500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@type": "Person",
            "name": "Carlos Miguel S. Villalobos",
            "email": "mailto:villaloboscarlosmiguel@gmail.com",
            "telephone": "+63 908 592 9220",
            "jobTitle": "Full-stack Developer",
            "url": "{{ url('/') }}",
            "sameAs": [
                "https://www.facebook.com/vcarlosmiguel19",
                "https://www.instagram.com/villaloboscarll/"
            ],
            "knowsAbout": [
                "Laravel",
                "Flutter",
                "MySQL",
                "Tailwind CSS",
                "REST APIs",
                "Workflow systems",
                "Dashboards"
            ]
        }
    </script>
</head>
<body
    class="page-shell antialiased"
>
    <div class="scroll-progress" data-scroll-progress aria-hidden="true"></div>
    <div class="ambient-grid pointer-events-none fixed inset-0 z-0"></div>
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[80] focus:rounded-md focus:bg-white focus:px-4 focus:py-3 focus:text-sm focus:font-extrabold focus:text-slate-950">
        Skip to content
    </a>

    @include('partials.navigation')

    <main id="main-content" class="page-transition relative z-10 min-h-screen">
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>
</html>
