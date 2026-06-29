@extends('layouts.app')

@section('title', $category . ' Projects')

@section('content')
<section class="section-wrap py-16 md:py-20">
    <div class="flex flex-col gap-5 md:flex-row md:items-end md:justify-between">
        <div>
            <p class="eyebrow mb-4">{{ $category }}</p>
            <h1 class="font-display text-5xl font-extrabold text-slate-950 dark:text-white md:text-6xl">Focused work.</h1>
            <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-700 dark:text-slate-300">Projects shaped around {{ $category }} outcomes.</p>
        </div>
        <a href="{{ route('projects.index') }}" class="btn-secondary w-fit">Back to all</a>
    </div>

    <div class="mt-12 grid gap-6 lg:grid-cols-3">
        @forelse($projects as $project)
            @php
                $techArray = is_string($project->technologies) ? json_decode($project->technologies, true) : $project->technologies;
            @endphp
            <article class="surface group flex min-h-[500px] flex-col overflow-hidden rounded-lg transition duration-500 hover:-translate-y-1">
                <div class="project-visual p-5 text-white">
                    @if(!empty($project->cover_image))
                        <div class="h-64 overflow-hidden rounded-md border border-white/10 bg-white/10">
                            <img src="{{ asset($project->cover_image) }}" alt="{{ $project->title }} interface preview" class="h-full w-full object-cover transition duration-700 group-hover:scale-[1.04]">
                        </div>
                    @else
                    <div class="rounded-md border border-white/10 bg-white/10 p-4">
                        <div class="mb-5 flex items-center justify-between">
                            <span class="rounded bg-white px-3 py-1 text-xs font-black uppercase tracking-[0.14em] text-slate-950">{{ $project->category }}</span>
                            <span class="text-xs font-black uppercase tracking-[0.16em] text-teal-200">Case</span>
                        </div>
                        <div class="grid grid-cols-5 gap-2">
                            @for($i = 1; $i <= 20; $i++)
                                <span class="h-8 rounded {{ $i % 3 === 0 ? 'bg-sky-300' : ($i % 7 === 0 ? 'bg-amber-300' : 'bg-white/15') }}"></span>
                            @endfor
                        </div>
                    </div>
                    @endif
                </div>
                <div class="flex flex-1 flex-col p-6">
                    <h2 class="font-display text-2xl font-extrabold text-slate-950 dark:text-white">{{ $project->title }}</h2>
                    <p class="mt-4 flex-1 leading-7 text-slate-700 dark:text-slate-300">{{ \Illuminate\Support\Str::words($project->excerpt, 14) }}</p>
                    <div class="mt-6 flex flex-wrap gap-2">
                        @foreach(array_slice($techArray ?? [], 0, 5) as $tech)
                            <span class="rounded border border-slate-950/10 bg-slate-50 px-3 py-1.5 text-xs font-bold text-slate-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-300">{{ $tech }}</span>
                        @endforeach
                    </div>
                    <a href="{{ route('projects.show', $project->slug) }}" class="btn-secondary mt-7">Open case study</a>
                </div>
            </article>
        @empty
            <div class="surface rounded-lg p-10 text-center text-slate-600 dark:text-slate-300 lg:col-span-3">No projects found in this category.</div>
        @endforelse
    </div>

    @if($projects->hasPages())
        <div class="mt-12">
            {{ $projects->links('pagination::tailwind') }}
        </div>
    @endif
</section>
@endsection
