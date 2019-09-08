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
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.users.index') }}"> Usuarios</a></li>
        <li class="breadcrumb-item active" aria-current="page"> {{ $user->name }} {{ $user->lastname }}</li>
    </ol>
</nav>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-info">Datos personales</h4>
                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user) }}" method="post">

                            {{ csrf_field() }} {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label for="name" class="bmd-label-floating">Nombre</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name', $user->name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label for="lastname" class="bmd-label-floating">Apellido</label>
                                        <input type="text" class="form-control" name="lastname"
                                            value="{{ old('lastname', $user->lastname) }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Correo electrónico</label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ old('email', $user->email) }}">
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
                                                rows="3">{{ old('biography', $user->biography) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-info btn-block">Actualizar datos</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-info">Modificar contraseña</h4>
                    <div class="card-body">
                        <form action="{{ route('admin.users.password.update', $user) }}" method="post">

                            {{ csrf_field() }} {{ method_field('PUT') }}

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirmar Contraseña</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                            <button class="btn btn-info btn-block">Actualizar contraseña</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-info">Roles</h4>
                    <div class="card-body">
                        <form action="{{ route('admin.users.roles.update', $user) }}" method="post">
                            {{ csrf_field() }} {{ method_field('PUT') }}
                            @foreach ($roles as $role)
                            <div class="checkbox">
                                <label for="">
                                    <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                                        {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                                    {{ $role->name }}<br>
                                    <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
                                </label>
                            </div>
                            @endforeach
                            <button class="btn btn-info btn-block">Actualizar roles</button>
                        </form>
                    </div>
                </div>
                <br>
                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-info">Permisos</h4>
                    <div class="card-body">
                        <form action="{{ route('admin.users.permissions.update', $user) }}" method="post">
                            {{ csrf_field() }} {{ method_field('PUT') }}
                            @foreach ($permissions as $id => $name)
                            <div class="checkbox">
                                <label for="">
                                    <input type="checkbox" name="permissions[]" value="{{ $name }}"
                                        {{ $user->permissions->contains($id) ? 'checked' : '' }}>
                                    {{ $name }}
                                </label>
                            </div>
                            @endforeach
                            <button class="btn btn-info btn-block">Actualizar permisos</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection