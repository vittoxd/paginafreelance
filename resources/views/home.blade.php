@extends('layouts.app')

@section('content')

{{-- ===================== HERO ===================== --}}
<section class="relative overflow-hidden">
    {{-- Resplandor decorativo de fondo --}}
    <div class="pointer-events-none absolute -top-40 left-1/2 -z-10 h-[40rem] w-[60rem] -translate-x-1/2 rounded-full bg-gradient-to-tr from-indigo-600/30 via-fuchsia-600/20 to-transparent blur-3xl"></div>

    <div class="mx-auto max-w-6xl px-6 py-24 text-center md:py-32">
        <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-sm text-slate-300">
            <span class="size-2 animate-pulse rounded-full bg-emerald-400"></span>
            Disponible para nuevos proyectos
        </span>

        <h1 class="mx-auto mt-8 max-w-3xl text-4xl font-bold leading-tight tracking-tight text-white md:text-6xl">
            Construyo páginas web que
            <span class="bg-gradient-to-r from-indigo-400 to-fuchsia-400 bg-clip-text text-transparent">hacen crecer</span>
            tu negocio
        </h1>

        <p class="mx-auto mt-6 max-w-2xl text-lg text-slate-400">
            Desarrollo web a medida, landing pages que convierten y automatización con
            inteligencia artificial para PyMEs y emprendedores que quieren destacar.
        </p>

        <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
            <a href="#contacto" class="w-full rounded-full bg-gradient-to-r from-indigo-500 to-fuchsia-500 px-8 py-3.5 text-base font-semibold text-white shadow-lg shadow-indigo-500/25 transition hover:shadow-indigo-500/40 sm:w-auto">
                Empecemos tu proyecto
            </a>
            <a href="#proyectos" class="w-full rounded-full border border-white/15 px-8 py-3.5 text-base font-semibold text-white transition hover:bg-white/5 sm:w-auto">
                Ver mi trabajo
            </a>
        </div>
    </div>
</section>

{{-- ===================== SERVICIOS ===================== --}}
<section id="servicios" class="mx-auto max-w-6xl px-6 py-20">
    <div class="mb-14 text-center">
        <h2 class="text-3xl font-bold text-white md:text-4xl">Servicios</h2>
        <p class="mx-auto mt-4 max-w-xl text-slate-400">Soluciones digitales pensadas para resolver problemas reales de tu negocio.</p>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($services as $service)
            <div class="group relative rounded-2xl border border-white/10 bg-white/[0.03] p-7 transition hover:border-indigo-400/40 hover:bg-white/[0.06]">
                <div class="mb-5 grid size-12 place-items-center rounded-xl bg-gradient-to-br from-indigo-500/20 to-fuchsia-500/20 text-indigo-300">
                    @if($service->icon)
                        <x-dynamic-component :component="$service->icon" class="size-6" />
                    @else
                        <x-heroicon-o-sparkles class="size-6" />
                    @endif
                </div>
                <h3 class="text-lg font-semibold text-white">{{ $service->title }}</h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-400">{{ $service->description }}</p>
                @if($service->price_from)
                    <p class="mt-4 text-sm font-medium text-indigo-300">Desde ${{ number_format($service->price_from, 0) }}</p>
                @endif
            </div>
        @endforeach
    </div>
</section>

{{-- ===================== PROYECTOS ===================== --}}
<section id="proyectos" class="border-y border-white/5 bg-white/[0.02]">
    <div class="mx-auto max-w-6xl px-6 py-20">
        <div class="mb-14 text-center">
            <h2 class="text-3xl font-bold text-white md:text-4xl">Proyectos recientes</h2>
            <p class="mx-auto mt-4 max-w-xl text-slate-400">Algunos trabajos que he desarrollado para clientes reales.</p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($projects as $project)
                <a href="{{ route('projects.show', $project) }}"
                   class="group flex flex-col overflow-hidden rounded-2xl border border-white/10 bg-slate-900/50 transition hover:border-indigo-400/40">
                    <div class="aspect-video w-full overflow-hidden bg-gradient-to-br from-indigo-600/30 to-fuchsia-600/30">
                        @if($project->image_path)
                            <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="size-full object-cover transition duration-500 group-hover:scale-105">
                        @else
                            <div class="grid size-full place-items-center text-4xl font-bold text-white/20">{{ Str::substr($project->title, 0, 1) }}</div>
                        @endif
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        @if($project->is_featured)
                            <span class="mb-3 w-fit rounded-full bg-indigo-500/15 px-3 py-1 text-xs font-medium text-indigo-300">Destacado</span>
                        @endif
                        <h3 class="text-lg font-semibold text-white">{{ $project->title }}</h3>
                        <p class="mt-2 flex-1 text-sm text-slate-400">{{ $project->summary }}</p>
                        @if($project->tech_stack)
                            <p class="mt-4 text-xs text-slate-500">{{ $project->tech_stack }}</p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================== SOBRE MÍ ===================== --}}
