@extends('layouts.app')

@section('title', 'Carlos Miguel S. Villalobos')
@section('description', 'Developer portfolio for Carlos Miguel S. Villalobos: Laravel, Flutter, dashboards, workflow systems, APIs, and modern product interfaces.')

@section('content')
@php
    $signatureProjects = $featuredProjects->take(3)->values();

    $skills = [
        'Laravel' => 'Dashboards, admin panels, APIs, authentication, records, reporting, and workflow logic.',
        'Flutter' => 'Mobile app flows with local storage, reminders, PDF exports, and clear interaction patterns.',
        'Interface systems' => 'Responsive Blade/Tailwind screens with hierarchy, accessibility, motion, and polish.',
        'Product delivery' => 'Data modeling, QA, documentation, deployment prep, and maintainable implementation.',
    ];

    $process = [
        ['01', 'Map the workflow', 'Clarify users, states, edge cases, records, and the decisions the system needs to support.'],
        ['02', 'Shape the interface', 'Design scannable screens, predictable navigation, clear actions, and responsive layouts.'],
        ['03', 'Build the system', 'Implement backend flows, UI components, validation, exports, and documentation with care.'],
    ];

    $services = [
        'Laravel applications',
        'Flutter mobile apps',
        'Admin dashboards',
        'Workflow automation',
        'REST API implementation',
        'Responsive UI polish',
    ];

    $projectCount = $featuredProjects->count();
@endphp

<section class="section-wrap hero-section grid gap-12 pb-16 pt-12 lg:grid-cols-[1.02fr_0.98fr] lg:items-center lg:pb-24 lg:pt-20">
    <div data-reveal>
        <p class="eyebrow eyebrow-live">Available for new systems</p>
        <h1 class="display-title mt-5 text-balance">
            Minimal interfaces for systems that do real work.
        </h1>
        <p class="body-lead mt-6 max-w-2xl">
            I am Carlos Miguel S. Villalobos. I build Laravel systems, Flutter apps, dashboards, and workflow products that feel calm, readable, and dependable.
        </p>
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="#projects" class="btn-primary" data-magnetic>View work</a>
            <a href="mailto:villaloboscarlosmiguel@gmail.com" class="btn-ghost">Email me</a>
        </div>

        <div class="mt-10 flex items-center gap-6 border-t border-[rgb(var(--line)/0.5)] pt-6">
            <div>
                <p class="data-mono text-2xl font-bold text-slate-950 dark:text-white">{{ $projectCount }}</p>
                <p class="mt-0.5 text-[0.68rem] font-bold uppercase tracking-[0.08em] text-slate-500 dark:text-slate-400">Featured builds</p>
            </div>
            <div class="h-9 w-px bg-[rgb(var(--line)/0.6)]"></div>
            <div>
                <p class="data-mono text-2xl font-bold text-slate-950 dark:text-white">2</p>
                <p class="mt-0.5 text-[0.68rem] font-bold uppercase tracking-[0.08em] text-slate-500 dark:text-slate-400">Core stacks</p>
            </div>
            <div class="h-9 w-px bg-[rgb(var(--line)/0.6)]"></div>
            <div>
                <p class="data-mono text-2xl font-bold text-slate-950 dark:text-white">PH</p>
                <p class="mt-0.5 text-[0.68rem] font-bold uppercase tracking-[0.08em] text-slate-500 dark:text-slate-400">Based in</p>
            </div>
        </div>
    </div>

    <div class="minimal-hero" data-reveal data-hero-tilt style="--delay: 120ms">
        <div class="three-scene three-scene-hero" data-three-scene="studio" aria-label="Animated 3D developer studio scene">
            <canvas></canvas>
            <div class="three-scene__overlay">
                <span class="three-scene__label">Current focus</span>
                <strong>Product systems</strong>
                <div class="three-scene__chips">
                    <span>Laravel</span>
                    <span>Flutter</span>
                    <span>Tailwind</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-wrap pb-20">
    <div class="minimal-strip" data-reveal>
        @foreach(['Dashboards', 'Records', 'Reports', 'APIs', 'Mobile flows', 'Admin tools', 'QR/OTP', 'Documentation'] as $item)
            <span>{{ $item }}</span>
        @endforeach
    </div>
</section>

