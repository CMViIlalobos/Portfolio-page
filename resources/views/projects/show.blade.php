@extends('layouts.app')

@section('title', $project->title)

@section('content')
@php
    $techArray = is_string($project->technologies) ? json_decode($project->technologies, true) : $project->technologies;
    $descriptionBlocks = preg_split("/\n\s*\n/", trim($project->description));
    $summaryBlocks = collect($descriptionBlocks)->take(3)->map(fn ($block) => \Illuminate\Support\Str::words(strip_tags($block), 18));
@endphp

<section class="section-wrap py-14 md:py-20">
    <a href="{{ route('projects.index') }}" class="mb-8 inline-flex items-center gap-2 text-sm font-extrabold text-slate-600 transition hover:text-teal-700 dark:text-slate-300 dark:hover:text-teal-200"><span aria-hidden="true"><-</span> Back to projects</a>

    <div class="grid gap-10 lg:grid-cols-[0.92fr_1.08fr] lg:items-center">
        <div class="reveal-up">
            <p class="eyebrow mb-4">{{ $project->category }}</p>
            <h1 class="font-display text-5xl font-extrabold leading-tight text-slate-950 dark:text-white md:text-6xl">{{ $project->title }}</h1>
            <p class="mt-6 text-lg leading-8 text-slate-700 dark:text-slate-300">{{ \Illuminate\Support\Str::words($project->excerpt, 16) }}</p>
            <div class="mt-8 flex flex-wrap gap-3">
                @if($project->demo_url && $project->demo_url !== '#')
                    <a href="{{ $project->demo_url }}" target="_blank" class="btn-primary">Open demo</a>
                @endif
                @if($project->github_url && $project->github_url !== '#')
                    <a href="{{ $project->github_url }}" target="_blank" class="btn-secondary">View code</a>
                @endif
                <a href="{{ route('contact') }}" class="btn-secondary">Discuss similar work</a>
            </div>
        </div>

        <div class="surface reveal-up reveal-delay-2 overflow-hidden rounded-lg p-5">
            <div class="project-visual rounded-md p-5 text-white">
                @if(!empty($project->cover_image))
                    <div class="overflow-hidden rounded-md border border-white/10 bg-white/10 shadow-2xl">
                        <img src="{{ asset($project->cover_image) }}" alt="{{ $project->title }} interface preview" class="max-h-[520px] w-full object-cover">
                    </div>
                @else
                <div class="mb-6 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-black uppercase tracking-[0.18em] text-white/60">System preview</p>
                        <p class="font-display text-2xl font-extrabold">{{ $project->title }}</p>
                    </div>
                    <span class="rounded bg-white px-3 py-1 text-xs font-black uppercase tracking-[0.14em] text-slate-950">Live logic</span>
                </div>
                <div class="grid gap-4 md:grid-cols-[0.7fr_1.3fr]">
                    <div class="space-y-3 rounded border border-white/10 bg-white/10 p-4">
                        @foreach(['Overview', 'Records', 'Reports', 'Settings'] as $item)
                            <div class="rounded bg-white/10 px-3 py-3 text-sm font-extrabold">{{ $item }}</div>
                        @endforeach
                    </div>
                    <div class="rounded border border-white/10 bg-slate-950/40 p-4">
                        <div class="mb-4 grid grid-cols-3 gap-3">
                            @foreach(['Today', 'Pending', 'Done'] as $label)
                                <div class="rounded bg-white/10 p-3">
                                    <p class="text-xs font-bold text-white/55">{{ $label }}</p>
                                    <p class="mt-2 font-display text-2xl font-extrabold">{{ [12, 8, 24][$loop->index] }}</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="grid grid-cols-8 gap-2">
                            @for($i = 1; $i <= 32; $i++)
                                <span class="h-7 rounded {{ $i % 6 === 0 ? 'bg-amber-300' : ($i % 4 === 0 ? 'bg-teal-300' : 'bg-white/12') }}"></span>
                            @endfor
                        </div>
                        <div class="mt-5 space-y-2">
                            <div class="h-2.5 w-10/12 rounded-full bg-white"></div>
                            <div class="h-2.5 w-6/12 rounded-full bg-white/45"></div>
                            <div class="h-2.5 w-8/12 rounded-full bg-white/70"></div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

