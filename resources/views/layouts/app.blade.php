<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" :class="{ 'dark': darkMode }" x-init="$watch('darkMode', value => localStorage.setItem('darkMode', value))">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Carlos Miguel S. Villalobos - full-stack developer portfolio for Laravel, Flutter, HRIS, ORAS, and product dashboards.">

    <title>@yield('title', 'Carlos Miguel S. Villalobos') | Portfolio</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Sora:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
</head>
<body class="page-shell antialiased text-slate-950 transition-colors duration-300 dark:text-slate-100">
    <div class="mesh-grid pointer-events-none fixed inset-0 z-0"></div>

    @include('partials.navigation')

    <main class="relative z-10 min-h-screen">
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>
</html>
