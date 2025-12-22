@extends('components.layouts.app')
@section('title', 'Home')
@section('css')

@endsection
@section('content')
<h1>Bienvenido {{ Auth::user()->name }} {{ Auth::user()->surnames }}</h1>
<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit">Cerrar sesión</button>
</form>
@endsection
@section('js')

@endsection
