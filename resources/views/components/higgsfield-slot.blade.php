@props([
    'label' => 'Media-ready panel',
    'path' => 'public/higgsfield/',
    'ratio' => 'aspect-[16/10]',
    'title' => 'Interface motion panel',
    'description' => 'Prepared for a generated image or video asset.',
])

<div {{ $attributes->merge(['class' => "media-slot media-slot-grid {$ratio} overflow-hidden p-4"]) }}>
    {{-- HIGGSFIELD ASSET SLOT:
         Place the generated file at {{ $path }} and replace this placeholder with an <img> or muted <video>. --}}
    <span class="sr-only">{{ $label }}. {{ $description }} File path: {{ $path }}</span>
    <div class="media-window dev-3d-window relative z-10 grid h-full content-between overflow-hidden rounded-lg border border-slate-950/10 bg-white/55 p-4 shadow-sm shadow-slate-950/5 backdrop-blur dark:border-white/10 dark:bg-slate-950/35">
        <div class="flex items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <span class="h-2.5 w-2.5 rounded-full bg-teal-500"></span>
                <span class="h-2.5 w-2.5 rounded-full bg-sky-500"></span>
                <span class="h-2.5 w-2.5 rounded-full bg-amber-400"></span>
            </div>
            <span class="h-2 w-20 rounded-full bg-slate-950/10 dark:bg-white/15"></span>
        </div>

        <div class="dev-3d-stage" aria-hidden="true">
            <div class="dev-orbit-ring dev-orbit-ring-one"></div>
            <div class="dev-orbit-ring dev-orbit-ring-two"></div>
            <span class="dev-node dev-node-one"></span>
            <span class="dev-node dev-node-two"></span>
            <span class="dev-node dev-node-three"></span>

            <div class="dev-panel dev-panel-left">
                <span></span><span></span><span></span>
            </div>

            <div class="dev-cube">
                <div class="dev-cube-face dev-cube-front">
                    <strong>API</strong>
                    <span></span><span></span><span></span>
                </div>
                <div class="dev-cube-face dev-cube-back">
                    <strong>DB</strong>
                    <span></span><span></span><span></span>
                </div>
                <div class="dev-cube-face dev-cube-right">
                    <strong>UI</strong>
                    <span></span><span></span><span></span>
                </div>
                <div class="dev-cube-face dev-cube-left">
                    <strong>APP</strong>
                    <span></span><span></span><span></span>
                </div>
            </div>

            <div class="dev-panel dev-panel-right">
                <div class="dev-mini-grid">
                    @for($i = 1; $i <= 18; $i++)
                        <span style="--cell-delay: {{ ($i % 6) * 130 }}ms"></span>
                    @endfor
                </div>
            </div>

            <div class="dev-code-stream">
                <span>Route::get()</span>
                <span>Project::query()</span>
                <span>Flutter UI</span>
                <span>REST API</span>
                <span>Tailwind</span>
            </div>
        </div>

        <div>
            <h3 class="font-display text-lg font-bold text-slate-950 dark:text-white">{{ $title }}</h3>
            <p class="mt-2 max-w-lg text-sm font-medium leading-6 text-slate-600 dark:text-slate-300">{{ $description }}</p>
        </div>
    </div>
</div>
