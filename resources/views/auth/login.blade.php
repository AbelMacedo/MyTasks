@extends('components.layouts.auth')
@section('title', 'Inicio de sesión')
@section('css')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center vh-100">
            <div class="card w-25">
                <div class="card-header">
                    <h3 class="text-center">Inicio de sesión</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('login.authenticate') }}" method="post">
                        @csrf
                        <label for="email" class="form-label">Correo electrónico: </label>
                        <div class="input-group">
                            <span class="input-group-text">1</span>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="ejemplo@gmail.com">
                        </div>
                        <label for="password" class="form-label">Contraseña: </label>
                        <div class="input-group">
                            <span class="input-group-text">2</span>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="********">
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" class="btn btn-success">Iniciar sesión</button>
                        </div>
                    </form>
                    <hr>
                    <div class="text-center">
                        <p>¿Olvidaste tu contraseña? <a href="#">Recuperar</a></p>
                        <p>¿Aún no tienes cuenta? <a href="{{ route('users.create') }}">Registrarme</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
