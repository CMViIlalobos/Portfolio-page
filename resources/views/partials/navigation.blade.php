<nav class="fixed w-full z-50 transition-all duration-300 glass border-b border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-24 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center gap-3">
                <div class="w-10 h-10 bg-indigo-600 rounded-lg flex items-center justify-center text-white">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="14" cy="14" r="11" stroke="currentColor" stroke-width="2"/>
                        <path d="M9 14c0-4 2.5-7 5-7" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M10 17l2.2-4h1.6l2.2 4 2.2-4h1.6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <a href="{{ url('/') }}" class="text-xl font-bold text-slate-800 dark:text-white tracking-tight flex items-center gap-2">
                    <span class="text-slate-400 dark:text-slate-500 font-light">|</span> Carlos Miguel
                </a>
            </div>

            <!-- Centered Nav -->
            <div class="hidden md:flex items-center justify-center space-x-8">
                <a href="{{ url('/') }}" 
                   class="{{ request()->is('/') ? 'text-indigo-600 dark:text-white font-semibold' : 'text-slate-700 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-white' }} text-sm font-medium transition-all duration-200">
                    Home
                </a>
                <a href="{{ route('about') }}" 
                   class="{{ request()->routeIs('about') ? 'text-indigo-600 dark:text-white font-semibold' : 'text-slate-700 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-white' }} text-sm font-medium transition-all duration-200">
                    About
                </a>
                <a href="{{ route('projects.index') }}" 
                   class="{{ request()->routeIs('projects.*') ? 'text-indigo-600 dark:text-white font-semibold' : 'text-slate-700 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-white' }} text-sm font-medium transition-all duration-200">
                    Projects
                </a>
                <a href="{{ route('contact') }}" 
                   class="{{ request()->routeIs('contact') ? 'text-indigo-600 dark:text-white font-semibold' : 'text-slate-700 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-white' }} text-sm font-medium transition-all duration-200">
                    Contact
                </a>
            </div>

            <!-- Right Actions -->
            <div class="hidden md:flex items-center gap-6">
                <!-- Dark Mode Toggle -->
                <button @click="darkMode = !darkMode" class="p-2 rounded-full text-slate-500 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-white/10 transition-colors">
                    <!-- Sun Icon -->
                    <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <!-- Moon Icon -->
                    <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                </button>

                <!-- Hire Me Button -->
                <a href="{{ route('contact') }}" class="px-6 py-2.5 rounded bg-indigo-600 text-white font-semibold text-sm hover:bg-indigo-700 transition-all duration-300 shadow-lg shadow-indigo-600/20">
                    Hire Me
                </a>
            </div>
            
            <!-- Mobile menu button -->
            <div class="-mr-2 flex items-center md:hidden gap-4">
                 <!-- Dark Mode Toggle Mobile -->
                 <button @click="darkMode = !darkMode" class="p-2 rounded-full text-slate-500 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-white/10 transition-colors">
                    <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                </button>

                <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-slate-600 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
<div class="h-24"></div> <!-- Spacer for fixed navbar -->