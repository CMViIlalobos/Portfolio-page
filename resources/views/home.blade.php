@extends('layouts.app')

@section('title', 'Carlos Miguel S. Villalobos')
@section('description', 'Developer portfolio for Carlos Miguel S. Villalobos: Laravel, Flutter, dashboards, workflow systems, APIs, and modern product interfaces.')

@section('content')
@php
    $signatureProjects = $featuredProjects->take(9)->values();

    $skills = [
        'Laravel' => 'Dashboards, admin panels, APIs, authentication, records, reporting, and workflow logic.',
        'PHP' => 'Server-side structure, data modeling, validation, integrations, and maintainable application behavior.',
        'Flutter' => 'Mobile app flows with local storage, reminders, PDF exports, and clear interaction patterns.',
        'Tailwind' => 'Responsive Blade screens with hierarchy, accessibility, motion, and polished product UI.',
    ];

    $process = [
        ['01', 'Map the workflow', 'Clarify users, states, edge cases, records, and the decisions the system needs to support.'],
        ['02', 'Shape the interface', 'Design scannable screens, predictable navigation, clear actions, and responsive layouts.'],
        ['03', 'Build the system', 'Implement backend flows, UI components, validation, exports, and documentation with care.'],
    ];

    $services = [
        'Landing pages',
        'POS systems',
        'Custom software',
        'Laravel applications',
        'Flutter mobile apps',
        'Admin dashboards',
        'Workflow automation',
        'REST API implementation',
        'Booking systems',
        'Responsive UI polish',
    ];

    $toolCarousel = [
        'Laravel',
        'PHP',
        'MySQL',
        'Blade',
        'Bootstrap',
        'ApexCharts',
        'Echo',
        'Flutter',
        'Dart',
        'Riverpod',
        'Hive',
        'Local Notifications',
        'PDF Export',
        'Inertia React',
        'TypeScript',
        'Tailwind CSS',
        'Fortify',
        'QR/OTP',
    ];
@endphp

<section class="hero-editorial section-wrap">
    <div class="main-col" data-reveal>
        <p class="eyebrow">Full stack developer</p>
        <h1 class="display-title mt-5 text-balance">
            Quiet code,<br>
            built with <em>intention.</em>
        </h1>
        <p class="body-lead mt-7 max-w-2xl">
            I am Carlos Miguel S. Villalobos. I build Laravel systems, Flutter apps, dashboards, and workflow products that feel calm, readable, and dependable.
        </p>
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="#projects" class="btn-primary" data-magnetic>View work</a>
            <a href="mailto:villaloboscarlosmiguel@gmail.com" class="btn-ghost">Email me</a>
        </div>

        <div class="tool-carousel" aria-label="Tools used in projects">
            <div class="tool-carousel__track">
                @foreach(array_merge($toolCarousel, $toolCarousel) as $tool)
                    <div class="tool-card {{ $loop->iteration % 7 === 4 ? 'is-featured' : '' }}">
                        <span>{{ str_pad((($loop->index % count($toolCarousel)) + 1), 2, '0', STR_PAD_LEFT) }}</span>
                        <strong>{{ $tool }}</strong>
                    </div>
                @endforeach
            </div>
            <div class="tool-carousel__center" aria-hidden="true">
                @foreach(array_slice($toolCarousel, 0, 6) as $tool)
                    <strong>{{ $tool }}</strong>
                @endforeach
            </div>
        </div>
    </div>

    <aside class="side-col" data-reveal style="--delay: 120ms" aria-label="Theme accent">
        <div class="portrait-orbit" aria-label="Portrait of Carlos Miguel S. Villalobos">
            <span class="portrait-ring portrait-ring-one" aria-hidden="true"></span>
            <span class="portrait-ring portrait-ring-two" aria-hidden="true"></span>
            <img src="{{ asset('project-assets/carl-villalobos-portrait.png') }}" alt="Carlos Miguel S. Villalobos illustrated portrait" loading="eager">
        </div>
        <div class="vertical-text">Carl Villalobos</div>
    </aside>
</section>

<section id="about" class="section-wrap section-pad border-top-soft">
    <div class="grid gap-10 lg:grid-cols-[0.78fr_1.22fr] lg:items-start">
        <div data-reveal>
            <p class="eyebrow">About</p>
            <h2 class="section-title mt-4 text-balance">Software for work that needs to feel clear.</h2>
        </div>
        <div class="space-y-5" data-reveal style="--delay: 90ms">
            <p class="body-lead">
                My work sits between backend structure and everyday usability: clean data flows, clear interfaces, useful dashboards, and product behavior that people can trust.
            </p>
            <p class="body-lead">
                I care about restraint in design, reliable implementation, and motion that gives the page a little life without distracting from the work.
            </p>
        </div>
    </div>
</section>

<section id="skills" class="section-wrap pb-20">
    <div class="grid gap-4 md:grid-cols-2">
        @foreach($skills as $title => $body)
            <article class="minimal-card p-6" data-reveal style="--delay: {{ $loop->index * 70 }}ms">
                <span class="card-index">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                <h3 class="mt-8 font-display text-xl font-bold">{{ $title }}</h3>
                <p class="mt-3 text-sm leading-7 text-[rgb(var(--muted))]">{{ $body }}</p>
            </article>
        @endforeach
    </div>
</section>

<section id="projects" class="section-wrap section-pad border-top-soft">
    <div class="mb-8 flex flex-col gap-5 md:flex-row md:items-end md:justify-between" data-reveal>
        <div class="max-w-3xl">
            <p class="eyebrow">Featured work</p>
            <h2 class="section-title mt-4">Selected systems, product builds, and landing pages.</h2>
            <p class="body-lead mt-4">
                Swipe through real builds and landing-page concepts shaped around clear interfaces, practical workflows, and focused product stories.
            </p>
        </div>
        <a href="{{ route('projects.index') }}" class="btn-secondary md:mb-1">All projects</a>
    </div>

    @if($signatureProjects->isNotEmpty())
        <div class="project-carousel" data-reveal style="--delay: 120ms">
            <div class="project-carousel__bar">
                <span class="card-index">{{ $signatureProjects->count() }} projects</span>
                <span class="project-carousel__hint">Continuous showcase</span>
            </div>
            <div class="project-carousel__viewport">
                <div class="project-carousel__track">
                    @foreach($signatureProjects->concat($signatureProjects) as $project)
                        <div class="project-slide">
                            <x-project-card :project="$project" :index="$loop->index" compact />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="surface p-8 text-center text-[rgb(var(--muted))]">No featured projects yet.</div>
    @endif
</section>

<section class="section-wrap section-pad border-top-soft">
    <div class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr]">
        <div data-reveal>
            <p class="eyebrow">Process</p>
            <h2 class="section-title mt-4 text-balance">A simple path from workflow to shipped product.</h2>
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
            <h2 class="section-title mt-4">Focused development for practical teams and products.</h2>
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
        <h2 class="section-title mt-4 max-w-3xl">
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
