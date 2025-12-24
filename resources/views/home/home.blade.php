@extends('components.layouts.app')
@section('title', 'Home')
@section('css')

@endsection
@section('content')
    <div class="container-fluid">
        <h1>Bienvenido {{ Auth::user()->name }} {{ Auth::user()->surnames }}</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taskModal">Nueva tarea</button>
        <h1>Tareas pendientes</h1>
        <div class="row">
            @foreach ($tasks as $task)
                @if ($task->completed == 'no')
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center">{{ $task->title }}</h3>
                                <p>{{ $task->priority }}</p>
                            </div>
                            <div class="card-body">
                                @if ($task->due_date)
                                    <h4>{{ $task->due_date }}</h4>
                                @else
                                    <h4>Sin fecha limite</h4>
                                @endif
                                <p>{{ $task->description }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('task.edit', $task->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('task.destroy', $task->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="confirm('¿Estas seguro de eliminar esta tarea?')">Eliminar</button>
                                </form>
                                <form action="{{ route('tasks.completed', $task->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success"
                                        onclick="confirm('¿Estas seguro de marcar la tarea como completada?')">Completada</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    </div>
@endsection
@section('js')

@endsection
