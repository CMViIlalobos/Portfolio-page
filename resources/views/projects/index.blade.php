@extends('layouts.app')

@section('title', 'Projects')
@section('description', 'Featured portfolio projects by Carlos Miguel S. Villalobos across mobile apps, enterprise HR systems, and government workflow platforms.')

@section('content')
<section class="section-wrap grid gap-10 pb-12 pt-12 md:pb-16 md:pt-16 lg:grid-cols-[0.95fr_1.05fr] lg:items-center">
    <div class="max-w-4xl" data-reveal>
        <p class="eyebrow">Selected work</p>
        <h1 class="display-title mt-5 text-balance">Systems with product clarity and operational depth.</h1>
        <p class="body-lead mt-6 max-w-2xl">
            These projects show how I think through records, dashboards, workflows, mobile experiences, and maintainable product systems.
        </p>
    </div>

    <div class="three-scene three-scene-page" data-three-scene="projects" data-reveal style="--delay: 120ms" aria-label="Animated 3D project gallery scene">
        <canvas></canvas>
    </div>

    @if($categories->count() > 0)
        <nav class="flex flex-wrap gap-2 lg:col-span-2" data-reveal style="--delay: 80ms" aria-label="Filter projects by category">
            <a
                href="{{ route('projects.index') }}"
                class="tag {{ request()->routeIs('projects.index') ? 'border-slate-950 bg-slate-950 text-white dark:border-white dark:bg-white dark:text-slate-950' : 'hover:border-teal-500 hover:text-teal-700 dark:hover:text-teal-200' }}"
                @if(request()->routeIs('projects.index')) aria-current="page" @endif
            >All</a>
            @foreach($categories as $category)
                <a
                    href="{{ route('projects.category', $category) }}"
                    class="tag hover:border-teal-500 hover:text-teal-700 dark:hover:text-teal-200"
                >{{ $category }}</a>
            @endforeach
        </nav>
    @endif
</section>

<section class="section-wrap pb-24">
    <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
        @forelse($projects as $project)
            <x-project-card :project="$project" :index="$loop->index" />
        @empty
            <div class="surface p-12 text-center lg:col-span-3">
                <p class="font-display text-xl font-bold text-slate-950 dark:text-white">Nothing published here yet.</p>
                <p class="mt-2 text-sm font-medium text-slate-500 dark:text-slate-400">New case studies are added as projects ship — check back soon.</p>
            </div>
        @endforelse
    </div>

    @if($projects->hasPages())
        <div class="mt-14 flex justify-center">
            {{ $projects->links('pagination::tailwind') }}
        </div>
    @endif
</section>
@endsection
