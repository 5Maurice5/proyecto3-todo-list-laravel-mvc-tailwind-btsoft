<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('home');

Route::resource('tasks', TaskController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);