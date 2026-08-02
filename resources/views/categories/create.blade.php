@extends('layouts.app')

@section('title', 'Nueva Categoría')

@section('content')

    <div class="max-w-lg mx-auto">

        <div class="flex items-center gap-3 mb-6">
            <div class="bg-gradient-to-br from-indigo-500 to-purple-600 p-3 rounded-xl shadow-lg shadow-indigo-200">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">Nueva Categoría</h1>
        </div>

        <x-form-errors />

        <form action="{{ route('categories.store') }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-semibold text-slate-700 mb-1.5">Nombre</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ej: Trabajo, Personal, Estudios..."
                       class="w-full border border-gray-300 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="flex-1 flex items-center justify-center gap-2 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-4 py-3 rounded-xl font-medium shadow-lg shadow-indigo-200 transition transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Guardar
                </button>
                <a href="{{ route('categories.index') }}"
                   class="bg-gray-100 hover:bg-gray-200 text-slate-700 px-6 py-3 rounded-xl font-medium transition">
                    Cancelar
                </a>
            </div>

        </form>

    </div>

@endsection