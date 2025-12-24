@extends('components.layouts.app')
@section('title', 'Home')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="main-content">
            <div class="welcome-section">
                <div class="row align-items-center gy-3">
                    <div class="col-12 col-md-8">
                        <h1 class="h3 h1-md mb-0">
                            <strong>¡Bienvenid@ de nuevo, {{ Auth::user()->name }}! 👋</strong>
                        </h1>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-md-end">
                        <button type="button" class="btn btn-success w-100 w-md-auto" data-bs-toggle="modal"
                            data-bs-target="#taskModal">
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
            <div class="row g-4">
                @foreach ($tasks as $task)
                    @if ($task->completed === 'no')
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card task-card h-100">
                                <div class="card-header d-flex justify-content-between align-items-start">
                                    <div>
                                        <h4 class="mb-1 fw-bold">{{ $task->title }}</h4>
                                        <span class="badge bg-secondary">{{ ucfirst($task->priority) }}</span>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light dropdown-toggle-no-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('task.edit', $task->id) }}">
                                                    <i class="bi bi-pencil me-2"></i> Editar
                                                </a>
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
                                    <p class="text-muted small mb-2">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        {{ $task->due_date ?? 'Sin fecha límite' }}
                                    </p>
                                    <p class="mb-0 text-truncate-3">
                                        {{ $task->description }}
                                    </p>
                                </div>
                                <div class="card-footer bg-transparent border-0">
                                    <form action="{{ route('tasks.completed', $task->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success w-100">
                                            <i class="bi bi-check-circle me-1"></i> Completar
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
