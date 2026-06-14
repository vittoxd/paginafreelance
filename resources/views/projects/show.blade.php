@extends('layouts.app')

@section('title', $project->title)
@section('meta_description', $project->summary)

@section('content')
<article class="mx-auto max-w-3xl px-6 py-20">

    <a href="{{ route('home') }}#proyectos" class="inline-flex items-center gap-2 text-sm text-slate-500 transition hover:text-blue-600">
        <x-heroicon-o-arrow-left class="size-4" />
        Volver a proyectos
    </a>

    <div class="mt-8">
        @if($project->is_featured)
            <span class="mb-4 inline-block rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">Destacado</span>
        @endif
        <h1 class="text-3xl font-bold text-slate-900 md:text-5xl">{{ $project->title }}</h1>
        @if($project->summary)
            <p class="mt-4 text-lg text-slate-600">{{ $project->summary }}</p>
        @endif
    </div>

    {{-- Imagen o placeholder --}}
    <div class="mt-10 aspect-video w-full overflow-hidden rounded-2xl border border-slate-200 bg-gradient-to-br from-blue-100 to-blue-50">
        @if($project->image_path)
            <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="size-full object-cover">
        @else
            <div class="grid size-full place-items-center text-6xl font-bold text-blue-200">{{ Str::substr($project->title, 0, 1) }}</div>
        @endif
    </div>

    {{-- Descripción larga (si existe) --}}
    @if($project->description)
        <div class="mt-10 leading-relaxed text-slate-700">
            {!! nl2br(e($project->description)) !!}
        </div>
    @endif

    {{-- CTA final --}}
    <div class="mt-16 rounded-2xl border border-blue-100 bg-blue-50 p-8 text-center">
        <h2 class="text-xl font-semibold text-slate-900">¿Quieres algo así para tu negocio?</h2>
        <a href="{{ route('home') }}#contacto" class="mt-5 inline-block rounded-full bg-blue-600 px-8 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">
            Contáctanos
        </a>
    </div>

</article>
@endsection
