<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'To-Do List')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-slate-800 text-white shadow-md">
        <div class="max-w-5xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <a href="{{ route('home') }}" class="font-bold text-lg">📝 To-Do List</a>

                <button id="menu-btn" class="md:hidden text-white focus:outline-none">
                    ☰
                </button>

                <div class="hidden md:flex gap-6">
                    <a href="{{ route('tasks.index') }}" class="hover:text-sky-300 transition">Tareas</a>
                    <a href="{{ route('categories.index') }}" class="hover:text-sky-300 transition">Categorías</a>
                    <a href="{{ route('tags.index') }}" class="hover:text-sky-300 transition">Etiquetas</a>
                </div>
            </div>

            <div id="menu-mobile" class="hidden md:hidden flex flex-col gap-2 pb-4">
                <a href="{{ route('tasks.index') }}" class="hover:text-sky-300 transition">Tareas</a>
                <a href="{{ route('categories.index') }}" class="hover:text-sky-300 transition">Categorías</a>
                <a href="{{ route('tags.index') }}" class="hover:text-sky-300 transition">Etiquetas</a>
            </div>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-4 py-8">

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>

    <script>
        document.getElementById('menu-btn').addEventListener('click', () => {
            document.getElementById('menu-mobile').classList.toggle('hidden');
        });
    </script>

</body>
</html>