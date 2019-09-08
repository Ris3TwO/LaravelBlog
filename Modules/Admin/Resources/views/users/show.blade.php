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
        <li class="breadcrumb-item active" aria-current="page"> {{ $user->name }} {{ $user->lastname }}</li>
    </ol>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="#pablo">
                        <img class="img"
                            src="https://demos.creative-tim.com/material-dashboard-dark/assets/img/faces/marc.jpg">
                    </a>
                </div>
                <div class="card-body">
                    <h6 class="card-category text-gray">{{ $user->getRoleNames()->implode('/ ') }}</h6>
                    <h4 class="card-title">{{ $user->name }}</h4>
                    <p class="card-description">
                        {{ $user->biography }}
                    </p>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Email
                            <span class="text-primary">{{ $user->email }}</span>
                            {{-- <span class="badge badge-primary badge-pill">14</span> --}}
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Publicaciones
                            <span class="badge badge-primary badge-pill">{{ $user->posts->count() }}</span>
                        </li>
                        @if ($user->roles->count())
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Roles
                                <span>{{ $user->getRoleNames()->implode(', ') }}</span>
                            </li>
                        @endif
                    </ul>

                    <a href="{{ route('admin.users.edit', auth()->user()) }}" class="btn btn-info btn-round">Editar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-nav-tabs">
                <h4 class="card-header card-header-info">Publicaciones</h4>
                <div class="card-body">
                    @forelse ($user->posts as $post)
                        <a href="{{ route('posts.show', $post) }}" target="_blank">
                            <h4 class="card-title">{{ $post->title }}</h4>
                        </a>
                        <small class="text-muted">Publicado el {{ $post->published_at->format('d/m/Y') }}</small>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        @unless ($loop->last)
                            <hr>
                        @endunless
                    @empty
                        <small class="text-muted text-info">No tiene ninguna publicación</small>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-nav-tabs">
                <h4 class="card-header card-header-info">Roles</h4>
                <div class="card-body">
                    @forelse ($user->roles as $role)
                        <h4 class="card-title">{{ $role->name }}</h4>
                        @if ($role->permissions->count())
                            <small class="text-muted">Permisos: {{ $role->permissions->pluck('name')->implode(', ') }}</small>
                        @endif
                        @unless ($loop->last)
                            <hr>
                        @endunless
                        @empty
                        <small class="text-muted text-info">No posee ningún rol asignado</small>
                    @endforelse
                </div>
            </div>
            <br>
            <div class="card card-nav-tabs">
                <h4 class="card-header card-header-info">Permisos Adicionales</h4>
                <div class="card-body">
                    @forelse ($user->permissions as $permission)
                        <h4 class="card-title">{{ $permission->name }}</h4>
                        @unless ($loop->last)
                            <hr>
                        @endunless
                    @empty
                        <small class="text-muted text-info">No posee permisos adicionales</small>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>
@endsection