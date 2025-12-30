@extends('layouts.app')
@section('title', 'Perfil de usuario')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/form-edit.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="main-content">
            <div class="page-header d-flex justify-content-between align-items-center">
                <h1 class="mb-0">
                    <i class="bi bi-pencil-square"></i>
                    Editar perfil
                </h1>
                <div class="d-flex gap-2 flex-wrap justify-content-end header-actions">
                    <a href="{{ route('password.recover') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-key-fill me-1"></i>
                        Cambiar contraseña
                    </a>

                    <a href="{{ route('email.change') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-envelope-fill me-1"></i>
                        Cambiar correo electrónico
                    </a>
                </div>
            </div>
            <div class="form-container">
                <form action="{{ route('users.update-profile') }}" method="post" id="registerForm">
                    @csrf
                    <label for="name" class="form-label">
                        <i class="bi bi-person-fill me-1"></i>Nombre
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Juan Miguel"
                            autofocus value="{{ $user->name }}">
                    </div>
                    <label for="surnames" class="form-label">
                        <i class="bi bi-person-badge-fill me-1"></i>Apellidos
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person-badge"></i>
                        </span>
                        <input type="text" name="surnames" id="surnames" class="form-control" placeholder="Pérez García"
                            value="{{ $user->surnames }}">
                    </div>
                    <label for="email" class="form-label">
                        <i class="bi bi-envelope-fill me-1"></i>Correo electrónico
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="ejemplo@gmail.com" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="btn-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle-fill"></i>
                            Actualizar perfil
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

@endsection
