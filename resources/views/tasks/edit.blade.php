@extends('layouts.app')
@section('title', 'Editar Tarea')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/form-edit.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="main-content">
            <div class="page-header">
                <h1>
                    <i class="bi bi-pencil-square"></i>
                    Editar tarea
                </h1>
            </div>
            <div class="form-container">
                <form action="{{ route('task.update', $task->id) }}" method="post">
                    @csrf
                    <label for="title" class="form-label">
                        <i class="bi bi-pencil-fill"></i>
                        Título de la tarea
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">1</span>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}"
                            placeholder="Ej: Completar informe mensual" required>
                    </div>
                    <label for="description" class="form-label">
                        <i class="bi bi-text-paragraph"></i>
                        Descripción
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">2</span>
                        <textarea class="form-control" id="description" name="description" placeholder="Describe los detalles de tu tarea..."
                            required>{{ $task->description }}</textarea>
                    </div>
                    <label for="due_date" class="form-label">
                        <i class="bi bi-calendar-event"></i>
                        Fecha límite
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">3</span>
                        <input type="date" class="form-control" id="due_date" name="due_date"
                            value="{{ $task->due_date }}" {{ $task->due_date == null ? 'disabled' : '' }}>
                    </div>
                    <label for="priority" class="form-label">
                        <i class="bi bi-flag-fill"></i>
                        Prioridad
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">4</span>
                        <select class="form-select" id="priority" name="priority" required>
                            <option value="alta" {{ strtolower($task->priority) == 'alta' ? 'selected' : '' }}>🔴 Alta
                            </option>
                            <option value="media" {{ strtolower($task->priority) == 'media' ? 'selected' : '' }}>🟡
                                Media</option>
                            <option value="baja" {{ strtolower($task->priority) == 'baja' ? 'selected' : '' }}>🟢 Baja
                            </option>
                        </select>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="without_due_date" name="without_due_date"
                            {{ $task->due_date == null ? 'checked' : '' }}>
                        <label class="form-check-label" for="without_due_date">
                            <i class="bi bi-infinity"></i>
                            Sin fecha límite
                        </label>
                    </div>
                    <div class="btn-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle-fill"></i>
                            Actualizar tarea
                        </button>
                        <a href="{{ route('home') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i>
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        const dueDate = document.getElementById('due_date');
        const withoutDueDate = document.getElementById('without_due_date');

        withoutDueDate.addEventListener('change', function() {
            if (this.checked) {
                dueDate.disabled = true;
                dueDate.value = '';
                dueDate.parentElement.style.opacity = '0.5';
            } else {
                dueDate.disabled = false;
                dueDate.parentElement.style.opacity = '1';
            }
        });
    </script>
@endsection
