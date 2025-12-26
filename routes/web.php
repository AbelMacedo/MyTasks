<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login/authenticate', [AuthController::class, 'authenticate'])->name('login.authenticate');

Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/edit/{id}', [TasksController::class, 'edit'])->name('task.edit');
    Route::post('/tasks/update/{id}', [TasksController::class, 'update'])->name('task.update');
    Route::post('/tasks/destroy/{id}', [TasksController::class, 'destroy'])->name('task.destroy');
    Route::post('/tasks/completed/{id}', [TasksController::class, 'completed'])->name('tasks.completed');
    Route::post('/tasks/incomplete/{id}', [TasksController::class, 'incomplete'])->name('tasks.incomplete');
    Route::get('/tasks/completed-tasks', [TasksController::class, 'completed_tasks'])->name('tasks.completed_tasks');

    Route::get('/users/edit-profile', [UsersController::class, 'edit'])->name('users.edit-profile');
    Route::post('/users/update-profile', [UsersController::class, 'update'])->name('users.update-profile');
});
