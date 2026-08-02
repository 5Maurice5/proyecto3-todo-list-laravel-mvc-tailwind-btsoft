@extends('layouts.app')

@section('title', 'Etiquetas')

@section('content')

    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">Etiquetas</h1>
            <p class="text-slate-500 text-sm mt-1">{{ $tags->total() }} etiqueta(s) en total</p>
        </div>
        <a href="{{ route('tags.create') }}"
           class="flex items-center gap-2 bg-gradient-to-r from-sky-500 to-cyan-600 hover:from-sky-600 hover:to-cyan-700 text-white px-5 py-2.5 rounded-xl shadow-lg shadow-sky-200 transition transform hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Nueva Etiqueta
        </a>
    </div>

    @if ($tags->isEmpty())
        <div class="bg-white rounded-2xl shadow-sm border border-dashed border-gray-300 py-16 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
            </svg>
            <p class="text-gray-500">Aún no tienes etiquetas registradas</p>
            <a href="{{ route('tags.create') }}" class="text-sky-600 hover:underline text-sm font-medium mt-2 inline-block">
                Crea tu primera etiqueta →
            </a>
        </div>
    @else
        <div class="flex flex-wrap gap-3">
            @foreach ($tags as $tag)
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-md border border-gray-100 px-4 py-3 flex items-center gap-3 transition">
                    <span class="font-medium text-sky-700 bg-sky-50 border border-sky-200 px-3 py-1 rounded-full text-sm">
                        #{{ $tag->name }}
                    </span>
                    <div class="flex gap-1">
                        <a href="{{ route('tags.show', $tag) }}"
                           class="text-sky-600 hover:bg-sky-50 p-1.5 rounded-lg transition" title="Ver">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                        <a href="{{ route('tags.edit', $tag) }}"
                           class="text-amber-600 hover:bg-amber-50 p-1.5 rounded-lg transition" title="Editar">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                        <form action="{{ route('tags.destroy', $tag) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar esta etiqueta?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:bg-red-50 p-1.5 rounded-lg transition" title="Eliminar">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $tags->links() }}
        </div>
    @endif

@endsection