@extends('components.layouts.app')
@section('title', 'Home')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/task_modal.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="main-content">
            <div class="welcome-section">
                <div class="row align-items-center gy-3">
                    <div class="col-12 col-md-8">
                        <h1 class="mb-0">
                            <strong>¡Bienvenid@ de nuevo, {{ Auth::user()->name }}!</strong>
                        </h1>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-md-end">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#taskModal">
                            Nueva tarea <i class="bi bi-journal-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="section-header">
                <h3>Tareas pendientes</h3>
                <span class="section-badge">
                    @if ($tasks->count() == 1)
                        {{ $tasks->count() }} tarea
                    @else
                        {{ $tasks->count() }} tareas
                    @endif
                </span>
            </div>
            @if ($tasks->where('completed', 'no')->count() > 0)
                <div class="row g-4">
                    @foreach ($tasks as $task)
                        @if ($task->completed === 'no')
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <div
                                    class="card task-card h-100 priority-{{ $task->priority === 'alta' ? 'high' : ($task->priority === 'media' ? 'medium' : 'low') }}">
                                    <div class="card-header d-flex justify-content-between align-items-start">
                                        <div class="flex-grow-1">
                                            <h3 class="mb-2">{{ $task->title }}</h3>
                                            <div>
                                                @if ($task->priority === 'alta')
                                                    <span class="badge bg-danger">
                                                        <i class="bi bi-exclamation-circle-fill me-1"></i>Alta
                                                    </span>
                                                @elseif ($task->priority === 'media')
                                                    <span class="badge bg-warning text-dark">
                                                        <i class="bi bi-dash-circle-fill me-1"></i>Media
                                                    </span>
                                                @else
                                                    <span class="badge bg-success">
                                                        <i class="bi bi-check-circle-fill me-1"></i>Baja
                                                    </span>
                                                @endif
                                                @php
                                                    $today = Carbon\Carbon::today();
                                                    $dueDate = Carbon\Carbon::parse($task->due_date);
                                                @endphp
                                                @if ($task->due_date && $dueDate->lt($today))
                                                    <span class="badge bg-danger">
                                                        <i class="bi bi-x-circle-fill me-1"></i> Expirada
                                                    </span>
                                                @else
                                                    <span class="badge bg-success">
                                                        <i class="bi bi-check-circle-fill me-1"></i> Vigente
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle-no-arrow" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('task.edit', $task->id) }}">
                                                        <i class="bi bi-pencil me-2"></i> Editar
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                                                        @csrf
                                                        <button class="dropdown-item text-danger"
                                                            onclick="return confirm('¿Eliminar tarea?')">
                                                            <i class="bi bi-trash me-2"></i> Eliminar
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <label for=""><strong class="text-secondary">Fecha: </strong></label>
                                        <p class="text-muted small mb-2">
                                            <i class="bi bi-calendar-event me-1"></i>
                                            {{ $task->due_date ?? 'Sin fecha límite' }}
                                        </p>
                                        <p class="mb-0 text-truncate-3">
                                            {{ $task->description }}
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <form action="{{ route('tasks.completed', $task->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-success w-100"
                                                onclick="return confirm('¿Estás seguro de marcar esta tarea como completa?')">
                                                <i class="bi bi-check-circle-fill me-2"></i>Marcar como completa
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="bi bi-inbox"></i>
                    <h4>No tienes tareas pendientes</h4>
                    <p>¡Excelente! Has completado todas tus tareas o aún no has creado ninguna.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
@section('js')
@endsection
