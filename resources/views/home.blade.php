@extends('layouts.app')

@section('content')

{{-- ===================== HERO (Kodex Studio) ===================== --}}
<section class="relative -mt-16 overflow-hidden bg-[#0A0A0F] font-body">
    {{-- Resplandores de acento (violeta / cian) --}}
    <div class="pointer-events-none absolute inset-0 -z-10">
        <div class="absolute left-1/4 top-0 size-96 -translate-x-1/2 rounded-full bg-[#6C63FF]/20 blur-[120px]"></div>
        <div class="absolute bottom-0 right-1/4 size-80 translate-x-1/2 rounded-full bg-[#00D4FF]/10 blur-[120px]"></div>
    </div>

    {{-- Firma visual: bloque de código flotante (oculto en mobile) --}}
    <pre class="hero-code pointer-events-none absolute left-1/2 top-1/2 -z-10 hidden -translate-x-1/2 -translate-y-1/2 -rotate-3 text-left font-mono text-base leading-relaxed text-[#F0F0F8] md:block" aria-hidden="true"><span style="color:#8888AA">// Kodex Studio — desarrollo a medida</span>
<span style="color:#6C63FF">export default function</span> <span style="color:#00D4FF">App</span>() {
  <span style="color:#6C63FF">const</span> stack = [<span style="color:#00D4FF">"React"</span>, <span style="color:#00D4FF">"Next.js"</span>, <span style="color:#00D4FF">"Laravel"</span>];
  <span style="color:#6C63FF">return</span> &lt;<span style="color:#00D4FF">Producto</span> rapido escalable /&gt;;
}</pre>

    <div class="hero-fade-up relative mx-auto max-w-4xl px-6 pb-28 pt-32 text-center md:pb-36 md:pt-44">
        {{-- Badge --}}
        <span class="inline-flex items-center gap-2 rounded-full border border-[#1E1E2E] bg-[#1E1E2E]/60 px-4 py-1.5 text-sm text-[#F0F0F8]">
            <span class="hero-dot size-2 rounded-full bg-emerald-400"></span>
            Disponibles para nuevos proyectos
        </span>

        {{-- Headline (dos líneas) --}}
        <h1 class="font-display mx-auto mt-8 max-w-3xl font-bold leading-[1.1] tracking-tight text-[#F0F0F8]" style="font-size: clamp(2.2rem, 5vw, 3.8rem);">
            Webs y apps que tus<br>
            <span class="hero-headline-gradient">clientes usan de verdad.</span>
        </h1>

        {{-- Subheadline --}}
        <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-[#8888AA]">
            Desarrollo a medida con React, Next.js y Laravel. Sin templates.
            Sin agencias intermediarias. Solo resultados.
        </p>

        {{-- CTAs --}}
        <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
            <a href="{{ route('quote') }}" class="hero-cta-primary inline-flex w-full items-center justify-center gap-2 rounded-full bg-gradient-to-r from-[#6C63FF] to-[#00D4FF] px-8 py-3.5 font-medium text-white sm:w-auto">
                Solicitar cotización →
            </a>
            <a href="{{ route('home') }}#proyectos" class="inline-flex w-full items-center justify-center rounded-full border border-[#1E1E2E] px-8 py-3.5 font-medium text-[#F0F0F8] transition hover:border-[#6C63FF] hover:bg-[#6C63FF]/10 sm:w-auto">
                Ver proyectos
            </a>
        </div>

        {{-- Prueba social: logos de clientes --}}
        <div class="mt-14">
            <p class="text-sm text-[#8888AA]">Con la confianza de empresas en Chile y el extranjero</p>
            <div class="mt-6 flex flex-wrap items-center justify-center gap-x-10 gap-y-5 text-[#8888AA]">
                <div class="flex items-center gap-2 transition hover:text-[#F0F0F8]">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 3l10 18H2z"/></svg>
                    <span class="font-display text-lg font-bold">Norvik</span>
                </div>
                <div class="flex items-center gap-2 transition hover:text-[#F0F0F8]">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><circle cx="12" cy="12" r="9"/></svg>
                    <span class="font-display text-lg font-bold">Lumio</span>
                </div>
                <div class="flex items-center gap-2 transition hover:text-[#F0F0F8]">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2l10 10-10 10L2 12z"/></svg>
                    <span class="font-display text-lg font-bold">Vexa</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===================== PLANES (PRICING) ===================== --}}
