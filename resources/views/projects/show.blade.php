@extends('layouts.app')

@section('title', $project->title . ' — Kodex Studio')
@section('meta_description', $project->summary)

@section('content')
<article class="mx-auto max-w-3xl px-6 py-20 font-body">

    <a href="{{ route('home') }}#proyectos" class="inline-flex items-center gap-2 text-sm text-[#94A3B8] transition hover:text-[#818CF8]">
        <x-heroicon-o-arrow-left class="size-4" />
        Volver a proyectos
    </a>

    <div class="mt-8">
        @if($project->is_featured)
            <span class="mb-4 inline-block rounded-full bg-amber-400/15 px-3 py-1 text-xs font-semibold text-amber-300">Destacado</span>
        @endif
        <h1 class="text-3xl font-bold text-[#F0F0F8] md:text-5xl">{{ $project->title }}</h1>
        @if($project->summary)
            <p class="mt-4 text-lg text-[#94A3B8]">{{ $project->summary }}</p>
        @endif
    </div>

    {{-- Imagen o placeholder --}}
    <div class="mt-10 aspect-video w-full overflow-hidden rounded-2xl border border-[#2A3142] bg-gradient-to-br from-[#6C63FF]/20 to-[#00D4FF]/10">
        @if($project->image_path)
            <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="size-full object-cover">
        @else
            <div class="grid size-full place-items-center text-6xl font-bold text-[#6C63FF]/40">{{ Str::substr($project->title, 0, 1) }}</div>
        @endif
    </div>

    {{-- Descripción larga (si existe) --}}
    @if($project->description)
        <div class="mt-10 leading-relaxed text-[#E2E8F0]">
            {!! nl2br(e($project->description)) !!}
        </div>
    @endif

    {{-- CTA final --}}
    <div class="mt-16 rounded-2xl border border-[#6C63FF]/25 bg-[#6C63FF]/10 p-8 text-center">
        <h2 class="text-xl font-semibold text-[#F0F0F8]">¿Quieres algo así para tu negocio?</h2>
        <a href="{{ route('home') }}#contacto" class="mt-5 inline-block rounded-full bg-gradient-to-r from-[#6C63FF] to-[#00D4FF] px-8 py-3 text-sm font-semibold text-white transition hover:opacity-90">
            Contáctanos
        </a>
    </div>

</article>
@endsection
