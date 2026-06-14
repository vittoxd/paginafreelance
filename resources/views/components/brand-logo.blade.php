@props(['onDark' => false])

{{-- Logo de la marca: cohete en badge con degradado + nombre con degradado.
     $onDark = true cuando va sobre fondo oscuro (footer): usa tonos más claros. --}}
<a href="{{ route('home') }}"
   {{ $attributes->merge(['class' => 'group flex items-center gap-2.5']) }}>
    <span class="grid size-10 place-items-center rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 shadow-md shadow-blue-500/30 transition duration-300 group-hover:scale-105 group-hover:shadow-blue-500/50">
        <x-heroicon-s-rocket-launch class="size-5 text-white" />
    </span>
    <span class="bg-gradient-to-r bg-clip-text text-xl font-extrabold tracking-tight text-transparent {{ $onDark ? 'from-blue-300 to-indigo-300' : 'from-blue-600 to-indigo-600' }}">
        Impulsa
    </span>
</a>
