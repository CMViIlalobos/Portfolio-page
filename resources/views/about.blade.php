@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="relative py-20 overflow-hidden">
    <div class="absolute top-20 right-0 w-[500px] h-[500px] bg-indigo-500/10 rounded-full blur-[100px] -z-10"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-violet-500/10 rounded-full blur-[100px] -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-20">
            <h1 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-6">Builder of clear systems.</h1>
            <p class="text-xl text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">I design interfaces that make complex work feel simple.</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <div>
                <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-8 flex items-center">
                    <span class="w-10 h-1 bg-indigo-600 dark:bg-indigo-500 mr-4 rounded-full"></span>
                    Profile
                </h2>
                <div class="space-y-6 text-slate-600 dark:text-slate-400 text-lg leading-relaxed">
                    <p>I'm <strong class="text-slate-900 dark:text-white">Carlos Miguel S. Villalobos</strong>, a full-stack developer focused on practical product systems.</p>
                    <p>I turn real workflows into clean interfaces, structured data, and motion-led product stories.</p>
                </div>
            </div>
            
            <div>
                <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-8 flex items-center">
                    <span class="w-10 h-1 bg-indigo-600 dark:bg-indigo-500 mr-4 rounded-full"></span>
                    Capabilities
                </h2>
                <div class="space-y-6">
                    <div class="group bg-white dark:bg-slate-800/50 backdrop-blur-sm p-8 rounded-2xl border border-slate-200 dark:border-slate-700 hover:border-indigo-500/50 transition-all duration-300 hover:-translate-y-1 shadow-lg dark:shadow-none">
                        <div class="w-12 h-12 bg-slate-100 dark:bg-slate-700 rounded-xl flex items-center justify-center mb-4 text-indigo-600 dark:text-indigo-400 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">Full-Stack Development</h3>
                        <p class="text-slate-600 dark:text-slate-400">End-to-end Laravel, Tailwind, API, and database implementation.</p>
                    </div>
                    
                    <div class="group bg-white dark:bg-slate-800/50 backdrop-blur-sm p-8 rounded-2xl border border-slate-200 dark:border-slate-700 hover:border-indigo-500/50 transition-all duration-300 hover:-translate-y-1 shadow-lg dark:shadow-none">
                        <div class="w-12 h-12 bg-slate-100 dark:bg-slate-700 rounded-xl flex items-center justify-center mb-4 text-indigo-600 dark:text-indigo-400 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">API & Backend Architecture</h3>
                        <p class="text-slate-600 dark:text-slate-400">Secure records, clean schemas, and reliable workflows.</p>
                    </div>
                    
                    <div class="group bg-white dark:bg-slate-800/50 backdrop-blur-sm p-8 rounded-2xl border border-slate-200 dark:border-slate-700 hover:border-indigo-500/50 transition-all duration-300 hover:-translate-y-1 shadow-lg dark:shadow-none">
                        <div class="w-12 h-12 bg-slate-100 dark:bg-slate-700 rounded-xl flex items-center justify-center mb-4 text-indigo-600 dark:text-indigo-400 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">Modern Frontend</h3>
                        <p class="text-slate-600 dark:text-slate-400">Responsive interfaces with strong hierarchy and purposeful motion.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