<section id="sobre-mi" class="mx-auto max-w-6xl px-6 py-20">
    <div class="grid items-center gap-12 md:grid-cols-2">
        <div>
            <h2 class="text-3xl font-bold text-white md:text-4xl">¿Por qué trabajar conmigo?</h2>
            <p class="mt-5 text-slate-400">
                Soy desarrollador full stack enfocado en crear soluciones a medida. No vendo
                plantillas genéricas: escucho tu necesidad y construyo exactamente lo que tu
                negocio requiere, con tecnología moderna y mantenible.
            </p>
            <ul class="mt-8 space-y-4">
                @foreach(['Comunicación directa y cercana, sin intermediarios', 'Código moderno y mantenible (Laravel + Tailwind)', 'Entregas claras y plazos que se cumplen', 'Acompañamiento después del lanzamiento'] as $punto)
                    <li class="flex items-start gap-3">
                        <x-heroicon-s-check-circle class="mt-0.5 size-5 shrink-0 text-emerald-400" />
                        <span class="text-slate-300">{{ $punto }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="rounded-2xl border border-white/10 bg-white/[0.03] p-6 text-center">
                <p class="text-3xl font-bold text-white">100%</p>
                <p class="mt-1 text-sm text-slate-400">A medida</p>
            </div>
            <div class="rounded-2xl border border-white/10 bg-white/[0.03] p-6 text-center">
                <p class="text-3xl font-bold text-white">24/7</p>
                <p class="mt-1 text-sm text-slate-400">Soporte cercano</p>
            </div>
            <div class="col-span-2 rounded-2xl border border-indigo-400/20 bg-gradient-to-br from-indigo-500/10 to-fuchsia-500/10 p-6 text-center">
                <p class="text-lg font-semibold text-white">Tecnología que escala contigo</p>
                <p class="mt-1 text-sm text-slate-400">Tu web lista para crecer cuando tu negocio lo haga.</p>
            </div>
        </div>
    </div>
</section>

{{-- ===================== CONTACTO ===================== --}}
<section id="contacto" class="border-t border-white/5 bg-white/[0.02]">
    <div class="mx-auto max-w-2xl px-6 py-20">
        <div class="mb-10 text-center">
            <h2 class="text-3xl font-bold text-white md:text-4xl">Hablemos de tu proyecto</h2>
            <p class="mt-4 text-slate-400">Cuéntame qué necesitas y te respondo a la brevedad.</p>
        </div>

        {{-- Mensaje de éxito tras enviar --}}
        @if(session('success'))
            <div class="mb-6 rounded-xl border border-emerald-500/30 bg-emerald-500/10 px-5 py-4 text-sm text-emerald-300">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
            @csrf
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-slate-300">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="w-full rounded-xl border border-white/10 bg-slate-900/60 px-4 py-3 text-white placeholder-slate-500 outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/30"
                           placeholder="Tu nombre">
                    @error('name') <p class="mt-1.5 text-sm text-rose-400">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-slate-300">Correo</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                           class="w-full rounded-xl border border-white/10 bg-slate-900/60 px-4 py-3 text-white placeholder-slate-500 outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/30"
                           placeholder="tu@correo.com">
                    @error('email') <p class="mt-1.5 text-sm text-rose-400">{{ $message }}</p> @enderror
                </div>
            </div>
            <div>
                <label for="subject" class="mb-2 block text-sm font-medium text-slate-300">Asunto <span class="text-slate-500">(opcional)</span></label>
                <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                       class="w-full rounded-xl border border-white/10 bg-slate-900/60 px-4 py-3 text-white placeholder-slate-500 outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/30"
                       placeholder="¿En qué puedo ayudarte?">
            </div>
            <div>
                <label for="message" class="mb-2 block text-sm font-medium text-slate-300">Mensaje</label>
                <textarea name="message" id="message" rows="5"
                          class="w-full rounded-xl border border-white/10 bg-slate-900/60 px-4 py-3 text-white placeholder-slate-500 outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/30"
                          placeholder="Describe tu idea o necesidad...">{{ old('message') }}</textarea>
                @error('message') <p class="mt-1.5 text-sm text-rose-400">{{ $message }}</p> @enderror
            </div>
            <button type="submit"
                    class="w-full rounded-full bg-gradient-to-r from-indigo-500 to-fuchsia-500 px-8 py-3.5 text-base font-semibold text-white shadow-lg shadow-indigo-500/25 transition hover:shadow-indigo-500/40">
                Enviar mensaje
            </button>
        </form>
    </div>
</section>

@endsection
