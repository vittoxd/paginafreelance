@extends('layouts.app')

@section('content')

{{-- ===================== HERO ===================== --}}
<header class="kodex-hero">
    <div class="kodex-hero__glow"></div>
    <div class="kodex-hero__inner">

        <span class="kodex-badge kodex-reveal">
            <span class="kodex-badge__dot"></span>
            Disponibles para nuevos proyectos
        </span>

        <h1 class="kodex-hero__title">
            <span class="kodex-words">Tu negocio funciona,</span>
            <span class="kodex-words kodex-line--grad">pero tu web no lo está ayudando.</span>
        </h1>

        <p class="kodex-hero__subtitle kodex-reveal" data-delay="200">
            Soy Víctor, desarrollador en Rancagua. Construyo webs, apps y sistemas a medida
            para PyMEs chilenas que ya tienen clientes y quieren dejar de perder tiempo —y plata—
            en procesos manuales o en una página que da vergüenza pasar.
        </p>

        <div class="kodex-hero__ctas kodex-reveal" data-delay="300">
            <a href="{{ route('quote') }}" class="kodex-btn-primary">Agenda una llamada gratis →</a>
            <a href="#proyectos" class="kodex-btn-secondary">Ver proyectos</a>
        </div>

        <div class="kodex-hero__social kodex-reveal" data-delay="400">
            <p>Con la confianza de empresas en Chile y el extranjero</p>
            <div class="kodex-logos">
                <span class="kodex-logo">
                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 3l10 18H2z"/></svg>
                    Norvik
                </span>
                <span class="kodex-logo">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><circle cx="12" cy="12" r="9"/></svg>
                    Lumio
                </span>
                <span class="kodex-logo">
                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2l10 10-10 10L2 12z"/></svg>
                    Vexa
                </span>
            </div>
        </div>

    </div>
</header>

<div class="kodex-separator kodex-separator--primary-to-secondary"></div>

{{-- ===================== STATS ===================== --}}
<section class="kodex-stats">
    <div class="kodex-stats__inner">
        <div class="kodex-reveal">
            <div class="kodex-stat__num kodex-grad-text"><span class="kodex-counter" data-target="10" data-suffix="+">0</span></div>
            <p class="kodex-stat__label">Clientes satisfechos</p>
        </div>
        <div class="kodex-reveal" data-delay="100">
            <div class="kodex-stat__num kodex-grad-text"><span class="kodex-counter" data-target="15" data-suffix="+">0</span></div>
            <p class="kodex-stat__label">Proyectos entregados</p>
        </div>
        <div class="kodex-reveal" data-delay="200">
            <div class="kodex-stat__num kodex-grad-text"><span class="kodex-counter" data-target="3" data-suffix=" años">0</span></div>
            <p class="kodex-stat__label">De experiencia</p>
        </div>
    </div>
</section>

<div class="kodex-separator kodex-separator--secondary-to-primary"></div>

{{-- ===================== SERVICIOS ===================== --}}
<section class="kodex-services" id="servicios">
    <div class="kodex-services__inner">
        <span class="kodex-eyebrow kodex-reveal">Servicios</span>
        <h2 class="kodex-section-title kodex-reveal" data-delay="100">En qué te puedo ayudar</h2>

        <div class="kodex-cards">
            <article class="kodex-card kodex-reveal" data-delay="100">
                <span class="kodex-card__icon">🌐</span>
                <h3 class="kodex-card__title">Una web que sí te traiga clientes</h3>
                <p class="kodex-card__desc">Tienes un buen negocio, pero cuando alguien te busca en internet no encuentra nada —o una página vieja que no representa lo que haces hoy. Te armo un sitio rápido y moderno, pensado para que el que llega te escriba o te compre.</p>
                <a href="{{ route('quote', ['plan' => 'plan-basico']) }}" class="kodex-card__link">Ver cuánto costaría →</a>
            </article>

            <article class="kodex-card kodex-card--featured kodex-reveal" data-delay="200">
                <span class="kodex-card__icon">⚡</span>
                <h3 class="kodex-card__title">Un sistema que ordene el desorden</h3>
                <p class="kodex-card__desc">Si llevas el inventario, los clientes o las ventas a mano, en WhatsApp y en mil planillas, sabes lo fácil que es que algo se pierda. Te hago un sistema a tu medida —solo con lo que necesitas— para tener todo en un mismo lugar.</p>
                <a href="{{ route('quote', ['plan' => 'plan-profesional']) }}" class="kodex-card__link">Ver cuánto costaría →</a>
            </article>

            <article class="kodex-card kodex-reveal" data-delay="300">
                <span class="kodex-card__icon">🤖</span>
                <h3 class="kodex-card__title">Que la IA haga lo aburrido por ti</h3>
                <p class="kodex-card__desc">Hay tareas que repites todos los días: responder lo mismo, copiar datos de un lado a otro, redactar descripciones. Integro inteligencia artificial para que esas pegas se hagan solas y te ahorres horas.</p>
                <a href="{{ route('quote', ['plan' => 'plan-premium']) }}" class="kodex-card__link">Ver cuánto costaría →</a>
            </article>
        </div>
    </div>
</section>

<div class="kodex-separator kodex-separator--primary-to-secondary"></div>

{{-- ===================== PROCESO ===================== --}}
<section class="kodex-process" style="padding:6rem 1.5rem;">
    <div style="max-width:1000px;margin:0 auto;">
        <span class="kodex-eyebrow kodex-reveal">Cómo trabajo</span>
        <h2 class="kodex-section-title kodex-reveal" data-delay="100">De la idea a tu negocio funcionando</h2>
        <p class="kodex-reveal" data-delay="150" style="color:#94A3B8;max-width:620px;margin:0 auto 3rem;text-align:center;">
            No necesitas saber nada de tecnología para empezar. Esto es lo único que pasa de tu lado:
        </p>

        <div style="display:grid;gap:1.25rem;grid-template-columns:repeat(auto-fit,minmax(230px,1fr));">
            @foreach([
                ['1', 'Conversamos', 'Me cuentas qué necesitas por WhatsApp o por el formulario. No tienes que llegar con todo claro: para eso estoy yo, para ordenar la idea y entender qué te sirve de verdad.'],
                ['2', 'Te paso una propuesta clara', 'Te mando qué voy a hacer, cuánto cuesta y en cuánto tiempo. Todo en pesos y en simple, sin letra chica. Si te hace sentido, partimos.'],
                ['3', 'Construyo y te voy mostrando', 'Me pongo a trabajar y te enseño avances en el camino. Tú opinas, ajustamos, y así queda como lo imaginaste, no como yo creí entender.'],
                ['4', 'Lo dejo funcionando', 'Te entrego todo andando, te explico cómo usarlo y quedas con soporte por si algo aparece. Y sigo a un mensaje de distancia para lo que necesites después.'],
            ] as $i => $step)
                <div class="kodex-reveal" data-delay="{{ 100 * ($i + 1) }}"
                     style="background:#1A1F2E;border:1px solid #2A3142;border-radius:1rem;padding:1.75rem;">
                    <span style="display:inline-flex;align-items:center;justify-content:center;width:2.5rem;height:2.5rem;border-radius:0.75rem;background:linear-gradient(135deg,#6C63FF,#00D4FF);color:#fff;font-weight:800;font-size:1.1rem;margin-bottom:1rem;">{{ $step[0] }}</span>
                    <h3 style="color:#F0F0F8;font-size:1.1rem;font-weight:700;margin:0 0 0.5rem;">{{ $step[1] }}</h3>
                    <p style="color:#94A3B8;font-size:0.95rem;line-height:1.6;margin:0;">{{ $step[2] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<div class="kodex-separator kodex-separator--secondary-to-primary"></div>

{{-- ===================== PROYECTOS ===================== --}}
<section class="kodex-projects" id="proyectos">
    <div class="kodex-projects__inner">
        <span class="kodex-eyebrow kodex-reveal">Proyectos</span>
        <h2 class="kodex-section-title kodex-reveal" data-delay="100">Trabajos que he hecho</h2>

        <div class="kodex-project-grid">
            @foreach($projects as $project)
                <a href="{{ route('projects.show', $project) }}" class="kodex-project kodex-reveal" data-delay="{{ 100 * (($loop->index % 3) + 1) }}">
                    @php
                        $coverIcons = [
                            'nowai-portal-inmobiliario' => '🏠',
                            'asesoria-contabilidad-inteligente' => '🧮',
                            'gestor-de-motos' => '🏍️',
                            'sistema-de-gestion-academica' => '🎓',
                        ];
                        $coverIcon = $coverIcons[$project->slug] ?? '🚀';
                    @endphp
                    <div class="kodex-project__media kodex-cover kodex-cover--{{ ($loop->index % 3) + 1 }}">
                        @if($project->image_path)
                            <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}">
                        @else
                            <span class="kodex-cover__icon">{{ $coverIcon }}</span>
                            @if($project->tech_stack)
                                <span class="kodex-cover__tech">{{ $project->tech_stack }}</span>
                            @endif
                        @endif
                    </div>
                    <div class="kodex-project__body">
                        @if($project->is_featured)
                            <span class="kodex-tag">Destacado</span>
                        @endif
                        <h3 class="kodex-project__title">{{ $project->title }}</h3>
                        @if($project->summary)
                            <p class="kodex-project__desc">{{ $project->summary }}</p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<div class="kodex-separator kodex-separator--secondary-to-primary"></div>

{{-- ===================== TESTIMONIOS ===================== --}}
<section class="kodex-testimonials">
    <div class="kodex-testimonials__inner">
        <span class="kodex-eyebrow kodex-reveal">Testimonios</span>
        <h2 class="kodex-section-title kodex-reveal" data-delay="100">Lo que dicen mis clientes</h2>

        <div class="kodex-testimonial-grid">
            @foreach([
                ['Daniela Rivas', 'Contadora', 'Yo llevaba todo en Excel y vivía con el alma en un hilo en época de declaraciones. Víctor me armó una plataforma donde tengo todas mis empresas ordenadas y me ahorro como un día entero de trabajo al mes. Y cualquier duda, le escribo por WhatsApp y me responde.'],
                ['Matías Fuentes', 'Dueño de taller', 'Antes no sabía ni cuántas motos tenía en bodega, era puro cuaderno. Ahora entro al sistema y está todo: stock, clientes, lo que se vendió. Cumplió los plazos que dijo y me lo dejó funcionando, no me desapareció después.'],
                ['Carla Soto', 'Gerente PyME', 'Lo que más valoro es que entendió al tiro lo que necesitaba y no me trató de vender cosas que no me servían. Trabajo directo con él, sin pasar por una agencia ni esperar tres días una respuesta. Cero vuelta.'],
            ] as $i => $t)
                <figure class="kodex-testimonial kodex-reveal" data-delay="{{ 100 * ($i + 1) }}">
                    <span class="kodex-testimonial__stars">★★★★★</span>
                    <blockquote class="kodex-testimonial__quote">“{{ $t[2] }}”</blockquote>
                    <figcaption class="kodex-testimonial__author">
                        <span class="kodex-testimonial__avatar">{{ Str::substr($t[0], 0, 1) }}</span>
                        <span>
                            <span class="kodex-testimonial__name">{{ $t[0] }}</span><br>
                            <span class="kodex-testimonial__role">{{ $t[1] }}</span>
                        </span>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>

<div class="kodex-separator kodex-separator--primary-to-secondary"></div>

@endsection
