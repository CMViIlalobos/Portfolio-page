@extends('layouts.app')

@section('title', $project->title)
@section('description', $project->excerpt)

@section('content')
@php
    $techArray = is_string($project->technologies)
        ? json_decode($project->technologies, true)
        : ($project->technologies ?? []);
    $descriptionBlocks = preg_split("/\n\s*\n/", trim($project->description ?? $project->excerpt));
@endphp

<section class="section-wrap pt-10">
    <a href="{{ route('projects.index') }}" class="btn-ghost px-0">&larr; Back to projects</a>
</section>

<section class="section-wrap grid gap-10 pb-16 pt-8 lg:grid-cols-[0.92fr_1.08fr] lg:items-center">
    <div data-reveal>
        <p class="eyebrow">{{ $project->category }}</p>
        <h1 class="display-title mt-5 text-balance">{{ $project->title }}</h1>
        <p class="body-lead mt-6">{{ $project->excerpt }}</p>
        <div class="mt-7 flex flex-wrap gap-2">
            @if($project->featured)
                <span class="tag tag-brand">Featured</span>
            @endif
            <span class="tag">{{ $project->category }}</span>
            <span class="tag data-mono">{{ $project->published_at ? $project->published_at->format('M Y') : 'Recent' }}</span>
        </div>
        <div class="mt-8 flex flex-wrap gap-3">
            @if($project->demo_url && $project->demo_url !== '#')
                <a href="{{ $project->demo_url }}" target="_blank" rel="noopener" class="btn-primary">Open demo</a>
            @endif
            @if($project->github_url && $project->github_url !== '#')
                <a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="btn-secondary">View code</a>
            @endif
            <a href="{{ route('contact') }}" class="btn-ghost">Discuss similar work</a>
        </div>
    </div>

    <div class="surface overflow-hidden p-4" data-reveal style="--delay: 120ms">
        <div class="project-media rounded-lg">
            @if(!empty($project->cover_image))
                <img src="{{ asset($project->cover_image) }}" alt="{{ $project->title }} interface preview">
                <div class="project-video-slot">
                    <span class="rounded-md bg-white/92 px-3 py-1.5 text-[0.68rem] font-semibold uppercase tracking-[0.09em] text-slate-950">
                        {{ $project->category }}
                    </span>
                </div>
            @else
                <div class="three-scene h-full min-h-[320px]" data-three-scene="case" aria-label="Animated 3D project case study scene">
                    <canvas></canvas>
                </div>
            @endif
        </div>
    </div>
</section>

@if(!empty($project->images) && count($project->images) > 0)
<section class="section-wrap pb-16">
    <div class="mb-7" data-reveal>
        <p class="eyebrow">Interface samples</p>
        <h2 class="mt-3 font-display text-2xl font-bold text-slate-950 dark:text-white">Screens from the product</h2>
    </div>
    <div class="grid gap-4 md:grid-cols-3">
        @foreach($project->images as $image)
            <figure class="surface overflow-hidden p-2" data-reveal style="--delay: {{ $loop->index * 70 }}ms">
                <img src="{{ \Illuminate\Support\Str::startsWith($image, 'http') ? $image : asset($image) }}" alt="{{ $project->title }} screen {{ $loop->iteration }}" class="aspect-[16/10] w-full rounded-lg object-cover" loading="lazy">
            </figure>
        @endforeach
    </div>
</section>
@endif

<section class="section-wrap grid gap-6 pb-24 lg:grid-cols-[1.2fr_0.8fr]">
    <article class="surface p-6 md:p-8" data-reveal>
        <p class="eyebrow">Case study</p>
        <div class="mt-6 space-y-6">
            @foreach($descriptionBlocks as $block)
                <p class="text-sm font-medium leading-7 text-slate-700 dark:text-slate-300">{{ $block }}</p>
            @endforeach
        </div>
    </article>

    <aside class="grid gap-5 content-start">
        <div class="three-scene three-scene-small" data-three-scene="case" data-reveal style="--delay: 70ms" aria-label="Animated 3D case study scene">
            <canvas></canvas>
        </div>

        <div class="surface p-6" data-reveal style="--delay: 90ms">
            <h2 class="font-display text-lg font-bold text-slate-950 dark:text-white">Project details</h2>
            <dl class="mt-5 grid gap-4 text-sm">
                <div>
                    <dt class="text-[0.68rem] font-semibold uppercase tracking-[0.1em] text-slate-500 dark:text-slate-400">Category</dt>
                    <dd class="mt-1 font-bold text-slate-800 dark:text-slate-200">{{ $project->category }}</dd>
                </div>
                <div>
                    <dt class="text-[0.68rem] font-semibold uppercase tracking-[0.1em] text-slate-500 dark:text-slate-400">Published</dt>
                    <dd class="data-mono mt-1 font-bold text-slate-800 dark:text-slate-200">{{ $project->published_at ? $project->published_at->format('Y-m-d') : 'Unpublished' }}</dd>
                </div>
                <div>
                    <dt class="text-[0.68rem] font-semibold uppercase tracking-[0.1em] text-slate-500 dark:text-slate-400">Stack</dt>
                    <dd class="mt-3 flex flex-wrap gap-2">
                        @forelse($techArray ?? [] as $tech)
                            <span class="tag">{{ $tech }}</span>
                        @empty
                            <span class="text-xs font-medium text-slate-400">Not listed</span>
                        @endforelse
                    </dd>
                </div>
            </dl>
        </div>
        <div class="premium-card p-6" data-reveal style="--delay: 160ms">
            <p class="eyebrow">What mattered</p>
            <ul class="mt-5 space-y-3 text-sm font-medium leading-6 text-slate-600 dark:text-slate-300">
                <li>Clear hierarchy for daily use.</li>
                <li>Reliable records and workflows.</li>
                <li>Maintainable states and documentation.</li>
            </ul>
            <a href="{{ route('contact') }}" class="btn-primary mt-6 w-full">Start a conversation</a>
        </div>
    </aside>
</section>

@if($relatedProjects->count() > 0)
<section class="section-wrap pb-24">
    <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between" data-reveal>
        <div>
            <p class="eyebrow">Next</p>
            <h2 class="mt-3 font-display text-2xl font-bold text-slate-950 dark:text-white">Related projects</h2>
        </div>
        <a href="{{ route('projects.index') }}" class="btn-secondary">View all</a>
    </div>
    <div class="grid gap-5 md:grid-cols-3">
        @foreach($relatedProjects as $related)
            <x-project-card :project="$related" :index="$loop->index" compact />
        @endforeach
    </div>
</section>
@endif
@endsection
