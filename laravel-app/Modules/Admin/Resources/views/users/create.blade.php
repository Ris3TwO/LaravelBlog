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
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 ">
                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-info">Datos personales</h4>
                    <div class="card-body">
                        <form action="{{ route('admin.users.store') }}" method="post">

                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label for="name" class="bmd-label-floating">Nombre</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label for="lastname" class="bmd-label-floating">Apellido</label>
                                        <input type="text" class="form-control" name="lastname"
                                            value="{{ old('lastname') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email" class="bmd-label-floating">Correo electrónico</label>
                                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Biografía</label>
                                        <div class="form-group bmd-form-group">
                                            <label for="biografia" class="bmd-label-floating">Una breve información
                                                sobre ti</label>
                                            <textarea class="form-control" name="biography" id="biografia"
                                                rows="3">{{ old('biography') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Roles</label>
                                        <div class="form-group">
                                            @include('admin::roles.checkboxes')
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Permisos</label>
                                        <div class="form-group">
                                            @include('admin::permissions.checkboxes', ['model' => $user])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <span class="help-block">
                                <strong>
                                    <u>Nota:</u>
                                </strong>
                                La contraseña será generada y enviada al nuevo usuario vía email.
                            </span>
                            <hr>
                            <button class="btn btn-info btn-block">Crear usuario</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection