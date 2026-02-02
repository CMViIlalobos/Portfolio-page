@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center pt-24 bg-slate-50 dark:bg-black overflow-hidden">
    <!-- Background Gradient -->
    <div class="absolute top-0 right-0 w-[60%] h-[80%] bg-gradient-to-b from-indigo-50/50 to-transparent dark:from-indigo-900/10 dark:to-transparent rounded-bl-[200px] z-0 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="text-left">
                <p class="text-xl font-medium text-slate-700 dark:text-slate-300 mb-4">Hi, I'm Carlos Miguel</p>
                <h1 class="text-5xl lg:text-7xl font-bold text-slate-900 dark:text-white leading-tight mb-6">
                    Creative <br/>
                    <span class="text-indigo-600">Full-Stack</span> Developer
                </h1>
                <p class="text-lg text-slate-700 dark:text-slate-400 mb-10 max-w-lg leading-relaxed">
                    I build modern and responsive web applications using Laravel, Vue.js, and modern tools to help your business grow.
                </p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('projects.index') }}" 
                       class="px-8 py-4 bg-indigo-600 text-white font-bold rounded hover:bg-indigo-700 transition shadow-lg shadow-indigo-600/20">
                        View My Work
                    </a>
                    <a href="{{ route('about') }}" 
                       class="px-8 py-4 bg-transparent border border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white font-bold rounded hover:bg-slate-100 dark:hover:bg-white/5 transition">
                        About Me
                    </a>
                </div>
            </div>

            <!-- Right Image -->
            <div class="relative">
                <div class="relative z-10 rounded-3xl overflow-hidden shadow-2xl border border-slate-200 dark:border-white/10">
                    <img src="https://media.giphy.com/media/qgQUggAC3Pfv687qPC/giphy.gif" 
                         alt="Developer GIF" 
                         class="w-full h-auto object-cover transform hover:scale-105 transition duration-700">
                    
                    <!-- Floating Icons -->
                    <div class="absolute top-10 right-10 p-3 bg-white/10 backdrop-blur-md rounded-xl border border-white/20 animate-bounce shadow-lg">
                        <span class="font-bold text-white text-xs">&lt;/&gt; Code</span>
                    </div>
                    <div class="absolute bottom-20 left-10 p-4 bg-indigo-600/90 backdrop-blur-md rounded-xl shadow-xl border border-white/10 animate-pulse">
                        <span class="font-bold text-white">JS</span>
                    </div>
                    <div class="absolute top-1/2 right-0 p-3 bg-orange-500/90 backdrop-blur-md rounded-xl shadow-xl border border-white/10 transform translate-x-1/2">
                        <span class="font-bold text-white">HTML</span>
                    </div>
                </div>
                <!-- Decorative Elements -->
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-indigo-500/20 rounded-full blur-3xl -z-10"></div>
                <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-blue-500/20 rounded-full blur-3xl -z-10"></div>
            </div>
        </div>
    </div>
</section>

