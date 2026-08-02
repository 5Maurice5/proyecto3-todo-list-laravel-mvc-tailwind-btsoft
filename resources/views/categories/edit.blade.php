@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')

    <div class="max-w-lg mx-auto">

        <div class="flex items-center gap-3 mb-6">
            <div class="bg-gradient-to-br from-amber-500 to-orange-600 p-3 rounded-xl shadow-lg shadow-amber-200">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">Editar Categoría</h1>
        </div>

        <x-form-errors />

        <form action="{{ route('categories.update', $category) }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-semibold text-slate-700 mb-1.5">Nombre</label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                       class="w-full border border-gray-300 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition">
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="flex-1 flex items-center justify-center gap-2 bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white px-4 py-3 rounded-xl font-medium shadow-lg shadow-amber-200 transition transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Actualizar
                </button>
                <a href="{{ route('categories.index') }}"
                   class="bg-gray-100 hover:bg-gray-200 text-slate-700 px-6 py-3 rounded-xl font-medium transition">
                    Cancelar
                </a>
            </div>

        </form>

    </div>

@endsection