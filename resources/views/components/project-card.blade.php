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
@endphp

<article class="project-card premium-card" data-reveal style="--delay: {{ $delay }}ms">
    <a href="{{ route('projects.show', $project->slug) }}" class="project-media block" aria-label="Open {{ $project->title }} case study">
        @if(!empty($project->cover_image))
            <img src="{{ asset($project->cover_image) }}" alt="{{ $project->title }} interface preview" loading="lazy">
        @else
            <div class="grid h-full place-items-center p-5 text-white">
                <div class="w-full max-w-xs rounded-lg border border-white/10 bg-white/10 p-4 backdrop-blur">
                    <div class="mb-4 flex items-center justify-between">
                        <span class="text-[0.68rem] font-semibold uppercase tracking-[0.1em] text-white/60">{{ $project->category }}</span>
                        <span class="h-2 w-2 rounded-full bg-teal-300"></span>
                    </div>
                    <div class="grid grid-cols-4 gap-2">
                        @for($i = 1; $i <= 16; $i++)
                            <span class="h-8 rounded {{ $i % 5 === 0 ? 'bg-amber-300' : ($i % 4 === 0 ? 'bg-teal-300' : 'bg-white/15') }}"></span>
                        @endfor
                    </div>
                </div>
            </div>
        @endif

        <div class="project-video-slot">
            {{-- HIGGSFIELD PROJECT PREVIEW VIDEO:
                 Add a short loop at public/higgsfield/projects/{{ $project->slug }}-preview.mp4
                 and replace this overlay with a muted autoplay <video>. --}}
            <span class="rounded-md bg-white/92 px-3 py-1.5 text-[0.68rem] font-semibold uppercase tracking-[0.09em] text-slate-950">
                Motion preview
            </span>
        </div>
    </a>

    <div class="relative z-10 flex flex-1 flex-col p-5">
        <div class="mb-4 flex flex-wrap items-center gap-2">
            <span class="tag">{{ $project->category }}</span>
            @if(!empty($project->featured))
                <span class="tag border-teal-500/30 bg-teal-500/10 text-teal-700 dark:text-teal-200">Featured</span>
            @endif
        </div>

        <h3 class="font-display text-xl font-bold leading-tight text-slate-950 dark:text-white">{{ $project->title }}</h3>
        <p class="mt-3 flex-1 text-sm font-medium leading-6 text-slate-600 dark:text-slate-300">
            {{ \Illuminate\Support\Str::words($project->excerpt, $compact ? 15 : 22) }}
        </p>

        <div class="mt-5 flex flex-wrap gap-2">
            @foreach(array_slice($techArray ?? [], 0, $compact ? 4 : 5) as $tech)
                <span class="tag">{{ $tech }}</span>
            @endforeach
        </div>

        <a href="{{ route('projects.show', $project->slug) }}" class="mt-6 inline-flex items-center gap-2 text-sm font-bold text-slate-950 transition hover:text-teal-700 dark:text-white dark:hover:text-teal-200">
            Open case study
            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd"/>
            </svg>
        </a>
    </div>
</article>
