@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <div class="max-w-2xl mx-auto">

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

            <div class="bg-gradient-to-r from-sky-600 to-indigo-600 px-8 py-6">
                <div class="flex justify-between items-start gap-4">
                    <h1 class="text-2xl font-bold text-white">{{ $task->title }}</h1>
                    @if ($task->status)
                        <span class="flex items-center gap-1 shrink-0 text-xs font-semibold bg-white/20 text-white px-3 py-1.5 rounded-full backdrop-blur">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Completada
                        </span>
                    @else
                        <span class="flex items-center gap-1 shrink-0 text-xs font-semibold bg-white/20 text-white px-3 py-1.5 rounded-full backdrop-blur">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Pendiente
                        </span>
                    @endif
                </div>
            </div>

            <div class="p-8">
                <p class="text-gray-600 mb-6 leading-relaxed">{{ $task->description ?: 'Sin descripción.' }}</p>

                <div class="mb-4">
                    <span class="text-xs uppercase tracking-wide text-slate-400 font-semibold">Categoría</span>
                    <div class="mt-1.5">
                        <span class="text-sm font-medium bg-indigo-100 text-indigo-700 px-3 py-1.5 rounded-full">
                            🗂️ {{ $task->category->name }}
                        </span>
                    </div>
                </div>

                <div class="mb-8">
                    <span class="text-xs uppercase tracking-wide text-slate-400 font-semibold">Etiquetas</span>
                    <div class="flex flex-wrap gap-2 mt-1.5">
                        @forelse ($task->tags as $tag)
                            <span class="text-sm font-medium bg-sky-50 text-sky-700 border border-sky-200 px-3 py-1.5 rounded-full">#{{ $tag->name }}</span>
                        @empty
                            <span class="text-sm text-gray-400">Sin etiquetas</span>
                        @endforelse
                    </div>
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('tasks.edit', $task) }}"
                       class="flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white px-5 py-2.5 rounded-xl font-medium shadow-lg shadow-amber-100 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Editar
                    </a>
                    <a href="{{ route('tasks.index') }}"
                       class="flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-slate-700 px-5 py-2.5 rounded-xl font-medium transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Volver
                    </a>
                </div>
            </div>

        </div>

    </div>

@endsection