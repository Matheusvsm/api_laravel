<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\TasksController;

Route::get('/tasks', [TasksController::class, 'index'])->name('tasks.index');
Route::post('/v1/tasks', [TasksController::class, 'store'])->name('tasks.store');

