@extends('layouts.app')

@section('title', $category->name)

@section('content')

    <div class="max-w-2xl mx-auto">

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-6 flex items-center gap-3">
                <div class="bg-white/20 p-2.5 rounded-xl backdrop-blur">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-white">{{ $category->name }}</h1>
            </div>

            <div class="p-8">
                <span class="text-xs uppercase tracking-wide text-slate-400 font-semibold">Tareas en esta categoría</span>

                @if ($category->tasks->isEmpty())
                    <p class="text-gray-400 text-sm mt-2 mb-6">No hay tareas en esta categoría.</p>
                @else
                    <ul class="space-y-2 mt-3 mb-8">
                        @foreach ($category->tasks as $task)
                            <li>
                                <a href="{{ route('tasks.show', $task) }}"
                                   class="flex items-center gap-2 bg-gray-50 hover:bg-indigo-50 rounded-xl px-4 py-2.5 text-sm text-slate-700 transition">
                                    <svg class="w-4 h-4 text-indigo-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    {{ $task->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <div class="flex gap-3">
                    <a href="{{ route('categories.edit', $category) }}"
                       class="flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white px-5 py-2.5 rounded-xl font-medium shadow-lg shadow-amber-100 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Editar
                    </a>
                    <a href="{{ route('categories.index') }}"
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