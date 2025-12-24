@extends('components.layouts.auth')
@section('title', 'Crear Cuenta | MyTasks')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row register-container">
            <div class="col-md-6 d-none d-md-flex register-image">
                <div class="text-center p-5">
                    <h1 class="display-4 fw-bold text-white">Únete a MyTasks</h1>
                    <p class="lead">Estás a un paso de organizar tu vida de manera eficiente.</p>
                    <div class="mt-4">
                        <i class="bi bi-check2-circle fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center bg-white">
                <div class="col-11 col-sm-9 col-md-10 col-lg-8 py-5">
                    <div class="card card-register p-4">
                        <div class="card-body">
                            <div class="mb-4 text-center">
                                <h3 class="fw-bold text-success">Crea tu cuenta</h3>
                                <p class="text-muted">Completa tus datos para comenzar.</p>
                            </div>
                            <form action="{{ route('users.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-semibold">Nombre</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Juan Miguel" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="surnames" class="form-label fw-semibold">Apellidos</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-person-badge"></i></span>
                                        <input type="text" name="surnames" id="surnames" class="form-control"
                                            placeholder="Pérez García" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold">Correo electrónico</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="ejemplo@gmail.com" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-semibold">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-shield-lock"></i></span>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="********" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label fw-semibold">Confirmar
                                        contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-shield-check"></i></span>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" placeholder="********" required>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" class="btn btn-success btn-register fw-bold text-uppercase">
                                        Registrarme ahora
                                    </button>
                                </div>
                            </form>
                            <hr class="my-4">
                            <div class="text-center">
                                <p class="mb-0 text-muted">¿Ya tienes una cuenta?
                                    <a href="{{ route('login') }}" class="text-success fw-bold text-decoration-none">Inicia
                                        sesión</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
