@extends('components.layouts.auth')
@section('title', 'Registro de usuarios')
@section('css')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center vh-100">
            <div class="card w-25">
                <div class="card-header">
                    <h3 class="text-center">Registro de usuarios</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <label for="name" class="form-label">Nombre: </label>
                        <div class="input-group">
                            <span class="input-group-text">1</span>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Juan Miguel">
                        </div>
                        <label for="surnames" class="form-label">Apellidos: </label>
                        <div class="input-group">
                            <span class="input-group-text">2</span>
                            <input type="text" name="surnames" id="surnames" class="form-control"
                                placeholder="Pérez García">
                        </div>
                        <label for="email" class="form-label">Correo electrónico: </label>
                        <div class="input-group">
                            <span class="input-group-text">3</span>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="ejemplo@gmail.com">
                        </div>
                        <label for="password" class="form-label">Contraseña: </label>
                        <div class="input-group">
                            <span class="input-group-text">4</span>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="********">
                        </div>
                        <label for="password_confirmation" class="form-label">Confirmar contraseña: </label>
                        <div class="input-group">
                            <span class="input-group-text">5</span>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" placeholder="********">
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" class="btn btn-success">Regristarse</button>
                        </div>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a href="{{ route('login') }}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
