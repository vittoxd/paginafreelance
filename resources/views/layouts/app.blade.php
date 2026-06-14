<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Estudio Freelance — Desarrollo Web a Medida')</title>
    <meta name="description" content="@yield('meta_description', 'Desarrollo web a medida, landing pages y automatización con IA para PyMEs y emprendedores.')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-200 antialiased selection:bg-indigo-500/30">

    {{-- ===== Barra de navegación (fija arriba) ===== --}}
    <header class="fixed inset-x-0 top-0 z-50 border-b border-white/5 bg-slate-950/70 backdrop-blur-lg">
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-2 text-lg font-semibold text-white">
                <span class="grid size-8 place-items-center rounded-lg bg-gradient-to-br from-indigo-500 to-fuchsia-500 text-sm font-bold">&lt;/&gt;</span>
                Estudio<span class="text-indigo-400">Freelance</span>
            </a>
            <div class="hidden items-center gap-8 text-sm font-medium text-slate-300 md:flex">
                <a href="{{ route('home') }}#servicios" class="transition hover:text-white">Servicios</a>
                <a href="{{ route('home') }}#proyectos" class="transition hover:text-white">Proyectos</a>
                <a href="{{ route('home') }}#sobre-mi" class="transition hover:text-white">Sobre mí</a>
            </div>
            <a href="{{ route('home') }}#contacto"
               class="rounded-full bg-white px-5 py-2 text-sm font-semibold text-slate-900 transition hover:bg-indigo-100">
                Hablemos
            </a>
        </nav>
    </header>

    <main class="pt-16">
        @yield('content')
    </main>

    {{-- ===== Pie de página ===== --}}
    <footer class="border-t border-white/5 bg-slate-950">
        <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-4 px-6 py-10 text-sm text-slate-400 md:flex-row">
            <p>&copy; {{ date('Y') }} Estudio Freelance. Hecho con Laravel + Tailwind.</p>
            <div class="flex gap-6">
                <a href="{{ route('home') }}#contacto" class="transition hover:text-white">Contacto</a>
                <a href="mailto:hola@tudominio.com" class="transition hover:text-white">hola@tudominio.com</a>
            </div>
        </div>
    </footer>

</body>
</html>
