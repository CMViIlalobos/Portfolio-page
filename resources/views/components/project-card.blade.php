@props([
    'project',
    'index' => 0,
    'compact' => false,
])

@php
    $techArray = is_string($project->technologies)
        ? json_decode($project->technologies, true)
        : ($project->technologies ?? []);
    $delay = ($index % 3) * 80;
    $previewClass = 'project-landing-preview--' . \Illuminate\Support\Str::slug($project->slug ?? $project->title);
    $initials = collect(explode(' ', $project->title))
        ->map(fn ($word) => mb_substr($word, 0, 1))
        ->take(2)
        ->implode('');
@endphp

<article class="project-card premium-card" data-reveal style="--delay: {{ $delay }}ms">
    <a href="{{ route('projects.show', $project->slug) }}" class="project-media block" aria-label="Open {{ $project->title }} case study">
        @if(!empty($project->cover_image))
            <img src="{{ asset($project->cover_image) }}" alt="{{ $project->title }} interface preview" loading="lazy">
        @else
            <div class="project-landing-preview {{ $previewClass }}">
                <div class="project-landing-preview__page">
                    <div class="project-landing-preview__nav">
                        <span></span>
                        <span></span>
                        <span></span>
                        <i></i>
                    </div>
                    <div class="project-landing-preview__screen">
                        <aside class="project-landing-preview__sidebar" aria-hidden="true">
                            <b></b>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </aside>
                        <div class="project-landing-preview__workspace">
                            <div class="project-landing-preview__hero">
                                <span>{{ $project->category }}</span>
                                <strong>{{ $project->title }}</strong>
                                <p>{{ \Illuminate\Support\Str::words($project->excerpt, 9) }}</p>
                            </div>
                            <div class="project-landing-preview__metrics" aria-hidden="true">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="project-landing-preview__content" aria-hidden="true">
                                <div class="project-landing-preview__chart">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="project-landing-preview__panel">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="project-video-slot">
            {{-- HIGGSFIELD PROJECT PREVIEW VIDEO:
                 Add a short loop at public/higgsfield/projects/{{ $project->slug }}-preview.mp4
                 and replace this overlay with a muted autoplay <video>. --}}
            <span class="bg-[rgb(var(--bg)/0.92)] px-3 py-1.5 text-[0.68rem] font-semibold uppercase tracking-[0.09em] text-[rgb(var(--ink))]">
                Page preview
            </span>
        </div>
    </a>

    <div class="relative z-10 flex flex-1 flex-col p-5">
        <div class="mb-4 flex flex-wrap items-center gap-2">
            <span class="tag">{{ $project->category }}</span>
            @if(!empty($project->featured))
                <span class="tag tag-brand">Featured</span>
            @endif
        </div>

        <div class="project-title-row">
            <span class="project-icon" aria-hidden="true">{{ $initials }}</span>
            <h3 class="font-display text-xl font-bold leading-tight">{{ $project->title }}</h3>
        </div>
        <p class="mt-3 flex-1 text-sm leading-7 text-[rgb(var(--muted))]">
            {{ \Illuminate\Support\Str::words($project->excerpt, $compact ? 15 : 22) }}
        </p>

        <div class="mt-5 flex flex-wrap gap-2">
            @foreach(array_slice($techArray ?? [], 0, $compact ? 4 : 5) as $tech)
                <span class="tag">{{ $tech }}</span>
            @endforeach
        </div>

        <a href="{{ route('projects.show', $project->slug) }}" class="mt-6 inline-flex items-center gap-2 text-sm font-bold text-[rgb(var(--ink))] transition hover:text-[rgb(var(--brand))]">
            Open case study
            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd"/>
            </svg>
        </a>
    </div>
</article>
