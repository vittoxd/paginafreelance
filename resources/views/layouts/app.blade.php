<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Servicios Profesionales')</title>
    <meta name="description" content="@yield('meta_description', 'Servicios profesionales para hacer crecer tu negocio.')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-700 antialiased selection:bg-blue-100">

    {{-- ===== Barra de navegación (fija arriba) ===== --}}
    <header id="site-header" class="fixed inset-x-0 top-0 z-50 border-b border-slate-200 bg-white/80 backdrop-blur-lg transition-shadow duration-300">
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-2 text-lg font-bold text-slate-900">
                <span class="grid size-9 place-items-center rounded-lg bg-blue-600 text-sm font-bold text-white">N</span>
                Nombre de tu Marca
            </a>
            <div class="hidden items-center gap-8 text-sm font-medium text-slate-600 md:flex">
                <a href="{{ route('home') }}#servicios" class="transition hover:text-blue-600">Planes</a>
                <a href="{{ route('home') }}#proyectos" class="transition hover:text-blue-600">Proyectos</a>
                <a href="{{ route('home') }}#sobre-mi" class="transition hover:text-blue-600">Nosotros</a>
                <a href="{{ route('home') }}#contacto" class="transition hover:text-blue-600">Contacto</a>
            </div>
            <a href="{{ route('quote') }}"
               class="rounded-full bg-blue-600 px-5 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                Solicitar cotización
            </a>
        </nav>
    </header>

    <main class="pt-16">
        @yield('content')
    </main>

    {{-- ===== Botón flotante de WhatsApp ===== --}}
    {{-- Cambia el número (formato internacional, sin + ni espacios) por el tuyo. --}}
    <a href="https://wa.me/56912345678?text=Hola,%20me%20gustaría%20más%20información"
       target="_blank" rel="noopener"
       aria-label="Escríbenos por WhatsApp"
       class="fixed bottom-6 right-6 z-50 flex items-center gap-2 rounded-full bg-[#25D366] px-4 py-3.5 font-semibold text-white shadow-lg shadow-emerald-500/30 transition hover:scale-105 hover:shadow-emerald-500/50">
        <svg viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
        <span class="hidden sm:inline">Escríbenos</span>
    </a>

    {{-- ===== Pie de página ===== --}}
    <footer class="border-t border-slate-200 bg-slate-50">
        <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-4 px-6 py-10 text-sm text-slate-500 md:flex-row">
            <p>&copy; {{ date('Y') }} Nombre de tu Marca. Todos los derechos reservados.</p>
            <div class="flex gap-6">
                <a href="{{ route('home') }}#contacto" class="transition hover:text-blue-600">Contacto</a>
                <a href="mailto:hola@tudominio.com" class="transition hover:text-blue-600">hola@tudominio.com</a>
            </div>
        </div>
    </footer>

</body>
</html>
