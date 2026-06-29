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
                    <label for="name" class="mb-2 block text-sm font-medium text-[#E2E8F0]">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="w-full rounded-xl border border-[#2A3142] bg-[#0F1117] px-4 py-3 text-[#F0F0F8] placeholder-[#64748B] outline-none transition focus:border-[#6C63FF] focus:ring-2 focus:ring-[#6C63FF]/25"
                           placeholder="Tu nombre">
                    @error('name') <p class="mt-1.5 text-sm text-rose-400">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="phone" class="mb-2 block text-sm font-medium text-[#E2E8F0]">Teléfono <span class="text-[#64748B]">(opcional)</span></label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                           class="w-full rounded-xl border border-[#2A3142] bg-[#0F1117] px-4 py-3 text-[#F0F0F8] placeholder-[#64748B] outline-none transition focus:border-[#6C63FF] focus:ring-2 focus:ring-[#6C63FF]/25"
                           placeholder="+56 9 ...">
                    @error('phone') <p class="mt-1.5 text-sm text-rose-400">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-[#E2E8F0]">Correo</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                           class="w-full rounded-xl border border-[#2A3142] bg-[#0F1117] px-4 py-3 text-[#F0F0F8] placeholder-[#64748B] outline-none transition focus:border-[#6C63FF] focus:ring-2 focus:ring-[#6C63FF]/25"
                           placeholder="tu@correo.com">
                    @error('email') <p class="mt-1.5 text-sm text-rose-400">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="budget" class="mb-2 block text-sm font-medium text-[#E2E8F0]">Presupuesto <span class="text-[#64748B]">(opcional)</span></label>
                    <input type="text" name="budget" id="budget" value="{{ old('budget') }}"
                           class="w-full rounded-xl border border-[#2A3142] bg-[#0F1117] px-4 py-3 text-[#F0F0F8] placeholder-[#64748B] outline-none transition focus:border-[#6C63FF] focus:ring-2 focus:ring-[#6C63FF]/25"
                           placeholder="Ej: $200 aprox.">
                    @error('budget') <p class="mt-1.5 text-sm text-rose-400">{{ $message }}</p> @enderror
                </div>
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
                Solicitar cotización
            </button>
        </form>
    </div>
</section>
@endsection
