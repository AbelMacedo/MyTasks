@extends('layouts.auth')
@section('title', 'Crear Cuenta')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row auth-container">
            <div class="col-md-6 d-none d-md-flex auth-image">
                <div class="text-center p-5">
                    <h1 class="display-4 fw-bold text-white">Únete a MyTasks</h1>
                    <p class="lead">Estás a un paso de organizar tu vida de manera eficiente.</p>
                    <div class="mt-5">
                        <i class="bi bi-check2-circle fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center bg-white">
                <div class="col-11 col-sm-9 col-md-10 col-lg-8 py-5">
                    <div class="card card-auth p-4">
                        <div class="card-body">
                            <div class="mb-4 text-center">
                                <h3 class="fw-bold">Crea tu cuenta</h3>
                                <p class="text-muted">Completa tus datos para comenzar</p>
                            </div>
                            <form action="{{ route('users.store') }}" method="post" id="registerForm">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        <i class="bi bi-person-fill me-1"></i>Nombre
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-person"></i>
                                        </span>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Juan Miguel" autofocus>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="surnames" class="form-label">
                                        <i class="bi bi-person-badge-fill me-1"></i>Apellidos
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-person-badge"></i>
                                        </span>
                                        <input type="text" name="surnames" id="surnames" class="form-control"
                                            placeholder="Pérez García">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">
                                        <i class="bi bi-envelope-fill me-1"></i>Correo electrónico
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-envelope"></i>
                                        </span>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="ejemplo@gmail.com">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">
                                        <i class="bi bi-shield-lock-fill me-1"></i>Contraseña
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-shield-lock"></i>
                                        </span>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="••••••••" minlength="8">
                                    </div>
                                    <div class="password-strength">
                                        <div class="password-strength-bar" id="strengthBar"></div>
                                    </div>
                                    <small class="password-hint">
                                        <i class="bi bi-info-circle me-1"></i>Mínimo 8 caracteres
                                    </small>
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">
                                        <i class="bi bi-shield-check-fill me-1"></i>Confirmar contraseña
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-shield-check"></i>
                                        </span>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" placeholder="••••••••">
                                    </div>
                                </div>
                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" class="btn btn-success btn-auth">
                                        <i class="bi bi-person-plus-fill me-2"></i>Registrarme ahora
                                    </button>
                                </div>
                            </form>
                            <hr class="my-4">
                            <div class="text-center">
                                <p class="mb-0 text-muted">
                                    ¿Ya tienes una cuenta?
                                    <a href="{{ route('login') }}" class="text-success fw-bold text-decoration-none">
                                        Inicia sesión
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
    <script>
        const password = document.getElementById('password');
        const strengthBar = document.getElementById('strengthBar');

        password.addEventListener('input', function () {
            const value = this.value;
            const strength = calculatePasswordStrength(value);

            strengthBar.className = 'password-strength-bar';

            if (strength === 1) {
                strengthBar.classList.add('weak');
            } else if (strength === 2) {
                strengthBar.classList.add('medium');
            } else if (strength === 3) {
                strengthBar.classList.add('strong');
            }
        });

        function calculatePasswordStrength(password) {
            if (password.length === 0) return 0;
            if (password.length < 8) return 1;

            let strength = 1;

            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
            if (/\d/.test(password)) strength++;
            if (/[^a-zA-Z0-9]/.test(password)) strength = 3;

            return Math.min(strength, 3);
        }
    </script>
@endsection