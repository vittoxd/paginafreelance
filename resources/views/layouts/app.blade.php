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
    <header class="fixed inset-x-0 top-0 z-50 border-b border-slate-200 bg-white/80 backdrop-blur-lg">
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