<!-- My Skills Section -->
<section class="py-24 bg-slate-100 dark:bg-[#0B1120]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-12">My Skills</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Skill 1 -->
            <div class="bg-white dark:bg-slate-800/50 p-8 rounded-xl border border-slate-200 dark:border-white/5 flex flex-col items-center justify-center gap-4 hover:-translate-y-2 transition-transform duration-300 shadow-sm hover:shadow-xl dark:shadow-none group">
                <div class="w-16 h-16 bg-orange-100 dark:bg-orange-500/10 rounded-2xl flex items-center justify-center text-orange-600 dark:text-orange-500 group-hover:scale-110 transition-transform">
                    <svg class="w-10 h-10" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.56l-4.07-1.13L6.85 5h10.3l-1.08 11.43L12 17.56zM4.07 3l1.32 14.86L12 21l6.61-3.14L19.93 3H4.07z"/></svg>
                </div>
                <span class="font-bold text-slate-700 dark:text-slate-200">HTML5 & CSS3</span>
            </div>

            <!-- Skill 2 -->
            <div class="bg-white dark:bg-slate-800/50 p-8 rounded-xl border border-slate-200 dark:border-white/5 flex flex-col items-center justify-center gap-4 hover:-translate-y-2 transition-transform duration-300 shadow-sm hover:shadow-xl dark:shadow-none group">
                <div class="w-16 h-16 bg-blue-100 dark:bg-blue-500/10 rounded-2xl flex items-center justify-center text-blue-600 dark:text-blue-500 group-hover:scale-110 transition-transform">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <span class="font-bold text-slate-700 dark:text-slate-200">Responsive Design</span>
            </div>

            <!-- Skill 3 -->
            <div class="bg-white dark:bg-slate-800/50 p-8 rounded-xl border border-slate-200 dark:border-white/5 flex flex-col items-center justify-center gap-4 hover:-translate-y-2 transition-transform duration-300 shadow-sm hover:shadow-xl dark:shadow-none group">
                <div class="w-16 h-16 bg-yellow-100 dark:bg-yellow-500/10 rounded-2xl flex items-center justify-center text-yellow-600 dark:text-yellow-500 group-hover:scale-110 transition-transform">
                    <svg class="w-10 h-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 18l6-6-6-6"/><path d="M8 6l-6 6 6 6"/></svg>
                </div>
                <span class="font-bold text-slate-700 dark:text-slate-200">JS & Vue/React</span>
            </div>

            <!-- Skill 4 -->
            <div class="bg-white dark:bg-slate-800/50 p-8 rounded-xl border border-slate-200 dark:border-white/5 flex flex-col items-center justify-center gap-4 hover:-translate-y-2 transition-transform duration-300 shadow-sm hover:shadow-xl dark:shadow-none group">
                <div class="w-16 h-16 bg-red-100 dark:bg-red-500/10 rounded-2xl flex items-center justify-center text-red-600 dark:text-red-500 group-hover:scale-110 transition-transform">
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                </div>
                <span class="font-bold text-slate-700 dark:text-slate-200">Laravel & PHP</span>
            </div>
        </div>
    </div>
</section>

<!-- Latest Projects Section -->
<section class="py-24 bg-slate-50 dark:bg-black overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
        <div class="flex justify-between items-end">
            <div>
                <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">Latest Projects</h2>
                <p class="text-slate-500 dark:text-slate-400">Some of my recent work</p>
            </div>
            <div class="hidden md:flex gap-2">
                <button class="prev-project p-2 rounded-full border border-slate-200 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-white/5 text-slate-600 dark:text-slate-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button class="next-project p-2 rounded-full border border-slate-200 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-white/5 text-slate-600 dark:text-slate-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>
    </div>

    <div class="relative w-full">
        <div class="projects-scroll-container flex gap-6 overflow-x-auto pb-12 px-4 sm:px-6 lg:px-8 snap-x snap-mandatory scrollbar-hide" style="scrollbar-width: none; -ms-overflow-style: none;">
            @forelse($featuredProjects as $project)
            <div class="min-w-[300px] md:min-w-[400px] snap-center group relative bg-white dark:bg-[#0B1120] rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-slate-200 dark:border-white/5 hover:-translate-y-2">
                <!-- Image Area -->
                <div class="h-64 overflow-hidden relative">
                    @if($project->cover_image)
                    <img src="{{ Str::startsWith($project->cover_image, 'http') ? $project->cover_image : asset('storage/' . $project->cover_image) }}" 
                         alt="{{ $project->title }}" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    @else
                    <div class="w-full h-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center">
                        <span class="text-slate-400">No Image</span>
                    </div>
                    @endif
                    
                    <!-- Overlay Button -->
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <a href="{{ route('projects.show', $project->slug) }}" class="px-6 py-2 bg-indigo-600 text-white rounded font-bold hover:bg-indigo-700 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                            View Project
                        </a>
                    </div>
                </div>
                
                <!-- Bottom Title Bar -->
                <div class="p-4 bg-slate-900 text-white border-t border-slate-800">
                    <h3 class="text-lg font-bold truncate">{{ $project->title }}</h3>
                    <p class="text-slate-400 text-sm truncate">{{ $project->category }}</p>
                </div>
            </div>
            @empty
            <div class="w-full text-center py-12 text-slate-500">
                No projects found.
            </div>
            @endforelse
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.querySelector('.projects-scroll-container');
        const prevBtn = document.querySelector('.prev-project');
        const nextBtn = document.querySelector('.next-project');

        if (container && prevBtn && nextBtn) {
            prevBtn.addEventListener('click', () => {
                container.scrollBy({ left: -400, behavior: 'smooth' });
            });

            nextBtn.addEventListener('click', () => {
                container.scrollBy({ left: 400, behavior: 'smooth' });
            });
        }
    });
</script>
@endsection