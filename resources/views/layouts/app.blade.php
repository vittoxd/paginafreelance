<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Kodex Studio — Soluciones que hacen crecer tu negocio')</title>
    <meta name="description" content="@yield('meta_description', 'Servicios profesionales para hacer crecer tu negocio.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700;800&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-700 antialiased selection:bg-blue-100">

    {{-- ===== Barra de progreso de lectura ===== --}}
    <div id="scroll-progress" class="fixed left-0 top-0 z-[60] h-1 w-0 bg-gradient-to-r from-blue-500 to-indigo-600 transition-[width] duration-150"></div>

    {{-- ===== Barra de navegación (fija arriba) ===== --}}
    <header id="site-header" class="fixed inset-x-0 top-0 z-50 border-b border-[#1E1E2E] bg-[#0A0A0F]/80 font-body backdrop-blur-lg transition-shadow duration-300">
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
            <x-brand-logo on-dark />
            <div class="hidden items-center gap-8 text-sm font-medium text-[#8888AA] md:flex">
                <a href="{{ route('home') }}#servicios" class="transition hover:text-[#F0F0F8]">Planes</a>
                <a href="{{ route('home') }}#proyectos" class="transition hover:text-[#F0F0F8]">Proyectos</a>
                <a href="{{ route('home') }}#sobre-mi" class="transition hover:text-[#F0F0F8]">Nosotros</a>
                <a href="{{ route('home') }}#contacto" class="transition hover:text-[#F0F0F8]">Contacto</a>
            </div>
            <a href="{{ route('quote') }}"
               class="rounded-full border border-[#6C63FF] px-5 py-2.5 text-sm font-medium text-[#F0F0F8] transition duration-300 hover:bg-[#6C63FF]">
                Solicitar cotización
            </a>
        </nav>
    </header>

    <main class="pt-16">
        @yield('content')
    </main>

    {{-- ===== Botón flotante de WhatsApp ===== --}}
    {{-- Cambia el número (formato internacional, sin + ni espacios) por el tuyo. --}}
    <a href="https://wa.me/56987873015?text=Hola,%20me%20gustaría%20más%20información"
       target="_blank" rel="noopener"
       aria-label="Escríbenos por WhatsApp"
       class="fixed bottom-6 right-6 z-50 flex items-center gap-2 rounded-full bg-[#25D366] px-4 py-3.5 font-semibold text-white shadow-lg shadow-emerald-500/30 transition hover:scale-105 hover:shadow-emerald-500/50">
        <svg viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
        <span class="hidden sm:inline">Escríbenos</span>
    </a>

    {{-- ===== Pie de página ===== --}}
    <footer class="bg-slate-900 text-slate-400">
        <div class="mx-auto max-w-6xl px-6 py-14">
            <div class="grid gap-10 md:grid-cols-3">
                {{-- Marca --}}
                <div>
                    <x-brand-logo on-dark />
                    <p class="mt-4 max-w-xs text-sm">Servicios profesionales para hacer crecer tu negocio, con atención cercana y resultados de calidad.</p>
                </div>

                {{-- Navegación --}}
                <div>
                    <h3 class="font-semibold text-white">Navegación</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li><a href="{{ route('home') }}#servicios" class="transition hover:text-white">Planes</a></li>
                        <li><a href="{{ route('home') }}#proyectos" class="transition hover:text-white">Proyectos</a></li>
                        <li><a href="{{ route('home') }}#sobre-mi" class="transition hover:text-white">Nosotros</a></li>
                        <li><a href="{{ route('quote') }}" class="transition hover:text-white">Solicitar cotización</a></li>
                    </ul>
                </div>

                {{-- Contacto + redes --}}
                <div>
                    <h3 class="font-semibold text-white">Contacto</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li><a href="mailto:vg88882@gmail.com" class="transition hover:text-white">vg88882@gmail.com</a></li>
                        <li><a href="https://wa.me/56987873015" target="_blank" rel="noopener" class="transition hover:text-white">+56 9 8787 3015</a></li>
                    </ul>
                    <div class="mt-5 flex gap-3">
                        <a href="https://wa.me/56987873015" target="_blank" rel="noopener" aria-label="WhatsApp" class="grid size-9 place-items-center rounded-full bg-white/10 transition hover:bg-blue-600 hover:text-white">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="size-4"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </a>
                        <a href="#" aria-label="Instagram" class="grid size-9 place-items-center rounded-full bg-white/10 transition hover:bg-blue-600 hover:text-white">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="size-4"><path d="M12 2.2c3.2 0 3.58.01 4.85.07 1.17.05 1.8.25 2.23.41.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.43.36 1.06.41 2.23.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.05 1.17-.25 1.8-.41 2.23-.22.56-.48.96-.9 1.38-.42.42-.82.68-1.38.9-.43.16-1.06.36-2.23.41-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-1.17-.05-1.8-.25-2.23-.41a3.7 3.7 0 0 1-1.38-.9 3.7 3.7 0 0 1-.9-1.38c-.16-.43-.36-1.06-.41-2.23C2.21 15.58 2.2 15.2 2.2 12s.01-3.58.07-4.85c.05-1.17.25-1.8.41-2.23.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.43-.16 1.06-.36 2.23-.41C8.42 2.21 8.8 2.2 12 2.2zm0 1.8c-3.15 0-3.5.01-4.74.07-.9.04-1.38.19-1.7.32-.43.16-.74.36-1.06.68-.32.32-.52.63-.68 1.06-.13.32-.28.8-.32 1.7C3.21 8.5 3.2 8.85 3.2 12s.01 3.5.07 4.74c.04.9.19 1.38.32 1.7.16.43.36.74.68 1.06.32.32.63.52 1.06.68.32.13.8.28 1.7.32 1.24.06 1.59.07 4.74.07s3.5-.01 4.74-.07c.9-.04 1.38-.19 1.7-.32.43-.16.74-.36 1.06-.68.32-.32.52-.63.68-1.06.13-.32.28-.8.32-1.7.06-1.24.07-1.59.07-4.74s-.01-3.5-.07-4.74c-.04-.9-.19-1.38-.32-1.7a2.86 2.86 0 0 0-.68-1.06 2.86 2.86 0 0 0-1.06-.68c-.32-.13-.8-.28-1.7-.32C15.5 4.01 15.15 4 12 4zm0 3.06A4.94 4.94 0 1 1 7.06 12 4.94 4.94 0 0 1 12 7.06zm0 1.8A3.14 3.14 0 1 0 15.14 12 3.14 3.14 0 0 0 12 8.86zm5.14-3.2a1.15 1.15 0 1 1-1.15 1.15 1.15 1.15 0 0 1 1.15-1.15z"/></svg>
                        </a>
                        <a href="#" aria-label="Facebook" class="grid size-9 place-items-center rounded-full bg-white/10 transition hover:bg-blue-600 hover:text-white">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="size-4"><path d="M22 12a10 10 0 1 0-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.5 1.49-3.89 3.78-3.89 1.09 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.78l-.44 2.89h-2.34v6.99A10 10 0 0 0 22 12z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-12 border-t border-white/10 pt-6 text-center text-sm text-slate-500">
                &copy; {{ date('Y') }} Kodex Studio. Todos los derechos reservados.
            </div>
        </div>
    </footer>

</body>
</html>
