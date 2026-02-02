@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="relative py-20 min-h-screen flex items-center">
    <!-- Background Decoration -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-cyan-500/10 rounded-full blur-[120px] -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24">
            
            <!-- Contact Info -->
            <div class="flex flex-col justify-center">
                <h1 class="text-4xl md:text-6xl font-bold text-slate-900 dark:text-white mb-6">Let's work <br /><span class="text-cyan-400">together.</span></h1>
                <p class="text-xl text-slate-600 dark:text-slate-400 mb-12 max-w-lg">Have a project in mind or just want to say hi? I'm always open to discussing new ideas and opportunities.</p>
                
                <div class="space-y-8">
                    <div class="flex items-start group">
                        <div class="flex-shrink-0 w-12 h-12 bg-slate-800 rounded-xl flex items-center justify-center text-cyan-500 group-hover:bg-cyan-500 group-hover:text-white transition-all duration-300">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="ml-6">
                            <p class="text-sm font-medium text-slate-500 uppercase tracking-wide">Email</p>
                            <a href="mailto:villaloboscarlosmiguel@gmail.com" class="text-xl font-semibold text-slate-900 dark:text-white hover:text-cyan-400 transition-colors">villaloboscarlosmiguel@gmail.com</a>
                        </div>
                    </div>
                    
                    <div class="flex items-start group">
                        <div class="flex-shrink-0 w-12 h-12 bg-slate-800 rounded-xl flex items-center justify-center text-cyan-500 group-hover:bg-cyan-500 group-hover:text-white transition-all duration-300">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                            </svg>
                        </div>
                        <div class="ml-6">
                            <p class="text-sm font-medium text-slate-500 uppercase tracking-wide">Socials</p>
                            <div class="flex gap-4 mt-1">
                                <a href="https://www.facebook.com/vcarlosmiguel19" target="_blank" class="text-slate-300 hover:text-white transition-colors">Facebook</a>
                                <a href="https://www.instagram.com/villaloboscarll/" target="_blank" class="text-slate-300 hover:text-white transition-colors">Instagram</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 rounded-3xl p-8 lg:p-10 shadow-2xl">
                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    @if(session('success'))
                    <div class="p-4 bg-green-500/10 border border-green-500/20 rounded-xl">
                        <p class="text-green-400 text-sm font-medium flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            {{ session('success') }}
                        </p>
                    </div>
                    @endif
                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-400 mb-2">Full Name</label>
                        <input type="text" name="name" id="name" required
                               class="w-full px-4 py-3 bg-slate-900/50 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all"
                               placeholder="Your Name">
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-400 mb-2">Email Address</label>
                        <input type="email" name="email" id="email" required
                               class="w-full px-4 py-3 bg-slate-900/50 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all"
                               placeholder="your.email@example.com">
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-slate-400 mb-2">Subject</label>
                        <input type="text" name="subject" id="subject" required
                               class="w-full px-4 py-3 bg-slate-900/50 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all"
                               placeholder="Project Inquiry">
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-slate-400 mb-2">Message</label>
                        <textarea name="message" id="message" rows="5" required
                                  class="w-full px-4 py-3 bg-slate-900/50 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all resize-none"
                                  placeholder="Tell me about your project..."></textarea>
                    </div>
                    
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-cyan-600 to-blue-600 text-white py-4 px-6 rounded-xl font-bold hover:shadow-[0_0_20px_rgba(6,182,212,0.4)] transition-all duration-300 transform hover:-translate-y-1">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection