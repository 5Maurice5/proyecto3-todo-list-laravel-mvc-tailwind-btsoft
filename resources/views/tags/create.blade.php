@extends('layouts.app')

@section('title', 'Nueva Etiqueta')

@section('content')

    <div class="max-w-lg mx-auto">

        <div class="flex items-center gap-3 mb-6">
            <div class="bg-gradient-to-br from-sky-500 to-cyan-600 p-3 rounded-xl shadow-lg shadow-sky-200">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">Nueva Etiqueta</h1>
        </div>

        <x-form-errors />

        <form action="{{ route('tags.store') }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-semibold text-slate-700 mb-1.5">Nombre</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ej: urgente, importante..."
                       class="w-full border border-gray-300 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition">
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="flex-1 flex items-center justify-center gap-2 bg-gradient-to-r from-sky-500 to-cyan-600 hover:from-sky-600 hover:to-cyan-700 text-white px-4 py-3 rounded-xl font-medium shadow-lg shadow-sky-200 transition transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Guardar
                </button>
                <a href="{{ route('tags.index') }}"
                   class="bg-gray-100 hover:bg-gray-200 text-slate-700 px-6 py-3 rounded-xl font-medium transition">
                    Cancelar
                </a>
            </div>

        </form>

    </div>

@endsection