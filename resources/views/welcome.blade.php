@extends('layouts.app')

@section('content')

{{-- ===================== HERO ===================== --}}
<header class="kodex-hero">
    <div class="kodex-hero__glow"></div>
    <div class="kodex-hero__inner">

        <span class="kodex-badge kodex-reveal">
            <span class="kodex-badge__dot"></span>
            Tomando 2 proyectos nuevos este mes
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
            <a href="{{ route('quote') }}" class="kodex-btn-primary">Cuéntame tu proyecto →</a>
            <a href="#proyectos" class="kodex-btn-secondary">Ver proyectos</a>
        </div>

        <div class="kodex-hero__social kodex-reveal" data-delay="400">
            <p>Detrás de proyectos que ya están funcionando</p>
            <div class="kodex-logos">
                <span class="kodex-logo">🏠 NowAI</span>
                <span class="kodex-logo">🧮 AsesorIA</span>
                <span class="kodex-logo">🤝 IncluWork</span>
            </div>
        </div>

    </div>
</header>

<div class="kodex-separator kodex-separator--primary-to-secondary"></div>

{{-- ===================== STATS ===================== --}}
<section class="kodex-stats">
    <div class="kodex-stats__inner">
        <div class="kodex-reveal">
            <div class="kodex-stat__num kodex-grad-text"><span class="kodex-counter" data-target="5" data-suffix="+">0</span></div>
            <p class="kodex-stat__label">Proyectos entregados</p>
        </div>
        <div class="kodex-reveal" data-delay="100">
            <div class="kodex-stat__num kodex-grad-text"><span class="kodex-counter" data-target="6" data-suffix="+">0</span></div>
            <p class="kodex-stat__label">Tecnologías que domino</p>
        </div>
        <div class="kodex-reveal" data-delay="200">
            <div class="kodex-stat__num kodex-grad-text"><span class="kodex-counter" data-target="100" data-suffix="%">0</span></div>
            <p class="kodex-stat__label">Trato directo, sin agencia</p>
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
                            'incluwork-vitrina-y-post-venta' => '🤝',
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

{{-- ===================== PRECIOS ===================== --}}
<section class="kodex-pricing" id="precios" style="padding:6rem 1.5rem;">
    <div style="max-width:1100px;margin:0 auto;">
        <span class="kodex-eyebrow kodex-reveal">Planes</span>
        <h2 class="kodex-section-title kodex-reveal" data-delay="100">Precios claros, sin sorpresas</h2>
        <p class="kodex-reveal" data-delay="150" style="color:#94A3B8;max-width:620px;margin:0 auto 3rem;text-align:center;">
            Cada proyecto es distinto, pero estos son los rangos para que te hagas una idea. El precio final lo conversamos según lo que necesites.
        </p>

        <div style="display:grid;gap:1.5rem;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));align-items:start;">
            @foreach($services as $i => $plan)
                @php $feat = $plan->is_featured; @endphp
                <div class="kodex-reveal" data-delay="{{ 100 * ($i + 1) }}"
                     style="position:relative;background:{{ $feat ? 'linear-gradient(180deg,#1E2236,#161A28)' : '#1A1F2E' }};border:1px solid {{ $feat ? '#6C63FF' : '#2A3142' }};border-radius:1.25rem;padding:2rem;{{ $feat ? 'box-shadow:0 20px 50px -20px rgba(108,99,255,.55);' : '' }}">
                    @if($feat)
                        <span style="position:absolute;top:-0.85rem;left:50%;transform:translateX(-50%);background:linear-gradient(135deg,#6C63FF,#00D4FF);color:#fff;font-size:0.72rem;font-weight:800;letter-spacing:.5px;text-transform:uppercase;padding:0.35rem 0.9rem;border-radius:999px;white-space:nowrap;">★ Más popular</span>
                    @endif
                    <h3 style="color:#F0F0F8;font-size:1.25rem;font-weight:700;margin:0 0 0.35rem;">{{ $plan->title }}</h3>
                    <p style="color:#818CF8;font-size:0.9rem;margin:0 0 1.25rem;">{{ $plan->tagline }}</p>
                    <div style="margin-bottom:1rem;">
                        <span style="color:#64748B;font-size:0.85rem;">Desde</span>
                        <div style="color:#F0F0F8;font-size:1.9rem;font-weight:800;line-height:1.1;">${{ number_format($plan->price_from, 0, ',', '.') }}<span style="font-size:0.85rem;font-weight:500;color:#64748B;"> CLP</span></div>
                    </div>
                    @if($plan->delivery_time)
                        <p style="color:#94A3B8;font-size:0.85rem;margin:0 0 1.25rem;">⏱ Entrega estimada: {{ $plan->delivery_time }}</p>
                    @endif
                    <ul style="list-style:none;padding:0;margin:0 0 1.75rem;display:flex;flex-direction:column;gap:0.6rem;">
                        @foreach(explode("\n", $plan->features) as $f)
                            <li style="color:#CBD5E1;font-size:0.92rem;display:flex;gap:0.55rem;align-items:flex-start;line-height:1.45;">
                                <span style="color:#34D399;flex-shrink:0;">✓</span> {{ $f }}
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('quote', ['plan' => $plan->slug]) }}"
                       style="display:block;text-align:center;border-radius:999px;padding:0.85rem;font-weight:700;font-size:0.95rem;text-decoration:none;{{ $feat ? 'background:linear-gradient(135deg,#6C63FF,#00D4FF);color:#fff;' : 'border:1px solid #2A3142;color:#F0F0F8;' }}">
                        Quiero este plan →
                    </a>
                </div>
            @endforeach
        </div>

        <p class="kodex-reveal" style="color:#64748B;font-size:0.92rem;text-align:center;margin-top:2.25rem;">
            ¿No sabes cuál te sirve? <a href="{{ route('quote') }}" style="color:#818CF8;">Cuéntame tu caso</a> y lo vemos juntos.
        </p>
    </div>
