@extends('layouts.app')

@section('title', 'Home')

@section('content')
@php
    $signatureProjects = $featuredProjects->take(3)->values();
    $stack = ['Laravel', 'PHP', 'Flutter', 'MySQL', 'SQLite', 'Tailwind CSS', 'Alpine.js', 'REST APIs'];
    $caseStudyPanels = [
        [
            'label' => 'Problem',
            'title' => 'Unclear products lose users.',
            'body' => 'Value must land before attention drops.',
        ],
        [
            'label' => 'Approach',
            'title' => 'Lead with one path.',
            'body' => 'Simple sections turn complex systems into quick decisions.',
        ],
        [
            'label' => 'Visuals',
            'title' => 'Show, then explain.',
            'body' => 'Custom interface scenes carry the product story.',
        ],
        [
            'label' => 'Motion',
            'title' => 'Guide attention.',
            'body' => 'Movement highlights progress, feedback, and action.',
        ],
        [
            'label' => 'Conversion',
            'title' => 'Make action obvious.',
            'body' => 'CTAs sit where decisions naturally happen.',
        ],
        [
            'label' => 'Outcome',
            'title' => 'Less friction. More trust.',
            'body' => 'Cleaner stories help people move forward.',
        ],
    ];
    $toolFocus = [
        ['label' => 'Tools', 'items' => 'Figma · Rive · React · Framer Motion'],
        ['label' => 'Focus', 'items' => 'UI/UX · Storytelling · Conversion · Interaction'],
    ];
@endphp

