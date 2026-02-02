<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" :class="{ 'dark': darkMode }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Carlos Miguel S. Villalobos - Full-Stack Developer Portfolio">
    
    <title>@yield('title', 'Carlos Miguel S. Villalobos') | Portfolio</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Vite for Tailwind v3 -->
    @if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="/build/assets/app.css">
        <script type="module" src="/build/assets/app.js"></script>
    @endif
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        .dark .glass {
            background: rgba(3, 7, 18, 0.8);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .text-glow {
            text-shadow: 0 0 30px rgba(99, 102, 241, 0.3);
        }
    </style>
    
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
</head>
<body class="antialiased bg-slate-50 text-slate-900 dark:bg-[#030712] dark:text-slate-300 selection:bg-indigo-500/30 selection:text-indigo-600 dark:selection:text-indigo-200 transition-colors duration-300">
    <!-- Dark Mode Background -->
    <div class="fixed inset-0 z-[-1] bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-[#0f172a] via-[#030712] to-black opacity-0 dark:opacity-100 transition-opacity duration-300"></div>
    
    <!-- Light Mode Background -->
    <div class="fixed inset-0 z-[-1] bg-gradient-to-br from-indigo-50 via-white to-slate-100 opacity-100 dark:opacity-0 transition-opacity duration-300"></div>
    
    <!-- Noise Texture (Global) -->
    <div class="fixed inset-0 z-[-1] opacity-20 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] brightness-100 contrast-150 mix-blend-overlay pointer-events-none"></div>

    @include('partials.navigation')
    
    <main class="relative z-10 min-h-screen">
        @yield('content')
    </main>
    
    @include('partials.footer')
    
    @stack('scripts')
</body>
</html>