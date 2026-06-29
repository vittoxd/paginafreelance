@extends('layouts.app')

@section('title', 'Solicitar cotización — Kodex Studio')
@section('meta_description', 'Pide una cotización personalizada para tu proyecto.')

@section('content')
<section class="bg-gradient-to-b from-[#151A26] to-[#0F1117] font-body">
    <div class="mx-auto max-w-2xl px-6 py-20">

        <a href="{{ route('home') }}#servicios" class="inline-flex items-center gap-2 text-sm text-[#94A3B8] transition hover:text-[#818CF8]">
            <x-heroicon-o-arrow-left class="size-4" />
            Volver a los planes
        </a>

        <div class="mt-8 mb-10 text-center">
            <h1 class="text-3xl font-bold text-[#F0F0F8] md:text-4xl">Cuéntame qué tienes en mente</h1>
            <p class="mt-4 text-[#94A3B8]">No necesitas tenerlo todo claro ni saber de tecnología. Cuéntame qué necesitas o qué problema quieres resolver, y te respondo con una propuesta concreta —cuánto, en cuánto tiempo y cómo— sin compromiso. Te leo yo, no un robot.</p>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-xl border border-[#34D399]/30 bg-[#34D399]/10 px-5 py-4 text-sm text-[#6EE7B7]">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('quote.store') }}" method="POST" class="space-y-5 rounded-2xl border border-[#2A3142] bg-[#1A1F2E] p-8">
            @csrf

            <div>
                <label for="service_id" class="mb-2 block text-sm font-medium text-[#E2E8F0]">¿Qué plan te interesa?</label>
                <select name="service_id" id="service_id"
                        class="w-full rounded-xl border border-[#2A3142] bg-[#0F1117] px-4 py-3 text-[#F0F0F8] outline-none transition focus:border-[#6C63FF] focus:ring-2 focus:ring-[#6C63FF]/25">
                    <option value="">No estoy seguro / quiero asesoría</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" @selected(old('service_id', $selectedId) == $service->id)>
                            {{ $service->title }}@if($service->price_from) — desde ${{ number_format($service->price_from, 0) }}@endif
                        </option>
                    @endforeach
                </select>
                @error('service_id') <p class="mt-1.5 text-sm text-rose-400">{{ $message }}</p> @enderror
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-[#E2E8F0]">Tu nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="w-full rounded-xl border border-[#2A3142] bg-[#0F1117] px-4 py-3 text-[#F0F0F8] placeholder-[#64748B] outline-none transition focus:border-[#6C63FF] focus:ring-2 focus:ring-[#6C63FF]/25"
                           placeholder="Cómo te llamas">
                    @error('name') <p class="mt-1.5 text-sm text-rose-400">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="phone" class="mb-2 block text-sm font-medium text-[#E2E8F0]">Tu WhatsApp</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                           class="w-full rounded-xl border border-[#2A3142] bg-[#0F1117] px-4 py-3 text-[#F0F0F8] placeholder-[#64748B] outline-none transition focus:border-[#6C63FF] focus:ring-2 focus:ring-[#6C63FF]/25"
                           placeholder="+56 9 1234 5678">
                    @error('phone') <p class="mt-1.5 text-sm text-rose-400">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label for="email" class="mb-2 block text-sm font-medium text-[#E2E8F0]">Correo <span class="text-[#64748B]">(opcional)</span></label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="w-full rounded-xl border border-[#2A3142] bg-[#0F1117] px-4 py-3 text-[#F0F0F8] placeholder-[#64748B] outline-none transition focus:border-[#6C63FF] focus:ring-2 focus:ring-[#6C63FF]/25"
                       placeholder="tu@correo.com">
                @error('email') <p class="mt-1.5 text-sm text-rose-400">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="details" class="mb-2 block text-sm font-medium text-[#E2E8F0]">Detalles de lo que necesitas</label>
                <textarea name="details" id="details" rows="5"
                          class="w-full rounded-xl border border-[#2A3142] bg-[#0F1117] px-4 py-3 text-[#F0F0F8] placeholder-[#64748B] outline-none transition focus:border-[#6C63FF] focus:ring-2 focus:ring-[#6C63FF]/25"
                          placeholder="Ej: 'Tengo un taller mecánico y llevo todo en cuaderno, quiero ordenar el inventario y los clientes' o 'Necesito una web para mi restaurante porque no aparezco en Google'. Mientras más me cuentes, mejor te puedo responder.">{{ old('details') }}</textarea>
                @error('details') <p class="mt-1.5 text-sm text-rose-400">{{ $message }}</p> @enderror
            </div>

            <button type="submit"
                    class="hero-cta-primary inline-flex w-full items-center justify-center gap-2 rounded-full bg-gradient-to-r from-[#6C63FF] to-[#00D4FF] px-8 py-3.5 text-base font-semibold text-white">
                <x-heroicon-s-paper-airplane class="size-5" />
                Enviar mi mensaje →
            </button>
        </form>

        <div class="mt-6 flex items-center gap-4 text-sm text-[#64748B]">
            <span class="h-px flex-1 bg-[#2A3142]"></span>
            <span>o si prefieres, al tiro</span>
            <span class="h-px flex-1 bg-[#2A3142]"></span>
        </div>

        <a href="https://wa.me/56987873015?text=Hola%20V%C3%ADctor%2C%20vengo%20del%20sitio%20de%20Kodex%20Studio%20y%20me%20gustar%C3%ADa%20conversar%20sobre%20un%20proyecto"
           target="_blank" rel="noopener"
           class="mt-4 inline-flex w-full items-center justify-center gap-2 rounded-full border border-[#25D366]/40 bg-[#25D366]/10 px-8 py-3.5 text-base font-semibold text-[#25D366] transition hover:bg-[#25D366]/20">
            <svg viewBox="0 0 24 24" fill="currentColor" class="size-5"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
            Escríbeme por WhatsApp
        </a>
    </div>
</section>
@endsection
