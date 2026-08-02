@extends('layouts.app')

@section('title', 'Nueva Tarea')

@section('content')

    <div class="max-w-2xl mx-auto">

        <div class="flex items-center gap-3 mb-6">
            <div class="bg-gradient-to-br from-sky-500 to-indigo-600 p-3 rounded-xl shadow-lg shadow-sky-200">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 4H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">Nueva Tarea</h1>
        </div>

        <x-form-errors />

        <form action="{{ route('tasks.store') }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-semibold text-slate-700 mb-1.5">Título</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Ej: Terminar informe mensual"
                       class="w-full border border-gray-300 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition">
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-slate-700 mb-1.5">Descripción</label>
                <textarea name="description" id="description" rows="4" placeholder="Detalles de la tarea (opcional)"
                          class="w-full border border-gray-300 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition">{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="category_id" class="block text-sm font-semibold text-slate-700 mb-1.5">Categoría</label>
                <select name="category_id" id="category_id"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition bg-white">
                    <option value="">-- Selecciona una categoría --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @if ($categories->isEmpty())
                    <p class="text-sm text-amber-600 mt-1.5 flex items-center gap-1">
                        ⚠️ No hay categorías creadas.
                        <a href="{{ route('categories.create') }}" class="underline font-medium">Crea una primero</a>
                    </p>
                @endif
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Etiquetas</label>
                <div class="flex flex-wrap gap-2 border border-gray-300 rounded-xl p-4">
                    @forelse ($tags as $tag)
                        <label class="flex items-center gap-1.5 text-sm bg-gray-50 hover:bg-sky-50 border border-gray-200 has-[:checked]:bg-sky-100 has-[:checked]:border-sky-400 px-3 py-1.5 rounded-full cursor-pointer transition">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                   @checked(collect(old('tags'))->contains($tag->id))
                                   class="rounded text-sky-600 focus:ring-sky-500">
                            {{ $tag->name }}
                        </label>
                    @empty
                        <p class="text-sm text-amber-600 flex items-center gap-1">
                            ⚠️ No hay etiquetas creadas.
                            <a href="{{ route('tags.create') }}" class="underline font-medium">Crea una primero</a>
                        </p>
                    @endforelse
                </div>
            </div>

            <label class="flex items-center gap-2 bg-gray-50 rounded-xl px-4 py-3 cursor-pointer border border-gray-200 has-[:checked]:bg-emerald-50 has-[:checked]:border-emerald-300 transition">
                <input type="checkbox" name="status" id="status" value="1" @checked(old('status'))
                       class="rounded text-emerald-600 focus:ring-emerald-500 w-4 h-4">
                <span class="text-sm text-slate-700 font-medium">Marcar como completada</span>
            </label>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="flex-1 flex items-center justify-center gap-2 bg-gradient-to-r from-sky-600 to-indigo-600 hover:from-sky-700 hover:to-indigo-700 text-white px-4 py-3 rounded-xl font-medium shadow-lg shadow-sky-200 transition transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Guardar Tarea
                </button>
                <a href="{{ route('tasks.index') }}"
                   class="bg-gray-100 hover:bg-gray-200 text-slate-700 px-6 py-3 rounded-xl font-medium transition">
                    Cancelar
                </a>
            </div>

        </form>

    </div>

@endsection