@if(!empty($project->images) && count($project->images) > 0)
<section class="section-wrap pb-12">
    <div class="mb-7">
        <p class="eyebrow mb-2">Interface samples</p>
        <h2 class="font-display text-3xl font-extrabold text-slate-950 dark:text-white">Screens from the actual product</h2>
    </div>
    <div class="grid gap-5 lg:grid-cols-3">
        @foreach($project->images as $image)
            <figure class="surface overflow-hidden rounded-lg">
                <img src="{{ Str::startsWith($image, 'http') ? $image : asset($image) }}" alt="{{ $project->title }} screen sample {{ $loop->iteration }}" class="h-64 w-full object-cover transition duration-700 hover:scale-[1.03]">
            </figure>
        @endforeach
    </div>
</section>
@endif

<section class="section-wrap pb-20">
    <div class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
        <article class="surface rounded-lg p-7 md:p-9">
            <p class="eyebrow mb-4">Case study</p>
            <div class="space-y-6">
                @foreach($summaryBlocks as $block)
                    <p class="text-lg leading-8 text-slate-700 dark:text-slate-300">{{ $block }}</p>
                @endforeach
            </div>
        </article>

        <aside class="space-y-6">
            <div class="surface rounded-lg p-7">
                <h2 class="font-display text-xl font-extrabold text-slate-950 dark:text-white">Project details</h2>
                <dl class="mt-6 space-y-5 text-sm">
                    <div>
                        <dt class="font-extrabold uppercase tracking-[0.14em] text-slate-400">Category</dt>
                        <dd class="mt-1 font-bold text-slate-800 dark:text-slate-200">{{ $project->category }}</dd>
                    </div>
                    <div>
                        <dt class="font-extrabold uppercase tracking-[0.14em] text-slate-400">Published</dt>
                        <dd class="mt-1 font-bold text-slate-800 dark:text-slate-200">{{ $project->published_at ? $project->published_at->format('M d, Y') : 'Recently' }}</dd>
                    </div>
                    <div>
                        <dt class="font-extrabold uppercase tracking-[0.14em] text-slate-400">Stack</dt>
                        <dd class="mt-3 flex flex-wrap gap-2">
                            @foreach($techArray ?? [] as $tech)
                                <span class="rounded border border-slate-950/10 bg-slate-50 px-3 py-1.5 text-xs font-bold text-slate-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-300">{{ $tech }}</span>
                            @endforeach
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="surface rounded-lg p-7">
                <h2 class="font-display text-xl font-extrabold text-slate-950 dark:text-white">What mattered</h2>
                <ul class="mt-5 space-y-3 text-sm font-semibold leading-6 text-slate-700 dark:text-slate-300">
                    <li>Clear hierarchy.</li>
                    <li>Auditable records.</li>
                    <li>Room to scale.</li>
                </ul>
            </div>
        </aside>
    </div>

    @if($relatedProjects->count() > 0)
        <div class="mt-16">
            <div class="mb-7 flex items-end justify-between gap-5">
                <div>
                    <p class="eyebrow mb-2">Next</p>
                    <h2 class="font-display text-3xl font-extrabold text-slate-950 dark:text-white">Related projects</h2>
                </div>
                <a href="{{ route('projects.index') }}" class="text-sm font-extrabold text-teal-700 dark:text-teal-200">View all</a>
            </div>
            <div class="grid gap-5 md:grid-cols-3">
                @foreach($relatedProjects as $related)
                    <a href="{{ route('projects.show', $related->slug) }}" class="surface group rounded-lg p-6 transition hover:-translate-y-1">
                        <p class="text-xs font-black uppercase tracking-[0.16em] text-slate-400">{{ $related->category }}</p>
                        <h3 class="mt-3 font-display text-xl font-extrabold text-slate-950 group-hover:text-teal-700 dark:text-white dark:group-hover:text-teal-200">{{ $related->title }}</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-600 dark:text-slate-300">{{ \Illuminate\Support\Str::words($related->excerpt, 12) }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</section>
@endsection