</section>

<div class="kodex-separator kodex-separator--primary-to-secondary"></div>

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

{{-- ===================== SOBRE MÍ ===================== --}}
<section class="kodex-about" id="sobre-mi" style="padding:6rem 1.5rem;">
    <div style="max-width:760px;margin:0 auto;">
        <span class="kodex-eyebrow kodex-reveal">Sobre mí</span>
        <h2 class="kodex-section-title kodex-reveal" data-delay="100">Hola, soy Víctor 👋</h2>

        <div class="kodex-reveal" data-delay="150" style="color:#94A3B8;font-size:1.05rem;line-height:1.75;display:flex;flex-direction:column;gap:1.25rem;margin-top:1.5rem;">
            <p style="margin:0;">
                Soy desarrollador full-stack y vivo en Rancagua. Tengo 20 años y estoy en tercer año de
                Ingeniería en Informática en INACAP, pero no espero a titularme para hacer las cosas bien:
                ya llevo varios proyectos reales funcionando, desde portales inmobiliarios hasta sistemas contables.
            </p>
            <p style="margin:0;">
                Trabajo bajo la marca Kodex Studio, pero detrás no hay una agencia ni un equipo de vendedores: soy yo.
                Empecé con esto porque me cargaba ver a buenos negocios perdiendo clientes por una web mala
                —o por no tener ninguna— y pagando fortunas a agencias que los hacían esperar semanas por un cambio chico.
            </p>
            <p style="margin:0;">
                Por eso trabajo distinto: hablas directo conmigo de principio a fin, por WhatsApp, sin intermediarios
                ni respuestas automáticas. Te explico todo en simple, sin tecnicismos para impresionar, y te muestro
                avances mientras voy construyendo para que nunca estés a ciegas.
            </p>
            <p style="margin:0;color:#F0F0F8;font-weight:500;">
                Si vas a confiarme algo tan importante como la cara digital o el sistema de tu negocio, lo mínimo es
                que sepas con quién estás hablando. Acá me tienes.
            </p>
        </div>
    </div>
</section>

<div class="kodex-separator kodex-separator--secondary-to-primary"></div>

{{-- ===================== FAQ ===================== --}}
<section class="kodex-faq" id="faq" style="padding:6rem 1.5rem;">
    <div style="max-width:760px;margin:0 auto;">
        <span class="kodex-eyebrow kodex-reveal">Preguntas frecuentes</span>
        <h2 class="kodex-section-title kodex-reveal" data-delay="100">Lo que casi todos me preguntan</h2>

        <div style="display:flex;flex-direction:column;gap:0.75rem;margin-top:2rem;">
            @foreach([
                ['¿Cuánto te demoras en entregar?', 'Depende del tamaño. Una web simple suele tomar entre 1 y 3 semanas; un sistema más completo puede ser de 1 a 3 meses. Antes de partir te doy un plazo claro y lo cumplo, y si algo se mueve, te aviso, no te dejo esperando.'],
                ['¿Y si después necesito cambios?', 'Es normal que con el tiempo quieras ajustar o agregar cosas. Todo proyecto queda con un periodo de soporte para correcciones, y después puedo seguir apoyándote con cambios o mejoras cuando los necesites. No te dejo botado una vez entregado.'],
                ['¿El código queda mío?', 'Sí. Lo que pagas es tuyo: el código, el diseño y los accesos quedan a tu nombre. No te amarro a mí para que dependas de mí para siempre.'],
                ['¿Cómo es el pago?', 'Trabajo con un anticipo para empezar (normalmente la mitad) y el resto a la entrega. En proyectos grandes lo dividimos en etapas para que no sea un golpe de una sola vez. Todo conversado y claro antes de partir, sin sorpresas.'],
                ['¿Puedo ver cómo va antes de que esté listo?', 'Sí, y de hecho lo prefiero. Te voy mostrando avances durante el proceso para que opines y ajustemos sobre la marcha. Así no llegas al final con algo que no era lo que tenías en la cabeza.'],
            ] as $i => $faq)
                <details class="kodex-reveal" data-delay="{{ 80 * ($i + 1) }}"
                         style="background:#1A1F2E;border:1px solid #2A3142;border-radius:0.9rem;padding:1.1rem 1.4rem;">
                    <summary style="color:#F0F0F8;font-weight:600;font-size:1.02rem;cursor:pointer;list-style:none;display:flex;justify-content:space-between;align-items:center;gap:1rem;">
                        {{ $faq[0] }}
                        <span style="color:#6C63FF;font-size:1.4rem;line-height:1;">+</span>
                    </summary>
                    <p style="color:#94A3B8;font-size:0.97rem;line-height:1.65;margin:0.9rem 0 0;">{{ $faq[1] }}</p>
                </details>
            @endforeach
        </div>
    </div>
</section>

@endsection
