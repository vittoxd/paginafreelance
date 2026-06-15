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
            <span class="kodex-words">Webs, apps y sistemas</span>
            <span class="kodex-words kodex-line--grad">que hacen crecer tu negocio.</span>
        </h1>

        <p class="kodex-hero__subtitle kodex-reveal" data-delay="200">
            Desarrollo a medida para negocios que quieren crecer.
            Sin templates. Sin agencias intermediarias.
        </p>

        <div class="kodex-hero__ctas kodex-reveal" data-delay="300">
            <a href="{{ route('quote') }}" class="kodex-btn-primary">Solicitar cotización →</a>
            <a href="#servicios" class="kodex-btn-secondary">Ver proyectos</a>
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
        <h2 class="kodex-section-title kodex-reveal" data-delay="100">Elige el plan ideal para ti</h2>

        <div class="kodex-cards">
            <article class="kodex-card kodex-reveal" data-delay="100">
                <span class="kodex-card__icon">🌐</span>
                <h3 class="kodex-card__title">Landing Page</h3>
                <p class="kodex-card__desc">Una página que comunica tu propuesta y convierte visitantes en clientes. Rápida, optimizada y lista para crecer.</p>
                <a href="{{ route('quote', ['plan' => 'plan-basico']) }}" class="kodex-card__link">Cotizar este servicio →</a>
            </article>

            <article class="kodex-card kodex-card--featured kodex-reveal" data-delay="200">
                <span class="kodex-card__icon">⚡</span>
                <h3 class="kodex-card__title">App Web a Medida</h3>
                <p class="kodex-card__desc">Sistemas y plataformas hechos a tu medida: paneles, automatizaciones e integraciones que ahorran tiempo y escalan contigo.</p>
                <a href="{{ route('quote', ['plan' => 'plan-profesional']) }}" class="kodex-card__link">Cotizar este servicio →</a>
            </article>

            <article class="kodex-card kodex-reveal" data-delay="300">
                <span class="kodex-card__icon">📱</span>
                <h3 class="kodex-card__title">App Móvil</h3>
                <p class="kodex-card__desc">Lleva tu negocio al bolsillo de tus clientes con una app moderna, fluida y pensada para la experiencia de uso.</p>
                <a href="{{ route('quote', ['plan' => 'plan-premium']) }}" class="kodex-card__link">Cotizar este servicio →</a>
            </article>
        </div>
    </div>
</section>

@endsection
