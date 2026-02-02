@extends('layouts.app')

@section('title', $category . ' Projects')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
    <div class="text-center mb-16 relative">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-cyan-500/20 rounded-full blur-[100px] -z-10 pointer-events-none"></div>
        <h1 class="text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white to-slate-400 mb-4">{{ $category }} Projects</h1>
        <p class="text-xl text-slate-400 max-w-2xl mx-auto">Exploring the possibilities in {{ $category }} development</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($projects as $project)
        <div class="group bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-2xl overflow-hidden hover:border-cyan-500/50 hover:shadow-2xl hover:shadow-cyan-500/10 transition-all duration-300 hover:-translate-y-2">
            @if($project->cover_image)
            <div class="h-48 overflow-hidden relative">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 to-transparent opacity-60 z-10"></div>
                <img src="{{ Str::startsWith($project->cover_image, 'http') ? $project->cover_image : asset('storage/' . $project->cover_image) }}" 
                     alt="{{ $project->title }}" 
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                
                <div class="absolute top-4 left-4 z-20 flex gap-2">
                    <span class="px-3 py-1 bg-slate-900/80 backdrop-blur-md border border-slate-700 text-cyan-400 rounded-full text-xs font-semibold">
                        {{ $project->category }}
                    </span>
                    @if($project->featured)
                    <span class="px-3 py-1 bg-amber-500/90 text-white rounded-full text-xs font-semibold flex items-center gap-1 shadow-lg shadow-amber-500/20">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        Featured
                    </span>
                    @endif
                </div>
            </div>
            @endif
            
            <div class="p-6">
                <h3 class="text-xl font-bold text-white mb-3 group-hover:text-cyan-400 transition-colors">{{ $project->title }}</h3>
                <p class="text-slate-400 mb-4 text-sm line-clamp-3">{{ Str::limit($project->excerpt, 100) }}</p>
                
                <div class="flex flex-wrap gap-2 mb-6">
                    @php
                        $techArray = $project->technologies;
                        if (is_string($techArray)) {
                            $techArray = json_decode($techArray, true);
                        }
                    @endphp

                    @if($techArray && is_array($techArray))
                        @foreach($techArray as $tech)
                        <span class="px-2 py-1 bg-slate-700/50 border border-slate-600 text-slate-300 text-xs rounded-md">{{ $tech }}</span>
                        @endforeach
                    @endif
                </div>
                
                <a href="{{ route('projects.show', $project->slug) }}" 
                   class="block w-full text-center bg-slate-700/50 hover:bg-gradient-to-r hover:from-cyan-600 hover:to-blue-600 text-white py-3 rounded-xl font-bold transition-all duration-300 border border-slate-600 hover:border-transparent">
                    View Project Details
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-20">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-800 rounded-full mb-6">
                <svg class="w-10 h-10 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">No Projects Found</h3>
            <p class="text-slate-400">There are no projects in this category yet.</p>
        </div>
        @endforelse
    </div>
    
    @if($projects->hasPages())
    <div class="mt-16 flex justify-center">
        {{ $projects->links('pagination::tailwind') }}
    </div>
    @endif
</div>
@endsection