@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<div class="relative py-20">
    <!-- Header -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-6">My <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-400 dark:to-purple-400">Projects</span></h1>
        <p class="text-xl text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">A showcase of my recent work, personal experiments, and open source contributions.</p>
    </div>
    
    <!-- Filter -->
    @if($categories->count() > 0)
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
        <div class="flex flex-wrap justify-center gap-3">
            <a href="{{ route('projects.index') }}" 
               class="px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 {{ request()->routeIs('projects.index') ? 'bg-indigo-600 text-white shadow-[0_0_15px_rgba(99,102,241,0.5)]' : 'bg-white dark:bg-[#0B1120] text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/10 hover:border-indigo-500/50 hover:text-indigo-600 dark:hover:text-white shadow-sm dark:shadow-none' }}">
                All Projects
            </a>
            @foreach($categories as $category)
            <a href="{{ route('projects.category', $category) }}" 
               class="px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 {{ request('category') == $category ? 'bg-indigo-600 text-white shadow-[0_0_15px_rgba(99,102,241,0.5)]' : 'bg-white dark:bg-[#0B1120] text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/10 hover:border-indigo-500/50 hover:text-indigo-600 dark:hover:text-white shadow-sm dark:shadow-none' }}">
                {{ $category }}
            </a>
            @endforeach
        </div>
    </div>
    @endif
    
    <!-- Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $project)
            <div class="group bg-white dark:bg-[#0B1120] rounded-2xl overflow-hidden border border-slate-200 dark:border-white/5 hover:border-indigo-500/30 transition-all duration-500 hover:-translate-y-3 hover:scale-[1.02] shadow-lg hover:shadow-2xl dark:shadow-none dark:hover:shadow-[0_20px_40px_rgba(0,0,0,0.4)] flex flex-col h-full relative">
                <!-- Shine Effect -->
                <div class="absolute inset-0 z-10 opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity duration-700">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 dark:via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-in-out"></div>
                </div>

                <!-- Image/Placeholder -->
                <div class="h-56 bg-slate-100 dark:bg-slate-900/50 relative overflow-hidden shrink-0">
                    @if($project->cover_image)
                    <img src="{{ Str::startsWith($project->cover_image, 'http') ? $project->cover_image : asset('storage/' . $project->cover_image) }}" 
                         alt="{{ $project->title }}" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 group-hover:rotate-1">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    @else
                    <div class="absolute inset-0 flex items-center justify-center text-slate-400 dark:text-slate-700 group-hover:text-indigo-500 transition-colors">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    @endif
                    
                    <div class="absolute top-4 right-4">
                         <span class="px-3 py-1 bg-white/90 dark:bg-black/50 backdrop-blur-md border border-slate-200 dark:border-white/10 text-indigo-600 dark:text-indigo-300 rounded-full text-xs font-medium shadow-sm">
                            {{ $project->category }}
                        </span>
                    </div>
                </div>
                
                <div class="p-8 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">{{ $project->title }}</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6 line-clamp-3 text-sm leading-relaxed flex-grow">{{ Str::limit($project->excerpt, 120) }}</p>
                    
                    <div class="flex flex-wrap gap-2 mb-8">
                        @php
                            $techArray = $project->technologies;
                            if (is_string($techArray)) {
                                $techArray = json_decode($techArray, true);
                            }
                        @endphp
                        
                        @if($techArray && is_array($techArray))
                            @foreach(array_slice($techArray, 0, 4) as $tech)
                            <span class="px-2.5 py-1 bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-400 text-xs rounded-md border border-slate-200 dark:border-white/5">{{ $tech }}</span>
                            @endforeach
                        @endif
                    </div>
                    
                    <a href="{{ route('projects.show', $project->slug) }}" 
                       class="block w-full text-center bg-slate-100 dark:bg-white/5 hover:bg-indigo-600 dark:hover:bg-indigo-600 text-slate-700 dark:text-white hover:text-white py-3 rounded-xl font-medium transition-all duration-300 border border-slate-200 dark:border-white/5 hover:border-transparent">
                        View Details
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-20 bg-white dark:bg-slate-800/30 rounded-2xl border border-dashed border-slate-300 dark:border-slate-700">
                <svg class="w-16 h-16 text-slate-400 dark:text-slate-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                <p class="text-xl text-slate-500 dark:text-slate-400 font-medium">No projects found.</p>
                <p class="text-slate-400 dark:text-slate-500 mt-2">Try adjusting your filter or check back later.</p>
            </div>
            @endforelse
        </div>
        
        @if($projects->hasPages())
        <div class="mt-16 flex justify-center">
            {{ $projects->links('pagination::tailwind') }}
        </div>
        @endif
    </div>
</div>
@endsection