<section id="servicios" class="border-y border-slate-200 bg-slate-50">
    <div class="mx-auto max-w-6xl px-6 py-20">
        <div class="reveal mb-14 text-center">
            <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">Planes</span>
            <h2 class="mt-2 text-3xl font-bold text-slate-900 md:text-4xl">Elige el plan ideal para ti</h2>
            <p class="mx-auto mt-4 max-w-xl text-slate-600">Cada plan está pensado para una necesidad distinta. Sin sorpresas ni letra chica.</p>
        </div>

        <div class="reveal mx-auto grid max-w-5xl items-stretch gap-8 lg:grid-cols-3">
            @foreach($services as $service)
                @php($featured = $service->is_featured)
                <div @class([
                        'relative flex flex-col rounded-3xl p-8 transition hover:shadow-xl',
                        'bg-gradient-to-br from-blue-600 to-indigo-700 text-white shadow-xl ring-2 ring-blue-500/50 lg:-mt-4 lg:mb-4' => $featured,
                        'border border-slate-200 bg-white shadow-sm' => ! $featured,
                    ])>
                    @if($featured)
                        <span class="absolute -top-3 left-1/2 -translate-x-1/2 rounded-full bg-amber-400 px-4 py-1 text-xs font-bold text-slate-900 shadow">
                            ★ Más popular
                        </span>
                    @endif

                    @if($service->icon)
                        <div class="mb-4 grid size-12 place-items-center rounded-xl {{ $featured ? 'bg-white/15 text-white' : 'bg-blue-50 text-blue-600' }}">
                            <x-dynamic-component :component="$service->icon" class="size-6" />
                        </div>
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

                    @if($service->delivery_time)
                        <p class="mt-3 inline-flex w-fit items-center gap-1.5 rounded-full px-3 py-1 text-xs font-medium {{ $featured ? 'bg-white/15 text-white' : 'bg-blue-50 text-blue-700' }}">
                            <x-heroicon-o-clock class="size-3.5" /> Entrega en {{ $service->delivery_time }}
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

                    <a href="{{ route('quote', ['plan' => $service->slug]) }}"
                       class="mt-8 rounded-full px-6 py-3 text-center text-sm font-semibold transition {{ $featured ? 'bg-white text-blue-600 hover:bg-blue-50' : 'bg-blue-600 text-white hover:bg-blue-700' }}">
                        Cotizar este plan
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
    <div class="reveal grid gap-8 md:grid-cols-3">
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
        <div class="reveal mb-14 text-center">
            <h2 class="text-3xl font-bold text-slate-900 md:text-4xl">Proyectos realizados</h2>
            <p class="mx-auto mt-4 max-w-xl text-slate-600">Algunos de los trabajos que hemos llevado a cabo.</p>
        </div>

        <div class="reveal grid gap-6 md:grid-cols-2 lg:grid-cols-3">
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
    <div class="reveal grid items-center gap-12 md:grid-cols-2">
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
                <p class="stat-count text-3xl font-bold text-blue-600" data-target="100" data-suffix="%">0%</p>
                <p class="mt-1 text-sm text-slate-500">Compromiso</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-6 text-center shadow-sm">
                <p class="stat-count text-3xl font-bold text-blue-600" data-target="10" data-prefix="+">+0</p>
                <p class="mt-1 text-sm text-slate-500">Clientes felices</p>
            </div>
            <div class="col-span-2 rounded-2xl border border-blue-100 bg-blue-50 p-6 text-center">
                <p class="text-lg font-semibold text-slate-900">Calidad en la que puedes confiar</p>
                <p class="mt-1 text-sm text-slate-600">Trabajamos para que tu negocio crezca con tranquilidad.</p>
            </div>
        </div>
    </div>
</section>

