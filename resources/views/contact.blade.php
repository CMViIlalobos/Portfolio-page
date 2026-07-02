@extends('layouts.app')

@section('title', 'Contact Carlos Miguel')
@section('description', 'Contact Carlos Miguel S. Villalobos for Laravel, Flutter, dashboard, workflow system, and full-stack development opportunities.')

@section('content')
<section class="section-wrap grid gap-8 pb-24 pt-12 lg:grid-cols-[0.9fr_1.1fr] lg:pt-16">
    <div class="flex flex-col justify-between gap-8" data-reveal>
        <div>
            <p class="eyebrow eyebrow-live">Open to new work</p>
            <h1 class="display-title mt-5 text-balance">Let's make the next workflow clearer.</h1>
            <p class="body-lead mt-6 max-w-2xl">
                I am open to developer roles, Laravel systems, Flutter apps, dashboards, workflow platforms, and focused full-stack product builds.
            </p>
        </div>

        <div class="grid gap-3">
            <a href="mailto:villaloboscarlosmiguel@gmail.com" class="surface flex items-center justify-between gap-4 p-4 transition hover:-translate-y-1">
                <span>
                    <span class="block text-[0.68rem] font-semibold uppercase tracking-[0.1em] text-[rgb(var(--brand))]">Email</span>
                    <span class="mt-1 block text-sm font-semibold">villaloboscarlosmiguel@gmail.com</span>
                </span>
                <span class="text-[rgb(var(--brand))]">Send</span>
            </a>
            <a href="tel:+639085929220" class="surface flex items-center justify-between gap-4 p-4 transition hover:-translate-y-1">
                <span>
                    <span class="block text-[0.68rem] font-semibold uppercase tracking-[0.1em] text-[rgb(var(--brand))]">Phone</span>
                    <span class="mt-1 block text-sm font-semibold">0908-592-9220</span>
                </span>
                <span class="text-[rgb(var(--brand))]">Call</span>
            </a>
        </div>
    </div>

    <div class="surface p-5 md:p-7" data-reveal style="--delay: 120ms">
        @if(session('success'))
            <div class="mb-5 border border-[rgb(var(--brand)/0.35)] bg-[rgb(var(--brand)/0.08)] p-4 text-sm font-bold text-[rgb(var(--brand))]" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-5 border border-[rgb(var(--danger)/0.35)] bg-[rgb(var(--danger)/0.08)] p-4 text-sm font-bold text-[rgb(var(--danger))]" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('contact.send') }}" method="POST" class="grid gap-5" novalidate>
            @csrf
            <div class="grid gap-5 sm:grid-cols-2">
                <label class="grid gap-2 text-xs font-semibold uppercase tracking-[0.1em] text-[rgb(var(--muted))]" for="name">
                    Full name
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required class="field normal-case tracking-normal" placeholder="Your name" aria-invalid="@error('name') true @enderror" aria-describedby="@error('name') name-error @enderror">
                    @error('name')<span id="name-error" class="error-text">{{ $message }}</span>@enderror
                </label>
                <label class="grid gap-2 text-xs font-semibold uppercase tracking-[0.1em] text-[rgb(var(--muted))]" for="email">
                    Email
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required class="field normal-case tracking-normal" placeholder="you@example.com" aria-invalid="@error('email') true @enderror" aria-describedby="@error('email') email-error @enderror">
                    @error('email')<span id="email-error" class="error-text">{{ $message }}</span>@enderror
                </label>
            </div>
            <label class="grid gap-2 text-xs font-semibold uppercase tracking-[0.1em] text-[rgb(var(--muted))]" for="subject">
                Subject
                <input id="subject" name="subject" type="text" value="{{ old('subject') }}" required class="field normal-case tracking-normal" placeholder="Developer role or project inquiry" aria-invalid="@error('subject') true @enderror" aria-describedby="@error('subject') subject-error @enderror">
                @error('subject')<span id="subject-error" class="error-text">{{ $message }}</span>@enderror
            </label>
            <label class="grid gap-2 text-xs font-semibold uppercase tracking-[0.1em] text-[rgb(var(--muted))]" for="message">
                Message
                <textarea id="message" name="message" rows="7" required class="field resize-none normal-case tracking-normal" placeholder="Tell me about the system, app, dashboard, or product you want to build." aria-invalid="@error('message') true @enderror" aria-describedby="@error('message') message-error @enderror">{{ old('message') }}</textarea>
                @error('message')<span id="message-error" class="error-text">{{ $message }}</span>@enderror
            </label>
            <button type="submit" class="btn-primary w-full" data-magnetic>Send message</button>
            <p class="text-center text-xs font-medium text-[rgb(var(--muted))]">Replies usually land within one business day.</p>
        </form>
    </div>
</section>
@endsection