<section id="about" class="section-wrap section-pad border-top-soft">
    <div class="grid gap-10 lg:grid-cols-[0.78fr_1.22fr] lg:items-start">
        <div data-reveal>
            <p class="eyebrow">About</p>
            <h2 class="section-title mt-4 text-balance">I like software that makes complicated work feel lighter.</h2>
        </div>
        <div class="space-y-5" data-reveal style="--delay: 90ms">
            <p class="body-lead">
                My work sits between backend structure and everyday usability: clean data flows, clear interfaces, useful dashboards, and product behavior that people can trust.
            </p>
            <p class="body-lead">
                I care about restraint in design, reliable implementation, and motion that gives the page a little life without distracting from the work.
            </p>

            <div class="three-scene three-scene-wide mt-8" data-three-scene="stack" aria-label="Animated 3D technology stack scene">
                <canvas></canvas>
                <div class="three-scene__ticker" aria-hidden="true">
                    @foreach(['Laravel', 'PHP', 'Flutter', 'Dart', 'Tailwind CSS', 'MySQL', 'JavaScript', 'Blade'] as $line)
                        <span>{{ $line }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section id="skills" class="section-wrap pb-20">
    <div class="grid gap-4 md:grid-cols-2">
        @foreach($skills as $title => $body)
            <article class="minimal-card p-6" data-reveal style="--delay: {{ $loop->index * 70 }}ms">
                <span class="card-index">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                <h3 class="mt-8 font-display text-xl font-bold text-slate-950 dark:text-white">{{ $title }}</h3>
                <p class="mt-3 text-sm font-medium leading-6 text-slate-600 dark:text-slate-300">{{ $body }}</p>
            </article>
        @endforeach
    </div>
</section>

<section id="projects" class="section-wrap section-pad border-top-soft">
    <div class="mb-10 flex flex-col gap-5 md:flex-row md:items-end md:justify-between" data-reveal>
        <div class="max-w-3xl">
            <p class="eyebrow">Featured work</p>
            <h2 class="section-title mt-4">Selected systems and product builds.</h2>
        </div>
        <a href="{{ route('projects.index') }}" class="btn-secondary md:mb-1">All projects</a>
    </div>
    <div class="grid gap-5 md:grid-cols-3">
        @forelse($signatureProjects as $project)
            <x-project-card :project="$project" :index="$loop->index" compact />
        @empty
            <div class="surface p-8 text-center text-slate-600 dark:text-slate-300 md:col-span-3">No featured projects yet.</div>
        @endforelse
    </div>
</section>

<section class="section-wrap section-pad border-top-soft">
    <div class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr]">
        <div data-reveal>
            <p class="eyebrow">Process</p>
            <h2 class="section-title mt-4 text-balance">A simple path from workflow to shipped product.</h2>
            <div class="three-scene three-scene-small mt-8" data-three-scene="pipeline" aria-label="Animated 3D product pipeline scene">
                <canvas></canvas>
            </div>
        </div>
        <div class="space-y-4">
            @foreach($process as [$number, $title, $body])
                <article class="process-row" data-reveal style="--delay: {{ $loop->index * 80 }}ms">
                    <span>{{ $number }}</span>
                    <div>
                        <h3>{{ $title }}</h3>
                        <p>{{ $body }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section id="services" class="section-wrap pb-20">
    <div class="service-panel" data-reveal>
        <div>
            <p class="eyebrow">What I build</p>
            <h2 class="mt-4 font-display text-2xl font-bold leading-tight text-slate-950 dark:text-white md:text-3xl">
                Focused development for practical teams and products.
            </h2>
        </div>
        <div class="service-list">
            @foreach($services as $service)
                <span>{{ $service }}</span>
            @endforeach
        </div>
    </div>
</section>

<section id="contact" class="section-wrap section-pad border-top-soft">
    <div class="closing-cta" data-reveal>
        <p class="eyebrow">Contact</p>
        <h2 class="mt-4 max-w-3xl font-display text-2xl font-bold leading-tight text-slate-950 dark:text-white md:text-4xl">
            Have a workflow, app, or dashboard that needs to become real?
        </h2>
        <p class="body-lead mt-5 max-w-2xl">
            Send the context and I will reply with clear next steps, tradeoffs, and how I can help build it.
        </p>
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="{{ route('contact') }}" class="btn-primary" data-magnetic>Start a conversation</a>
        </div>
    </div>
</section>
@endsection