{{-- ===================== TESTIMONIOS ===================== --}}
<section class="border-y border-slate-200 bg-slate-50">
    <div class="mx-auto max-w-6xl px-6 py-20">
        <div class="reveal mb-14 text-center">
            <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">Testimonios</span>
            <h2 class="mt-2 text-3xl font-bold text-slate-900 md:text-4xl">Lo que dicen nuestros clientes</h2>
            <p class="mx-auto mt-4 max-w-xl text-slate-600">La confianza de quienes ya trabajaron con nosotros.</p>
        </div>
        <div class="reveal grid gap-6 md:grid-cols-3">
            @foreach([
                ['María González', 'Dueña de tienda', 'Quedé feliz con el resultado, súper profesional y atento en todo momento. ¡Lo recomiendo!'],
                ['Juan Pérez', 'Emprendedor', 'Cumplieron los plazos y el trato fue muy cercano. La comunicación por WhatsApp, excelente.'],
                ['Carla Soto', 'Gerente PyME', 'Muy buena calidad y atención. Sin duda volveré a contratar sus servicios.'],
            ] as $t)
                <figure class="flex flex-col rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
                    <div class="flex gap-0.5 text-amber-400">
                        @for($i = 0; $i < 5; $i++)
                            <x-heroicon-s-star class="size-5" />
                        @endfor
                    </div>
                    <blockquote class="mt-4 flex-1 text-slate-600">“{{ $t[2] }}”</blockquote>
                    <figcaption class="mt-6 flex items-center gap-3">
                        <div class="grid size-11 place-items-center rounded-full bg-blue-100 font-bold text-blue-700">{{ Str::substr($t[0], 0, 1) }}</div>
                        <div>
                            <p class="font-semibold text-slate-900">{{ $t[0] }}</p>
                            <p class="text-sm text-slate-500">{{ $t[1] }}</p>
                        </div>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================== FAQ ===================== --}}
<section class="mx-auto max-w-3xl px-6 py-20">
    <div class="reveal mb-14 text-center">
        <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">Preguntas frecuentes</span>
        <h2 class="mt-2 text-3xl font-bold text-slate-900 md:text-4xl">¿Tienes dudas?</h2>
    </div>
    <div class="reveal space-y-4">
        @foreach([
            ['¿Cómo solicito una cotización?', 'Haz clic en “Solicitar cotización”, elige el plan que te interesa y cuéntanos lo que necesitas. Te respondemos a la brevedad con una propuesta a tu medida.'],
            ['¿Cuánto tardan en responder?', 'Normalmente respondemos dentro de las primeras 24 horas hábiles.'],
            ['¿Los precios son fijos?', 'Los precios “desde” son una referencia. El valor final depende de los detalles de tu proyecto; por eso ofrecemos cotización personalizada y sin compromiso.'],
            ['¿Ofrecen soporte después de la entrega?', '¡Sí! Todos los planes incluyen acompañamiento y soporte por WhatsApp.'],
        ] as $faq)
            <details class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <summary class="flex cursor-pointer list-none items-center justify-between font-semibold text-slate-900 [&::-webkit-details-marker]:hidden">
                    {{ $faq[0] }}
                    <x-heroicon-o-chevron-down class="size-5 shrink-0 text-blue-600 transition duration-300 group-open:rotate-180" />
                </summary>
                <p class="mt-4 leading-relaxed text-slate-600">{{ $faq[1] }}</p>
            </details>
        @endforeach
    </div>
</section>

{{-- ===================== BANNER CTA ===================== --}}
<section class="px-6 py-16">
    <div class="reveal mx-auto max-w-5xl overflow-hidden rounded-3xl bg-gradient-to-br from-blue-600 to-indigo-700 px-8 py-14 text-center shadow-2xl shadow-blue-600/20">
        <h2 class="text-3xl font-bold text-white md:text-4xl">¿Listo para hacer crecer tu negocio?</h2>
        <p class="mx-auto mt-4 max-w-xl text-blue-100">Solicita tu cotización gratis y sin compromiso. Te respondemos en menos de 24 horas.</p>
        <a href="{{ route('quote') }}" class="mt-8 inline-block rounded-full bg-white px-8 py-3.5 text-base font-semibold text-blue-700 shadow-lg transition hover:scale-105">
            Solicitar cotización
        </a>
    </div>
</section>

{{-- ===================== CONTACTO ===================== --}}
<section id="contacto" class="border-t border-slate-200 bg-slate-50">
    <div class="mx-auto max-w-2xl px-6 py-20">
        <div class="reveal mb-10 text-center">
            <h2 class="text-3xl font-bold text-slate-900 md:text-4xl">Hablemos</h2>
            <p class="mt-4 text-slate-600">Cuéntanos qué necesitas y te respondemos a la brevedad.</p>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" class="reveal space-y-5">
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
                    class="w-full rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-3.5 text-base font-semibold text-white shadow-lg shadow-blue-600/25 transition duration-300 hover:-translate-y-0.5 hover:shadow-blue-600/40">
                Enviar mensaje
            </button>
        </form>
    </div>
</section>

@endsection
