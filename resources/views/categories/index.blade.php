@extends('layouts.app')

@section('title', 'Categorías')

@section('content')

    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">Categorías</h1>
            <p class="text-slate-500 text-sm mt-1">{{ $categories->total() }} categoría(s) en total</p>
        </div>
        <a href="{{ route('categories.create') }}"
           class="flex items-center gap-2 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-5 py-2.5 rounded-xl shadow-lg shadow-indigo-200 transition transform hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Nueva Categoría
        </a>
    </div>

    @if ($categories->isEmpty())
        <div class="bg-white rounded-2xl shadow-sm border border-dashed border-gray-300 py-16 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <p class="text-gray-500">Aún no tienes categorías registradas</p>
            <a href="{{ route('categories.create') }}" class="text-indigo-600 hover:underline text-sm font-medium mt-2 inline-block">
                Crea tu primera categoría →
            </a>
        </div>
    @else
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($categories as $category)
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-md border border-gray-100 p-5 transition">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-indigo-100 p-2.5 rounded-xl">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <span class="font-semibold text-slate-800 truncate">{{ $category->name }}</span>
                    </div>
                    <div class="flex gap-2 border-t border-gray-100 pt-3">
                        <a href="{{ route('categories.show', $category) }}"
                           class="flex items-center gap-1 text-sky-600 hover:bg-sky-50 px-2.5 py-1.5 rounded-lg text-sm font-medium transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            Ver
                        </a>
                        <a href="{{ route('categories.edit', $category) }}"
                           class="flex items-center gap-1 text-amber-600 hover:bg-amber-50 px-2.5 py-1.5 rounded-lg text-sm font-medium transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Editar
                        </a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar esta categoría? Las tareas asociadas también se eliminarán.');" class="ml-auto">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center gap-1 text-red-600 hover:bg-red-50 px-2.5 py-1.5 rounded-lg text-sm font-medium transition">
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
            {{ $categories->links() }}
        </div>
    @endif

@endsection