<section class="portfolio-film section-wrap py-10 md:py-14">
    <div class="film-browser" data-browser-showcase>
        <div class="film-browser-bar">
            <div class="flex items-center gap-2">
                <span class="bg-slate-300"></span>
                <span class="bg-amber-300"></span>
                <span class="bg-teal-400"></span>
            </div>
            <div class="film-address">carlosmiguel.portfolio</div>
            <div class="film-menu">...</div>
        </div>

        <div class="film-grid">
            <section class="film-panel film-intro">
                <span class="grid-dot grid-dot-tl"></span>
                <span class="grid-dot grid-dot-tr"></span>
                <div class="browser-chip">Portfolio OS / 2026</div>
                <div class="mt-auto">
                    <p class="eyebrow mb-4">Carlos Miguel S. Villalobos</p>
                    <h1 class="font-display text-4xl font-extrabold leading-[1.02] text-slate-950 dark:text-white sm:text-5xl md:text-7xl">
                        <span class="block">Systems that</span>
                        <span class="block">explain fast.</span>
                    </h1>
                    <p class="mt-6 max-w-xl text-base font-semibold leading-7 text-slate-600 dark:text-slate-300 md:text-lg">
                        Clear interfaces, guided motion, and stronger product stories for real systems.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="#projects" class="btn-primary">View projects</a>
                        <a href="{{ route('contact') }}" class="btn-secondary">Contact me</a>
                    </div>
                </div>
            </section>

            <section class="film-panel film-flow">
                <span class="grid-dot grid-dot-tl"></span>
                <span class="grid-dot grid-dot-tr"></span>
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">Interactive system layer</p>
                        <h2 class="font-display text-xl font-extrabold text-slate-950 dark:text-white sm:text-2xl">Interfaces in motion.</h2>
                    </div>
                </div>
                <div class="aicm-stage" aria-label="Animated AI interface orbit with horizontal product panels">
                    <div class="aicm-track aicm-track-one" aria-hidden="true">
                        <span>Data</span>
                        <span>Signals</span>
                        <span>Logic</span>
                        <span>Actions</span>
                        <span>Data</span>
                        <span>Signals</span>
                    </div>
                    <div class="aicm-track aicm-track-two" aria-hidden="true">
                        <span>HRIS</span>
                        <span>ORAS</span>
                        <span>Baby Tracker</span>
                        <span>Reports</span>
                        <span>HRIS</span>
                    </div>
                    <div class="aicm-core">
                        <div class="aicm-panel">
                            <div class="aicm-orbit"></div>
                            <div class="aicm-chip">AI</div>
                            <div class="aicm-lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="aicm-card aicm-card-left">
                        <strong>Live preview</strong>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="aicm-card aicm-card-right">
                        <strong>Success state</strong>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </section>
        </div>

        <div class="film-divider"></div>

        <section id="projects" class="film-projects">
            <div class="film-section-heading">
                <p class="eyebrow mb-3">Selected case studies</p>
                <h2 class="font-display text-3xl font-extrabold leading-tight text-slate-950 dark:text-white md:text-5xl">
                    <span class="block">Real systems.</span>
                    <span class="block">Clear stories.</span>
                </h2>
            </div>

            <div class="film-project-grid">
                @forelse($signatureProjects as $index => $project)
                    @php
                        $techArray = is_string($project->technologies) ? json_decode($project->technologies, true) : $project->technologies;
                    @endphp
                    <article class="film-project-card">
                        <span class="grid-dot grid-dot-tl"></span>
                        <span class="grid-dot grid-dot-tr"></span>
                        <div class="browser-chip">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }} / {{ $project->category }}</div>
                        @if(!empty($project->cover_image))
                            <div class="film-project-media">
                                <img src="{{ asset($project->cover_image) }}" alt="{{ $project->title }} interface preview">
                            </div>
                        @else
                            <div class="line-art line-art-timeline" aria-hidden="true">
                                <span></span><span></span><span></span><span></span><span></span>
                            </div>
                        @endif
                        <div class="mt-auto">
                            <h3 class="font-display text-2xl font-extrabold leading-tight text-slate-950 dark:text-white">{{ $project->title }}</h3>
                            <p class="mt-4 text-sm font-semibold leading-6 text-slate-600 dark:text-slate-300">{{ \Illuminate\Support\Str::words($project->excerpt, 14) }}</p>
                            <div class="mt-5 flex flex-wrap gap-2">
                                @foreach(array_slice($techArray ?? [], 0, 4) as $tech)
                                    <span class="rounded border border-slate-950/10 bg-white/70 px-3 py-1 text-xs font-extrabold text-slate-600 dark:border-white/10 dark:bg-white/5 dark:text-slate-300">{{ $tech }}</span>
                                @endforeach
                            </div>
                            <a href="{{ route('projects.show', $project->slug) }}" class="mt-6 inline-flex text-sm font-extrabold text-slate-950 transition hover:text-teal-700 dark:text-white dark:hover:text-teal-200">Open case study -></a>
                        </div>
                    </article>
                @empty
                    <div class="film-project-card">No featured projects yet.</div>
                @endforelse
            </div>
        </section>

        <div class="film-divider"></div>

        <section class="film-lower-grid">
            @foreach($caseStudyPanels as $panel)
                <article class="film-panel compact">
                    <span class="grid-dot grid-dot-tl"></span>
                    <div class="browser-chip">{{ $panel['label'] }}</div>
                    <h3 class="mt-12 font-display text-2xl font-extrabold leading-tight text-slate-950 dark:text-white">{{ $panel['title'] }}</h3>
                    <p class="mt-4 text-sm font-semibold leading-6 text-slate-600 dark:text-slate-300">{{ $panel['body'] }}</p>
                </article>
            @endforeach
        </section>

        <div class="film-divider"></div>

        <section class="film-tool-grid">
            @foreach($toolFocus as $item)
                <article class="film-panel compact">
                    <span class="grid-dot grid-dot-tl"></span>
                    <div class="browser-chip">{{ $item['label'] }}</div>
                    <h3 class="mt-12 font-display text-2xl font-extrabold leading-tight text-slate-950 dark:text-white">{{ $item['items'] }}</h3>
                </article>
            @endforeach
        </section>

        <div class="film-stack">
            <div class="animate-marquee flex w-max gap-3 px-3">
                @foreach(array_merge($stack, $stack) as $tool)
                    <span class="rounded-md border border-slate-950/10 bg-white/80 px-4 py-2 text-sm font-extrabold text-slate-700 shadow-sm dark:border-white/10 dark:bg-white/5 dark:text-slate-200">{{ $tool }}</span>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
