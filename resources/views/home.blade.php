@extends('layouts.app')

@section('content')

{{-- ===================== HERO ===================== --}}
<section class="relative overflow-hidden bg-gradient-to-b from-blue-50 to-white">
    <div class="mx-auto max-w-6xl px-6 py-24 text-center md:py-32">
        <span class="inline-flex items-center gap-2 rounded-full border border-blue-200 bg-white px-4 py-1.5 text-sm font-medium text-blue-700 shadow-sm">
            <span class="size-2 animate-pulse rounded-full bg-emerald-500"></span>
            Disponibles para nuevos proyectos
        </span>

        <h1 class="mx-auto mt-8 max-w-3xl text-4xl font-bold leading-tight tracking-tight text-slate-900 md:text-6xl">
            Soluciones que
            <span class="text-blue-600">hacen crecer</span>
            tu negocio
        </h1>

        <p class="mx-auto mt-6 max-w-2xl text-lg text-slate-600">
            Servicios profesionales de calidad, con atención cercana y resultados que
            se notan. Cuéntanos qué necesitas y lo hacemos realidad.
        </p>

        <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
            <a href="#contacto" class="w-full rounded-full bg-blue-600 px-8 py-3.5 text-base font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 sm:w-auto">
                Solicitar información
            </a>
            <a href="#servicios" class="w-full rounded-full border border-slate-300 bg-white px-8 py-3.5 text-base font-semibold text-slate-700 transition hover:bg-slate-50 sm:w-auto">
                Ver servicios
            </a>
        </div>
    </div>
</section>

{{-- ===================== PLANES (PRICING) ===================== --}}
<section id="servicios" class="border-y border-slate-200 bg-slate-50">
    <div class="mx-auto max-w-6xl px-6 py-20">
        <div class="mb-14 text-center">
            <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">Planes</span>
            <h2 class="mt-2 text-3xl font-bold text-slate-900 md:text-4xl">Elige el plan ideal para ti</h2>
            <p class="mx-auto mt-4 max-w-xl text-slate-600">Cada plan está pensado para una necesidad distinta. Sin sorpresas ni letra chica.</p>
        </div>

        <div class="mx-auto grid max-w-5xl items-stretch gap-8 lg:grid-cols-3">
            @foreach($services as $service)
                @php($featured = $service->is_featured)
                <div @class([
                        'relative flex flex-col rounded-3xl p-8 transition hover:shadow-xl',
                        'bg-blue-600 text-white shadow-xl ring-2 ring-blue-600 lg:-mt-4 lg:mb-4' => $featured,
                        'border border-slate-200 bg-white shadow-sm' => ! $featured,
                    ])>
                    @if($featured)
                        <span class="absolute -top-3 left-1/2 -translate-x-1/2 rounded-full bg-amber-400 px-4 py-1 text-xs font-bold text-slate-900 shadow">
                            ★ Más popular
                        </span>
                    @endif

                    <h3 class="text-xl font-bold {{ $featured ? 'text-white' : 'text-slate-900' }}">{{ $service->title }}</h3>
                    @if($service->tagline)
                        <p class="mt-1 text-sm {{ $featured ? 'text-blue-100' : 'text-slate-500' }}">{{ $service->tagline }}</p>
                    @endif

                    @if($service->price_from)
                        <p class="mt-6 flex items-baseline gap-1.5">
                            <span class="text-sm font-medium {{ $featured ? 'text-blue-200' : 'text-slate-400' }}">Desde</span>
                            <span class="text-4xl font-extrabold {{ $featured ? 'text-white' : 'text-slate-900' }}">${{ number_format($service->price_from, 0) }}</span>
                        </p>
                    @endif

                    @if($service->description)
                        <p class="mt-4 text-sm {{ $featured ? 'text-blue-50' : 'text-slate-600' }}">{{ $service->description }}</p>
                    @endif

                    <ul class="mt-6 flex-1 space-y-3 border-t pt-6 {{ $featured ? 'border-white/20' : 'border-slate-100' }}">
                        @foreach($service->featureList() as $feature)
                            <li class="flex items-start gap-2.5 text-sm">
                                <x-heroicon-s-check-circle class="mt-0.5 size-5 shrink-0 {{ $featured ? 'text-amber-300' : 'text-blue-600' }}" />
                                <span class="{{ $featured ? 'text-blue-50' : 'text-slate-600' }}">{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <a href="#contacto"
                       class="mt-8 rounded-full px-6 py-3 text-center text-sm font-semibold transition {{ $featured ? 'bg-white text-blue-600 hover:bg-blue-50' : 'bg-blue-600 text-white hover:bg-blue-700' }}">
                        Quiero el {{ $service->title }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================== CÓMO TRABAJAMOS ===================== --}}
<section class="mx-auto max-w-6xl px-6 py-20">
    <div class="mb-14 text-center">
        <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">Proceso</span>
        <h2 class="mt-2 text-3xl font-bold text-slate-900 md:text-4xl">¿Cómo trabajamos?</h2>
        <p class="mx-auto mt-4 max-w-xl text-slate-600">Un proceso simple y transparente, de principio a fin.</p>
    </div>
    <div class="grid gap-8 md:grid-cols-3">
        @foreach([
            ['1', 'Cuéntanos tu idea', 'Nos escribes y conversamos sobre lo que necesitas, sin compromiso.'],
            ['2', 'Manos a la obra', 'Trabajamos en tu proyecto manteniéndote informado en cada paso.'],
            ['3', 'Entrega y soporte', 'Recibes el resultado final y te acompañamos también después de la entrega.'],
        ] as $step)
            <div class="rounded-2xl border border-slate-200 bg-white p-8 text-center shadow-sm">
                <div class="mx-auto grid size-12 place-items-center rounded-full bg-blue-600 text-lg font-bold text-white">{{ $step[0] }}</div>
                <h3 class="mt-5 text-lg font-semibold text-slate-900">{{ $step[1] }}</h3>
                <p class="mt-2 text-sm text-slate-600">{{ $step[2] }}</p>
            </div>
        @endforeach
    </div>
