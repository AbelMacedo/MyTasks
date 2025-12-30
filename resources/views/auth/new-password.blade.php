@extends('layouts.auth')
@section('title', 'Cambiar correo electrónico')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row auth-container">
            <div class="col-md-6 d-none d-md-flex auth-image">
                <div class="text-center p-5">
                    <h1 class="display-4 fw-bold text-white">MyTasks</h1>
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
                                <h3 class="fw-bold">Cambio de contraseña</h3>
                                <p class="text-muted">Ingresa tu correo electrónico</p>
                            </div>
                            <form action="{{ route('password.update') }}" method="post" id="registerForm">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <input type="hidden" name="email" value="{{ request()->email }}">
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
                                        <i class="bi bi-arrow-clockwise me-2"></i>Actualizar contraseña
                                    </button>
                                </div>
                            </form>
                            <hr class="my-4">
                            <div class="text-center">
                                <p class="mb-0 text-muted">
                                    @if (Auth::check())
                                        <a href="{{ route('home') }}" class="text-success fw-bold text-decoration-none">
                                            Regresar
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="text-success fw-bold text-decoration-none">
                                            Regresar
                                        </a>
                                    @endif
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