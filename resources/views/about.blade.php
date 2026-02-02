@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="relative py-20 overflow-hidden">
    <!-- Background Decoration -->
    <div class="absolute top-20 right-0 w-[500px] h-[500px] bg-indigo-500/10 rounded-full blur-[100px] -z-10"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-violet-500/10 rounded-full blur-[100px] -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-20">
            <h1 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-6">About <span class="text-indigo-600 dark:text-indigo-400">Me</span></h1>
            <p class="text-xl text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">Get to know the developer behind the code.</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <div>
                <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-8 flex items-center">
                    <span class="w-10 h-1 bg-indigo-600 dark:bg-indigo-500 mr-4 rounded-full"></span>
                    My Journey
                </h2>
                <div class="space-y-6 text-slate-600 dark:text-slate-400 text-lg leading-relaxed">
                    <p>Hello! I'm <strong class="text-slate-900 dark:text-white">Carlos Miguel S. Villalobos</strong>, a passionate Full-Stack Developer dedicated to building robust and scalable web applications.</p>
                    <p>My journey in software development is driven by a curiosity to understand how things work and a desire to build solutions that make a difference. With a strong foundation in <strong class="text-slate-900 dark:text-white">modern web architectures</strong> and <strong class="text-slate-900 dark:text-white">adaptive toolsets</strong>, I transform complex requirements into elegant, user-friendly digital products.</p>
                    <p>I thrive on solving challenging problems and am constantly exploring new technologies to deliver cutting-edge results. Whether it's optimizing database queries, designing intuitive APIs, or crafting responsive user interfaces, I approach every task with attention to detail and a commitment to quality.</p>
                    <p>When I'm not coding, you can find me exploring new tech trends, contributing to open-source, or connecting with fellow developers.</p>
                </div>
            </div>
            
            <div>
                <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-8 flex items-center">
                    <span class="w-10 h-1 bg-indigo-600 dark:bg-indigo-500 mr-4 rounded-full"></span>
                    What I Do
                </h2>
                <div class="space-y-6">
                    <div class="group bg-white dark:bg-slate-800/50 backdrop-blur-sm p-8 rounded-2xl border border-slate-200 dark:border-slate-700 hover:border-indigo-500/50 transition-all duration-300 hover:-translate-y-1 shadow-lg dark:shadow-none">
                        <div class="w-12 h-12 bg-slate-100 dark:bg-slate-700 rounded-xl flex items-center justify-center mb-4 text-indigo-600 dark:text-indigo-400 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">Full-Stack Development</h3>
                        <p class="text-slate-600 dark:text-slate-400">Building end-to-end web solutions using the TALL stack (Tailwind, Alpine, Laravel, Livewire) or Vue.js, ensuring seamless integration between frontend and backend.</p>
                    </div>
                    
                    <div class="group bg-white dark:bg-slate-800/50 backdrop-blur-sm p-8 rounded-2xl border border-slate-200 dark:border-slate-700 hover:border-indigo-500/50 transition-all duration-300 hover:-translate-y-1 shadow-lg dark:shadow-none">
                        <div class="w-12 h-12 bg-slate-100 dark:bg-slate-700 rounded-xl flex items-center justify-center mb-4 text-indigo-600 dark:text-indigo-400 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">API & Backend Architecture</h3>
                        <p class="text-slate-600 dark:text-slate-400">Designing robust RESTful APIs, optimizing database schemas, and implementing secure authentication and authorization systems.</p>
                    </div>
                    
                    <div class="group bg-white dark:bg-slate-800/50 backdrop-blur-sm p-8 rounded-2xl border border-slate-200 dark:border-slate-700 hover:border-indigo-500/50 transition-all duration-300 hover:-translate-y-1 shadow-lg dark:shadow-none">
                        <div class="w-12 h-12 bg-slate-100 dark:bg-slate-700 rounded-xl flex items-center justify-center mb-4 text-indigo-600 dark:text-indigo-400 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">Modern Frontend</h3>
                        <p class="text-slate-600 dark:text-slate-400">Crafting responsive, interactive user interfaces with Vue.js and Tailwind CSS, focusing on performance, accessibility, and modern design principles.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection