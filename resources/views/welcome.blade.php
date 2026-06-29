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
        <h2 class="kodex-section-title kodex-reveal" data-delay="100">Soluciones para hacer crecer tu negocio</h2>

        <div class="kodex-cards">
            <article class="kodex-card kodex-reveal" data-delay="100">
                <span class="kodex-card__icon">🌐</span>
                <h3 class="kodex-card__title">Una web que convierte visitas en clientes</h3>
                <p class="kodex-card__desc">Sitios corporativos y landings rápidas, modernas y optimizadas para captar clientes — no solo para verse bien.</p>
                <a href="{{ route('quote', ['plan' => 'plan-basico']) }}" class="kodex-card__link">Ver cuánto costaría →</a>
            </article>

            <article class="kodex-card kodex-card--featured kodex-reveal" data-delay="200">
                <span class="kodex-card__icon">⚡</span>
                <h3 class="kodex-card__title">El sistema que necesitas, construido para ti</h3>
                <p class="kodex-card__desc">SaaS, paneles de gestión y sistemas internos a tu medida. Sin compromisos con lo que no necesitas, sin cobros extra.</p>
                <a href="{{ route('quote', ['plan' => 'plan-profesional']) }}" class="kodex-card__link">Ver cuánto costaría →</a>
            </article>

            <article class="kodex-card kodex-reveal" data-delay="300">
                <span class="kodex-card__icon">🤖</span>
                <h3 class="kodex-card__title">Deja que la IA haga el trabajo repetitivo</h3>
                <p class="kodex-card__desc">Automatizo tus procesos con inteligencia artificial para que tu equipo se enfoque en lo que realmente importa.</p>
                <a href="{{ route('quote', ['plan' => 'plan-premium']) }}" class="kodex-card__link">Ver cuánto costaría →</a>
            </article>
        </div>
    </div>
</section>

<div class="kodex-separator kodex-separator--primary-to-secondary"></div>

{{-- ===================== PROYECTOS ===================== --}}
<section class="kodex-projects" id="proyectos">
    <div class="kodex-projects__inner">
        <span class="kodex-eyebrow kodex-reveal">Proyectos</span>
        <h2 class="kodex-section-title kodex-reveal" data-delay="100">Trabajos que hemos realizado</h2>

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
        <h2 class="kodex-section-title kodex-reveal" data-delay="100">Lo que dicen nuestros clientes</h2>

        <div class="kodex-testimonial-grid">
            @foreach([
                ['Daniela Rivas', 'Contadora', 'Automatizó gran parte de nuestro trabajo con el SII y las remuneraciones. La plataforma es clarísima y nos ahorra horas cada semana.'],
                ['Matías Fuentes', 'Dueño de taller', 'Ahora gestiono el inventario y los clientes desde un solo lugar. Cumplió los plazos y siempre disponible por WhatsApp.'],
                ['Carla Soto', 'Gerente PyME', 'Entendió exactamente lo que necesitábamos. Trabajo profesional, cercano y a la altura. Sin duda lo recomiendo.'],
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
