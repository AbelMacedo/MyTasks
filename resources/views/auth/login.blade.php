@extends('components.layouts.auth')
@section('title', 'Inicio de sesión | MyTasks')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row login-container">
            <div class="col-md-6 d-none d-md-flex login-image">
                <div class="text-center p-5">
                    <h1 class="display-4 fw-bold">MyTasks</h1>
                    <p class="lead">Organiza tu día, alcanza tus metas y mantén todo bajo control.</p>
                    <div class="mt-5">
                        <i class="bi bi-check2-circle fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center bg-white">
                <div class="col-10 col-sm-8 col-md-10 col-lg-7">
                    <div class="card card-login p-4">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <h3 class="fw-bold">¡Bienvenido de nuevo!</h3>
                                <p class="text-muted">Ingresa tus credenciales para continuar</p>
                            </div>
                            <form action="{{ route('login.authenticate') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">
                                        <i class="bi bi-envelope-fill me-1"></i>Correo electrónico
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-envelope"></i>
                                        </span>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="nombre@ejemplo.com" required autofocus>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">
                                        <i class="bi bi-lock-fill me-1"></i>Contraseña
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-lock"></i>
                                        </span>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="••••••••" required>
                                    </div>
                                    <div class="text-end mt-2">
                                        <a href="#" class="text-decoration-none small text-muted">
                                            <i class="bi bi-question-circle me-1"></i>¿Olvidaste tu contraseña?
                                        </a>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" class="btn btn-success btn-login">
                                        <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sesión
                                    </button>
                                </div>
                            </form>
                            <hr class="my-4">
                            <div class="text-center">
                                <p class="mb-0 text-muted">
                                    ¿Aún no tienes cuenta?
                                    <a href="{{ route('users.create') }}" class="text-success fw-bold text-decoration-none">
                                        Regístrate aquí
                                    </a>
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
