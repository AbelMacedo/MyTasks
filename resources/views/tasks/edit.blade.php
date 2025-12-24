@extends('components.layouts.app')
@section('title', 'Editar tarea')
@section('css')

@endsection
@section('content')
    <div class="container-fluid">
        <h1>Editar tarea</h1>
        <form action="{{ route('task.update', $task->id) }}" method="post">
            @csrf
            <label for="title" class="form-label">Titulo: </label>
            <div class="input-group">
                <span class="input-group-text">1</span>
                <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
            </div>
            <label for="description" class="form-label">Descripción: </label>
            <div class="input-group">
                <span class="input-group-text">2</span>
                <textarea class="form-control" id="description" name="description" required>{{ $task->description }}</textarea>
            </div>
            <label for="due_date" class="form-label">Fecha limite: </label>
            <div class="input-group">
                <span class="input-group-text">3</span>
                <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date }}"
                    {{ $task->due_date == null ? 'disabled' : '' }}>
            </div>
            <label for="priority" class="form-label">Prioridad: </label>
            <div class="input-group">
                <span class="input-group-text">4</span>
                <select class="form-select" id="priority" name="priority" required>
                    <option value="Alta" {{ $task->priority == 'Alta' ? 'selected' : '' }}>Alta</option>
                    <option value="Media" {{ $task->priority == 'Media' ? 'selected' : '' }}>Media</option>
                    <option value="Baja" {{ $task->priority == 'Baja' ? 'selected' : '' }}>Baja</option>
                </select>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="without_due_date" name="without_due_date"
                    {{ $task->due_date == null ? 'checked' : '' }}>
                <label class="form-check-label" for="without_due_date">Sin fecha limite</label>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar tarea</button>
        </form>
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
            } else {
                dueDate.disabled = false;
            }
        });
    </script>
@endsection
