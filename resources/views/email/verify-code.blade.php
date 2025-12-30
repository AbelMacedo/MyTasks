@extends('layouts.auth')
@section('title', 'Codigo de verificación')

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
                                <h3 class="fw-bold">Codigo de verificación.</h3>
                                <p class="text-muted">Ingresa el código de verificación</p>
                            </div>
                            <form action="{{ route('email.validate') }}" method="post" id="registerForm">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">
                                        <i class="bi bi-envelope-fill me-1"></i>Codigo de verificación
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-envelope"></i>
                                        </span>
                                        <input type="code" name="code" id="code" class="form-control" placeholder="123456">
                                    </div>
                                </div>
                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" class="btn btn-success btn-auth">
                                        <i class="bi bi-person-plus-fill me-2"></i>Verificar código
                                    </button>
                                </div>
                            </form>
                            <hr class="my-4">
                            <div class="text-center">
                                <p class="mb-0 text-muted">
                                    <a href="{{ route('home') }}" class="text-success fw-bold text-decoration-none">
                                        Regresar
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