@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<section class="section-wrap py-16 md:py-20">
    <div class="max-w-3xl reveal-up">
        <p class="eyebrow mb-4">Selected work</p>
        <h1 class="font-display text-5xl font-extrabold leading-tight text-slate-950 dark:text-white md:text-6xl">Built systems. Sharper stories.</h1>
        <p class="mt-6 text-lg leading-8 text-slate-700 dark:text-slate-300">Care tracking, HR operations, and PPA workflows made easier to understand.</p>
    </div>

    @if($categories->count() > 0)
        <div class="mt-10 flex flex-wrap gap-2">
            <a href="{{ route('projects.index') }}" class="rounded-md px-4 py-2 text-sm font-extrabold transition {{ request()->routeIs('projects.index') ? 'bg-slate-950 text-white dark:bg-white dark:text-slate-950' : 'border border-slate-950/10 bg-white/60 text-slate-700 hover:border-teal-600 hover:text-teal-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-300 dark:hover:border-teal-300 dark:hover:text-teal-200' }}">All</a>
            @foreach($categories as $category)
                <a href="{{ route('projects.category', $category) }}" class="rounded-md border border-slate-950/10 bg-white/60 px-4 py-2 text-sm font-extrabold text-slate-700 transition hover:border-teal-600 hover:text-teal-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-300 dark:hover:border-teal-300 dark:hover:text-teal-200">{{ $category }}</a>
            @endforeach
        </div>
    @endif

    <div class="mt-12 grid gap-6 lg:grid-cols-3">
        @forelse($projects as $project)
            @php
                $techArray = is_string($project->technologies) ? json_decode($project->technologies, true) : $project->technologies;
            @endphp
            <article class="surface group flex min-h-[520px] flex-col overflow-hidden rounded-lg transition duration-500 hover:-translate-y-1">
                <div class="project-visual p-5 text-white">
                    @if(!empty($project->cover_image))
                        <div class="h-64 overflow-hidden rounded-md border border-white/10 bg-white/10">
                            <img src="{{ asset($project->cover_image) }}" alt="{{ $project->title }} interface preview" class="h-full w-full object-cover transition duration-700 group-hover:scale-[1.04]">
                        </div>
                    @else
                    <div class="rounded-md border border-white/10 bg-white/10 p-4 backdrop-blur">
                        <div class="mb-5 flex items-center justify-between">
                            <span class="rounded bg-white px-3 py-1 text-xs font-black uppercase tracking-[0.14em] text-slate-950">{{ $project->category }}</span>
                            @if($project->featured)
                                <span class="text-xs font-black uppercase tracking-[0.16em] text-teal-200">Featured</span>
                            @endif
                        </div>
                        <div class="grid grid-cols-4 gap-2">
                            @for($i = 1; $i <= 16; $i++)
                                <span class="h-9 rounded {{ $i % 4 === 0 ? 'bg-teal-300' : ($i % 5 === 0 ? 'bg-amber-300' : 'bg-white/15') }}"></span>
                            @endfor
                        </div>
                        <div class="mt-5 space-y-2">
                            <div class="h-2.5 w-11/12 rounded-full bg-white"></div>
                            <div class="h-2.5 w-7/12 rounded-full bg-white/45"></div>
                            <div class="h-2.5 w-9/12 rounded-full bg-white/70"></div>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="flex flex-1 flex-col p-6">
                    <h2 class="font-display text-2xl font-extrabold text-slate-950 transition group-hover:text-teal-700 dark:text-white dark:group-hover:text-teal-200">{{ $project->title }}</h2>
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
            <div class="surface rounded-lg p-10 text-center text-slate-600 dark:text-slate-300 lg:col-span-3">No projects found.</div>
        @endforelse
    </div>

    @if($projects->hasPages())
        <div class="mt-12">
            {{ $projects->links('pagination::tailwind') }}
        </div>
    @endif
</section>
@endsection
