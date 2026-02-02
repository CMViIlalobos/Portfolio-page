@extends('layouts.app')

@section('title', $project->title)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
    <!-- Main Image Display with Hover Effect -->
    <div class="bg-white dark:bg-slate-800/50 backdrop-blur-xl border border-slate-200 dark:border-slate-700 rounded-3xl overflow-hidden shadow-2xl dark:shadow-none mb-12">
        <div class="h-[500px] overflow-hidden relative group" id="mainImageContainer">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 dark:from-slate-900 to-transparent opacity-60 z-10 pointer-events-none"></div>
            
            @if($project->cover_image)
                <img src="{{ Str::startsWith($project->cover_image, 'http') ? $project->cover_image : asset('storage/' . $project->cover_image) }}" 
                     alt="{{ $project->title }}" 
                     id="mainImage"
                     class="w-full h-full object-cover transition-transform duration-700">
            @endif
        </div>
        
        <!-- Interactive Thumbnails -->
        @if($project->images && count($project->images) > 0)
        <div class="px-8 py-6 border-t border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900/50">
            <p class="text-sm text-slate-600 dark:text-slate-400 mb-4 font-medium uppercase tracking-wider">Gallery (Hover to Preview)</p>
            <div class="flex gap-4 overflow-x-auto pb-2 scrollbar-hide">
                <!-- Cover Image Thumbnail -->
                @if($project->cover_image)
                <div class="flex-shrink-0 cursor-pointer border-2 border-indigo-600 dark:border-indigo-500 rounded-xl overflow-hidden w-32 h-20 transition-all duration-300 hover:scale-105"
                     onmouseenter="updateMainImage('{{ Str::startsWith($project->cover_image, 'http') ? $project->cover_image : asset('storage/' . $project->cover_image) }}', this)">
                    <img src="{{ Str::startsWith($project->cover_image, 'http') ? $project->cover_image : asset('storage/' . $project->cover_image) }}" 
                         class="w-full h-full object-cover">
                </div>
                @endif

                <!-- Additional Screenshots -->
                @foreach($project->images as $image)
                <div class="flex-shrink-0 cursor-pointer border-2 border-transparent hover:border-indigo-600 dark:hover:border-indigo-500 rounded-xl overflow-hidden w-32 h-20 transition-all duration-300 hover:scale-105"
                     onmouseenter="updateMainImage('{{ Str::startsWith($image, 'http') ? $image : asset('storage/' . $image) }}', this)">
                    <img src="{{ Str::startsWith($image, 'http') ? $image : asset('storage/' . $image) }}" 
                         class="w-full h-full object-cover">
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    <!-- Project Details -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-slate-800/50 backdrop-blur-xl border border-slate-200 dark:border-slate-700 rounded-3xl p-8 lg:p-10 shadow-lg dark:shadow-none">
                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-6">{{ $project->title }}</h1>
                
                <div class="prose prose-lg prose-slate dark:prose-invert max-w-none mb-10 text-slate-600 dark:text-slate-300">
                    {!! nl2br(e($project->description)) !!}
                </div>

                <div class="flex flex-wrap gap-4 mt-8">
                    @if($project->demo_url)
                    <a href="{{ $project->demo_url }}" 
                       target="_blank" 
                       class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-indigo-600 to-violet-600 text-white rounded-xl font-bold hover:shadow-[0_0_20px_rgba(99,102,241,0.4)] transition-all duration-300 transform hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                        Live Demo
                    </a>
                    @endif
                    
                    @if($project->github_url)
                    <a href="{{ $project->github_url }}" 
                       target="_blank" 
                       class="inline-flex items-center px-8 py-4 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-white border border-slate-200 dark:border-slate-600 rounded-xl font-bold transition-all duration-300 transform hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                        </svg>
                        View Code
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="lg:col-span-1 space-y-8">
            <div class="bg-white dark:bg-slate-800/50 backdrop-blur-xl border border-slate-200 dark:border-slate-700 rounded-3xl p-8 shadow-lg dark:shadow-none">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Project Info
                </h3>
                
                <div class="space-y-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm mb-1">Category</p>
                        <span class="inline-block px-3 py-1 bg-indigo-50 border border-indigo-100 text-indigo-600 dark:bg-indigo-500/10 dark:border-indigo-500/20 dark:text-indigo-400 rounded-full text-sm font-semibold">
                            {{ $project->category }}
                        </span>
                    </div>
                    
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm mb-1">Date</p>
                        <p class="text-slate-900 dark:text-white font-medium">{{ $project->published_at ? $project->published_at->format('F d, Y') : 'Recently' }}</p>
                    </div>
                    
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm mb-2">Technologies</p>
                        <div class="flex flex-wrap gap-2">
                            @php
                                $techArray = $project->technologies;
                                if (is_string($techArray)) {
                                    $techArray = json_decode($techArray, true);
                                }
                            @endphp
                            
                            @if($techArray && is_array($techArray))
                                @foreach($techArray as $tech)
                                <span class="px-3 py-1 bg-slate-100 border border-slate-200 text-slate-600 dark:bg-slate-700 dark:border-slate-600 dark:text-slate-200 rounded-lg text-xs font-medium">
                                    {{ $tech }}
                                </span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @if($relatedProjects->count() > 0)
    <div class="mt-20">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Related Projects</h2>
            <a href="{{ route('projects.index') }}" class="text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium flex items-center gap-1 transition-colors">
                View All <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedProjects as $related)
            <div class="group bg-white dark:bg-slate-800/50 backdrop-blur-sm border border-slate-200 dark:border-slate-700 rounded-2xl overflow-hidden hover:border-indigo-500/50 hover:shadow-lg dark:shadow-none hover:shadow-indigo-500/10 transition-all duration-300 hover:-translate-y-1">
                <div class="p-6">
                    <span class="px-3 py-1 bg-indigo-50 border border-indigo-100 text-indigo-600 dark:bg-indigo-500/10 dark:border-indigo-500/20 dark:text-indigo-400 rounded-full text-xs font-semibold mb-4 inline-block">
                        {{ $related->category }}
                    </span>
                    <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-3 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">{{ $related->title }}</h4>
                    <p class="text-slate-600 dark:text-slate-400 mb-6 text-sm">{{ Str::limit($related->excerpt, 80) }}</p>
                    <a href="{{ route('projects.show', $related->slug) }}" 
                       class="text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium inline-flex items-center gap-1 transition-colors">
                        View Project <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

@push('scripts')
<script>
    function updateMainImage(src, element) {
        // Update main image with fade effect
        const mainImage = document.getElementById('mainImage');
        mainImage.style.opacity = '0';
        
        setTimeout(() => {
            mainImage.src = src;
            mainImage.style.opacity = '1';
        }, 200);
        
        // Reset all borders
        const thumbnails = element.parentElement.children;
        for (let i = 0; i < thumbnails.length; i++) {
            thumbnails[i].classList.remove('border-indigo-600', 'dark:border-indigo-500');
            thumbnails[i].classList.add('border-transparent');
        }
        
        // Highlight active thumbnail
        element.classList.remove('border-transparent');
        element.classList.add('border-indigo-600', 'dark:border-indigo-500');
    }
</script>
@endpush
@endsection