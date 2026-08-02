@extends('layouts.app')

@section('title', 'Tareas')

@section('content')

    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">Mis Tareas</h1>
            <p class="text-slate-500 text-sm mt-1">{{ $tasks->total() }} tarea(s) en total</p>
        </div>
        <a href="{{ route('tasks.create') }}"
           class="flex items-center gap-2 bg-gradient-to-r from-sky-600 to-indigo-600 hover:from-sky-700 hover:to-indigo-700 text-white px-5 py-2.5 rounded-xl shadow-lg shadow-sky-200 transition transform hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Nueva Tarea
        </a>
    </div>

    @if ($tasks->isEmpty())
        <div class="bg-white rounded-2xl shadow-sm border border-dashed border-gray-300 py-16 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <p class="text-gray-500">Aún no tienes tareas registradas</p>
            <a href="{{ route('tasks.create') }}" class="text-sky-600 hover:underline text-sm font-medium mt-2 inline-block">
                Crea tu primera tarea →
            </a>
        </div>
    @else
        <div class="grid gap-4">
            @foreach ($tasks as $task)
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-md border border-gray-100 p-5 flex flex-col md:flex-row md:items-center md:justify-between gap-4 transition">

                    <div class="flex-1">
                        <div class="flex items-center gap-2 flex-wrap">
                            <h2 class="font-semibold text-lg text-slate-800">{{ $task->title }}</h2>

                            @if ($task->status)
                                <span class="flex items-center gap-1 text-xs font-medium bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-full">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Completada
                                </span>
                            @else
                                <span class="flex items-center gap-1 text-xs font-medium bg-amber-100 text-amber-700 px-2.5 py-1 rounded-full">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Pendiente
                                </span>
                            @endif
                        </div>

                        @if ($task->description)
                            <p class="text-gray-500 text-sm mt-1.5">{{ Str::limit($task->description, 100) }}</p>
                        @endif

                        <div class="flex flex-wrap gap-2 mt-3">
                            <span class="text-xs font-medium bg-indigo-100 text-indigo-700 px-2.5 py-1 rounded-full">
                                🗂️ {{ $task->category->name }}
                            </span>
                            @foreach ($task->tags as $tag)
                                <span class="text-xs font-medium bg-sky-50 text-sky-700 border border-sky-200 px-2.5 py-1 rounded-full">
                                    #{{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex gap-2 shrink-0 md:flex-col md:items-end">
                        <a href="{{ route('tasks.show', $task) }}"
                           class="flex items-center gap-1 text-sky-600 hover:bg-sky-50 px-3 py-1.5 rounded-lg text-sm font-medium transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            Ver
                        </a>
                        <a href="{{ route('tasks.edit', $task) }}"
                           class="flex items-center gap-1 text-amber-600 hover:bg-amber-50 px-3 py-1.5 rounded-lg text-sm font-medium transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Editar
                        </a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar esta tarea?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center gap-1 text-red-600 hover:bg-red-50 px-3 py-1.5 rounded-lg text-sm font-medium transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Eliminar
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $tasks->links() }}
        </div>
    @endif

@endsection