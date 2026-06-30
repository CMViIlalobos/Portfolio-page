@extends('layouts.app')

@section('title', $category . ' Projects')
@section('description', 'Portfolio projects in the ' . $category . ' category by Carlos Miguel S. Villalobos.')

@section('content')
<section class="section-wrap grid gap-10 pb-12 pt-12 md:pb-16 md:pt-16 lg:grid-cols-[0.95fr_1.05fr] lg:items-center">
    <div class="max-w-4xl" data-reveal>
        <p class="eyebrow">Focused work</p>
        <h1 class="display-title mt-5 text-balance">{{ $category }} projects shaped for clarity.</h1>
        <p class="body-lead mt-6 max-w-2xl">
            A focused view of work connected to {{ $category }} outcomes, product behavior, and system design.
        </p>
    </div>

    <div class="three-scene three-scene-page" data-three-scene="projects" data-reveal style="--delay: 120ms" aria-label="Animated 3D category gallery scene">
        <canvas></canvas>
    </div>

    <nav class="flex flex-wrap gap-2 lg:col-span-2" data-reveal style="--delay: 80ms" aria-label="Filter projects by category">
        <a
            href="{{ route('projects.index') }}"
            class="tag hover:border-teal-500 hover:text-teal-700 dark:hover:text-teal-200"
        >All</a>
        @foreach(($allCategories ?? collect([$category])) as $cat)
            <a
                href="{{ route('projects.category', $cat) }}"
                class="tag {{ $cat === $category ? 'border-slate-950 bg-slate-950 text-white dark:border-white dark:bg-white dark:text-slate-950' : 'hover:border-teal-500 hover:text-teal-700 dark:hover:text-teal-200' }}"
                @if($cat === $category) aria-current="page" @endif
            >{{ $cat }}</a>
        @endforeach
    </nav>
</section>

<section class="section-wrap pb-24">
    <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
        @forelse($projects as $project)
            <x-project-card :project="$project" :index="$loop->index" />
        @empty
            <div class="surface p-12 text-center lg:col-span-3">
                <p class="font-display text-xl font-bold text-slate-950 dark:text-white">No {{ $category }} projects yet.</p>
                <p class="mt-2 text-sm font-medium text-slate-500 dark:text-slate-400">This category is still being built out — browse everything else in the meantime.</p>
                <a href="{{ route('projects.index') }}" class="btn-primary mt-6">Browse all projects</a>
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
