@extends('admin::layouts.master')
@section('header')
<div class="navbar-wrapper">
    <p class="navbar-brand">USUARIOS</p>
</div>
@stop

@section('content')
<nav aria-label="breadcrumb justify-content-end" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i class="material-icons">dashboard</i> Inicio</a>
        </li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.users.index') }}"><i
                    class="material-icons">person</i> Usuarios</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Crear usuario</li>
    </ol>
</nav>
@endsection