<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
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

    Route::get('/email/change', [EmailController::class, 'change_email'])->name('email.change');
    Route::post('/email/update', [EmailController::class, 'update_email'])->name('email.update');
    Route::get('/email/verify', [EmailController::class, 'verify_email'])->name('email.verify');
    Route::post('/email/validate', [EmailController::class, 'verify_code'])->name('email.validate');
});

Route::get('/password/recover', [PasswordController::class, 'recover_password'])->name('password.recover');
Route::post('/password/send-recovery-email', [PasswordController::class, 'send_recovery_email'])->name('password.send_recovery_email');
Route::get('/password/reset/{token}', [PasswordController::class, 'reset_password'])->name('password.reset');
Route::post('/password/update', [PasswordController::class, 'update_password'])->name('password.update');
