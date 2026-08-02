@extends('layouts.app')

@section('title', 'Editar Tarea')

@section('content')

    <div class="max-w-2xl mx-auto">

        <div class="flex items-center gap-3 mb-6">
            <div class="bg-gradient-to-br from-amber-500 to-orange-600 p-3 rounded-xl shadow-lg shadow-amber-200">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">Editar Tarea</h1>
        </div>

        <x-form-errors />

        <form action="{{ route('tasks.update', $task) }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-semibold text-slate-700 mb-1.5">Título</label>
                <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}"
                       class="w-full border border-gray-300 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition">
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-slate-700 mb-1.5">Descripción</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border border-gray-300 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition">{{ old('description', $task->description) }}</textarea>
            </div>

            <div>
                <label for="category_id" class="block text-sm font-semibold text-slate-700 mb-1.5">Categoría</label>
                <select name="category_id" id="category_id"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition bg-white">
                    <option value="">-- Selecciona una categoría --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @selected(old('category_id', $task->category_id) == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Etiquetas</label>
                <div class="flex flex-wrap gap-2 border border-gray-300 rounded-xl p-4">
                    @php
                        $selectedTags = old('tags', $task->tags->pluck('id')->toArray());
                    @endphp
                    @forelse ($tags as $tag)
                        <label class="flex items-center gap-1.5 text-sm bg-gray-50 hover:bg-sky-50 border border-gray-200 has-[:checked]:bg-sky-100 has-[:checked]:border-sky-400 px-3 py-1.5 rounded-full cursor-pointer transition">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                   @checked(collect($selectedTags)->contains($tag->id))
                                   class="rounded text-sky-600 focus:ring-sky-500">
                            {{ $tag->name }}
                        </label>
                    @empty
                        <p class="text-sm text-amber-600">No hay etiquetas creadas.</p>
                    @endforelse
                </div>
            </div>

            <label class="flex items-center gap-2 bg-gray-50 rounded-xl px-4 py-3 cursor-pointer border border-gray-200 has-[:checked]:bg-emerald-50 has-[:checked]:border-emerald-300 transition">
                <input type="checkbox" name="status" id="status" value="1"
                       @checked(old('status', $task->status))
                       class="rounded text-emerald-600 focus:ring-emerald-500 w-4 h-4">
                <span class="text-sm text-slate-700 font-medium">Marcar como completada</span>
            </label>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="flex-1 flex items-center justify-center gap-2 bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white px-4 py-3 rounded-xl font-medium shadow-lg shadow-amber-200 transition transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Actualizar Tarea
                </button>
                <a href="{{ route('tasks.index') }}"
                   class="bg-gray-100 hover:bg-gray-200 text-slate-700 px-6 py-3 rounded-xl font-medium transition">
                    Cancelar
                </a>
            </div>

        </form>

    </div>

@endsection