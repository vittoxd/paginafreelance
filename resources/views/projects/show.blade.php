@extends('layouts.app')

@section('title', $project->title . ' — Estudio Freelance')
@section('meta_description', $project->summary)

@section('content')
<article class="mx-auto max-w-3xl px-6 py-20">

    <a href="{{ route('home') }}#proyectos" class="inline-flex items-center gap-2 text-sm text-slate-400 transition hover:text-white">
        <x-heroicon-o-arrow-left class="size-4" />
        Volver a proyectos
    </a>

    <div class="mt-8">
        @if($project->is_featured)
            <span class="mb-4 inline-block rounded-full bg-indigo-500/15 px-3 py-1 text-xs font-medium text-indigo-300">Destacado</span>
        @endif
        <h1 class="text-3xl font-bold text-white md:text-5xl">{{ $project->title }}</h1>
        <p class="mt-4 text-lg text-slate-400">{{ $project->summary }}</p>
    </div>

    {{-- Imagen o placeholder --}}
    <div class="mt-10 aspect-video w-full overflow-hidden rounded-2xl border border-white/10 bg-gradient-to-br from-indigo-600/30 to-fuchsia-600/30">
        @if($project->image_path)
            <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="size-full object-cover">
        @else
            <div class="grid size-full place-items-center text-6xl font-bold text-white/20">{{ Str::substr($project->title, 0, 1) }}</div>
        @endif
    </div>

    {{-- Ficha técnica --}}
    <div class="mt-10 grid gap-4 rounded-2xl border border-white/10 bg-white/[0.03] p-6 sm:grid-cols-3">
        @if($project->client)
            <div>
                <p class="text-xs uppercase tracking-wide text-slate-500">Cliente</p>
                <p class="mt-1 font-medium text-white">{{ $project->client }}</p>
            </div>
        @endif
        @if($project->tech_stack)
            <div>
                <p class="text-xs uppercase tracking-wide text-slate-500">Tecnologías</p>
                <p class="mt-1 font-medium text-white">{{ $project->tech_stack }}</p>
            </div>
        @endif
        @if($project->completed_at)
            <div>
                <p class="text-xs uppercase tracking-wide text-slate-500">Finalizado</p>
                <p class="mt-1 font-medium text-white">{{ $project->completed_at->translatedFormat('F Y') }}</p>
            </div>
        @endif
    </div>

    {{-- Descripción larga --}}
    <div class="mt-10 leading-relaxed text-slate-300">
        {!! nl2br(e($project->description)) !!}
    </div>

    @if($project->project_url)
        <a href="{{ $project->project_url }}" target="_blank" rel="noopener"
           class="mt-10 inline-flex items-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-900 transition hover:bg-indigo-100">
            Ver proyecto en vivo
            <x-heroicon-o-arrow-top-right-on-square class="size-4" />
        </a>
    @endif

    {{-- CTA final --}}
    <div class="mt-16 rounded-2xl border border-indigo-400/20 bg-gradient-to-br from-indigo-500/10 to-fuchsia-500/10 p-8 text-center">
        <h2 class="text-xl font-semibold text-white">¿Quieres algo así para tu negocio?</h2>
        <a href="{{ route('home') }}#contacto" class="mt-5 inline-block rounded-full bg-gradient-to-r from-indigo-500 to-fuchsia-500 px-8 py-3 text-sm font-semibold text-white transition hover:opacity-90">
            Hablemos
        </a>
    </div>

</article>
@endsection
