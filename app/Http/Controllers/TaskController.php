<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['category', 'tags'])->latest()->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('tasks.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array|min:1',
            'tags.*' => 'exists:tags,id',
        ]);

        $task = Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'status' => $request->boolean('status'),
            'category_id' => $validated['category_id'],
        ]);

        $task->tags()->attach($validated['tags']);

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea creada correctamente.');
    }

    public function show(Task $task)
    {
        $task->load(['category', 'tags']);
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $task->load('tags');
        return view('tasks.edit', compact('task', 'categories', 'tags'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array|min:1',
            'tags.*' => 'exists:tags,id',
        ]);

        $task->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'status' => $request->boolean('status'),
            'category_id' => $validated['category_id'],
        ]);

        $task->tags()->sync($validated['tags']);

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea actualizada correctamente.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea eliminada correctamente.');
    }
}