</section>

{{-- ===================== PROYECTOS ===================== --}}
<section id="proyectos" class="border-y border-slate-200 bg-slate-50">
    <div class="mx-auto max-w-6xl px-6 py-20">
        <div class="mb-14 text-center">
            <h2 class="text-3xl font-bold text-slate-900 md:text-4xl">Proyectos realizados</h2>
            <p class="mx-auto mt-4 max-w-xl text-slate-600">Algunos de los trabajos que hemos llevado a cabo.</p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($projects as $project)
                <a href="{{ route('projects.show', $project) }}"
                   class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                    <div class="aspect-video w-full overflow-hidden bg-gradient-to-br from-blue-100 to-blue-50">
                        @if($project->image_path)
                            <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="size-full object-cover transition duration-500 group-hover:scale-105">
                        @else
                            <div class="grid size-full place-items-center text-4xl font-bold text-blue-200">{{ Str::substr($project->title, 0, 1) }}</div>
                        @endif
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        @if($project->is_featured)
                            <span class="mb-3 w-fit rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">Destacado</span>
                        @endif
                        <h3 class="text-lg font-semibold text-slate-900">{{ $project->title }}</h3>
                        @if($project->summary)
                            <p class="mt-2 flex-1 text-sm text-slate-600">{{ $project->summary }}</p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================== NOSOTROS ===================== --}}
<section id="sobre-mi" class="mx-auto max-w-6xl px-6 py-20">
    <div class="grid items-center gap-12 md:grid-cols-2">
        <div>
            <h2 class="text-3xl font-bold text-slate-900 md:text-4xl">¿Por qué elegirnos?</h2>
            <p class="mt-5 text-slate-600">
                Nos enfocamos en entregar un servicio de calidad, con trato cercano y
                resultados que cumplen lo prometido. Tu satisfacción es nuestra prioridad.
            </p>
            <ul class="mt-8 space-y-4">
                @foreach(['Atención personalizada y cercana', 'Calidad garantizada en cada trabajo', 'Cumplimiento de los plazos acordados', 'Acompañamiento antes, durante y después'] as $punto)
                    <li class="flex items-start gap-3">
                        <x-heroicon-s-check-circle class="mt-0.5 size-5 shrink-0 text-blue-600" />
                        <span class="text-slate-700">{{ $punto }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-6 text-center shadow-sm">
                <p class="text-3xl font-bold text-blue-600">100%</p>
                <p class="mt-1 text-sm text-slate-500">Compromiso</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-6 text-center shadow-sm">
                <p class="text-3xl font-bold text-blue-600">+10</p>
                <p class="mt-1 text-sm text-slate-500">Clientes felices</p>
            </div>
            <div class="col-span-2 rounded-2xl border border-blue-100 bg-blue-50 p-6 text-center">
                <p class="text-lg font-semibold text-slate-900">Calidad en la que puedes confiar</p>
                <p class="mt-1 text-sm text-slate-600">Trabajamos para que tu negocio crezca con tranquilidad.</p>
            </div>
        </div>
    </div>
</section>

{{-- ===================== CONTACTO ===================== --}}
<section id="contacto" class="border-t border-slate-200 bg-slate-50">
    <div class="mx-auto max-w-2xl px-6 py-20">
        <div class="mb-10 text-center">
            <h2 class="text-3xl font-bold text-slate-900 md:text-4xl">Hablemos</h2>
            <p class="mt-4 text-slate-600">Cuéntanos qué necesitas y te respondemos a la brevedad.</p>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
            @csrf
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-slate-700">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder-slate-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                           placeholder="Tu nombre">
                    @error('name') <p class="mt-1.5 text-sm text-rose-500">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-slate-700">Correo</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                           class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder-slate-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                           placeholder="tu@correo.com">
                    @error('email') <p class="mt-1.5 text-sm text-rose-500">{{ $message }}</p> @enderror
                </div>
            </div>
            <div>
                <label for="subject" class="mb-2 block text-sm font-medium text-slate-700">Asunto <span class="text-slate-400">(opcional)</span></label>
                <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                       class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder-slate-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                       placeholder="¿En qué podemos ayudarte?">
            </div>
            <div>
                <label for="message" class="mb-2 block text-sm font-medium text-slate-700">Mensaje</label>
                <textarea name="message" id="message" rows="5"
                          class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder-slate-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                          placeholder="Describe lo que necesitas...">{{ old('message') }}</textarea>
                @error('message') <p class="mt-1.5 text-sm text-rose-500">{{ $message }}</p> @enderror
            </div>
            <button type="submit"
                    class="w-full rounded-full bg-blue-600 px-8 py-3.5 text-base font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700">
                Enviar mensaje
            </button>
        </form>
    </div>
</section>

@endsection
