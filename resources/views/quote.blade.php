@extends('layouts.app')

@section('title', 'Solicitar cotización — Kodex Studio')
@section('meta_description', 'Pide una cotización personalizada para tu proyecto.')

@section('content')
<section class="bg-gradient-to-b from-blue-50 to-white">
    <div class="mx-auto max-w-2xl px-6 py-20">

        <a href="{{ route('home') }}#servicios" class="inline-flex items-center gap-2 text-sm text-slate-500 transition hover:text-blue-600">
            <x-heroicon-o-arrow-left class="size-4" />
            Volver a los planes
        </a>

        <div class="mt-8 mb-10 text-center">
            <h1 class="text-3xl font-bold text-slate-900 md:text-4xl">Solicita tu cotización</h1>
            <p class="mt-4 text-slate-600">Cuéntanos qué necesitas y te enviamos una propuesta a tu medida, sin compromiso.</p>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('quote.store') }}" method="POST" class="space-y-5 rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">
            @csrf

            <div>
                <label for="service_id" class="mb-2 block text-sm font-medium text-slate-700">¿Qué plan te interesa?</label>
                <select name="service_id" id="service_id"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                    <option value="">No estoy seguro / quiero asesoría</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" @selected(old('service_id', $selectedId) == $service->id)>
                            {{ $service->title }}@if($service->price_from) — desde ${{ number_format($service->price_from, 0) }}@endif
                        </option>
                    @endforeach
                </select>
                @error('service_id') <p class="mt-1.5 text-sm text-rose-500">{{ $message }}</p> @enderror
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-slate-700">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder-slate-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                           placeholder="Tu nombre">
                    @error('name') <p class="mt-1.5 text-sm text-rose-500">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="phone" class="mb-2 block text-sm font-medium text-slate-700">Teléfono <span class="text-slate-400">(opcional)</span></label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                           class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder-slate-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                           placeholder="+56 9 ...">
                    @error('phone') <p class="mt-1.5 text-sm text-rose-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-slate-700">Correo</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                           class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder-slate-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                           placeholder="tu@correo.com">
                    @error('email') <p class="mt-1.5 text-sm text-rose-500">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="budget" class="mb-2 block text-sm font-medium text-slate-700">Presupuesto <span class="text-slate-400">(opcional)</span></label>
                    <input type="text" name="budget" id="budget" value="{{ old('budget') }}"
                           class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder-slate-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                           placeholder="Ej: $200 aprox.">
                    @error('budget') <p class="mt-1.5 text-sm text-rose-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label for="details" class="mb-2 block text-sm font-medium text-slate-700">Detalles de lo que necesitas</label>
                <textarea name="details" id="details" rows="5"
                          class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder-slate-400 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                          placeholder="Describe tu proyecto, plazos, objetivos...">{{ old('details') }}</textarea>
                @error('details') <p class="mt-1.5 text-sm text-rose-500">{{ $message }}</p> @enderror
            </div>

            <button type="submit"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-3.5 text-base font-semibold text-white shadow-lg shadow-blue-600/25 transition duration-300 hover:-translate-y-0.5 hover:shadow-blue-600/40">
                <x-heroicon-s-paper-airplane class="size-5" />
                Solicitar cotización
            </button>
        </form>
    </div>
</section>
@endsection
