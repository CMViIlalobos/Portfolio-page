@extends('layouts.app')

@section('title', 'About Carlos Miguel')
@section('description', 'About Carlos Miguel S. Villalobos: Laravel, Flutter, dashboard, workflow system, and product interface developer.')

@section('content')
@php
    $principles = [
        ['title' => 'Model the workflow', 'body' => 'I clarify users, edge cases, data structures, system states, and the decisions the product needs to handle.'],
        ['title' => 'Make interfaces scannable', 'body' => 'I design screens with strong hierarchy, clear actions, readable tables, and predictable responsive behavior.'],
        ['title' => 'Build for maintainability', 'body' => 'I value clean components, clear naming, useful documentation, QA notes, and code that can keep evolving.'],
    ];
@endphp

<section class="section-wrap hero-editorial">
    <div data-reveal>
        <p class="eyebrow">About</p>
        <h1 class="display-title mt-5 text-balance">A practical developer for workflow-heavy products.</h1>
        <p class="body-lead mt-6">
            I build Laravel systems, Flutter apps, dashboards, records, and admin workflows. I care about clean product behavior, reliable backend logic, readable interfaces, and code that is easy to continue improving.
        </p>
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="{{ route('projects.index') }}" class="btn-primary">View projects</a>
            <a href="{{ route('contact') }}" class="btn-secondary">Work together</a>
        </div>
    </div>

    <aside class="side-col" data-reveal style="--delay: 120ms">
        <div class="circle-accent"></div>
        <div class="vertical-text">Design and Build</div>
    </aside>
</section>

<section class="section-wrap pb-20">
    <div class="grid gap-4 md:grid-cols-3">
        @foreach($principles as $principle)
            <article class="premium-card p-6" data-reveal style="--delay: {{ $loop->index * 80 }}ms">
                <span class="mb-8 block h-px w-12 bg-[rgb(var(--brand))]"></span>
                <h2 class="font-display text-lg font-bold">{{ $principle['title'] }}</h2>
                <p class="mt-4 text-sm leading-7 text-[rgb(var(--muted))]">{{ $principle['body'] }}</p>
            </article>
        @endforeach
    </div>
</section>

<section class="section-wrap pb-24">
    <div class="surface grid gap-8 p-6 md:p-8 lg:grid-cols-[0.8fr_1.2fr]">
        <div data-reveal>
            <p class="eyebrow">Profile</p>
            <h2 class="mt-4 font-display text-2xl font-bold">What I bring to a development team</h2>
        </div>
        <div class="grid gap-4 sm:grid-cols-2">
            @foreach(['Laravel application development', 'Flutter mobile development', 'Dashboard and admin UI design', 'API and database workflows', 'Responsive Tailwind interfaces', 'Careful QA and documentation'] as $item)
                <div class="border border-[rgb(var(--line))] bg-[rgb(var(--panel)/0.45)] p-4 text-sm text-[rgb(var(--muted))]" data-reveal style="--delay: {{ $loop->index * 45 }}ms">
                    {{ $item }}
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
