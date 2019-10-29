@extends('admin::layouts.master')
@section('header')
<div class="navbar-wrapper">
    <p class="navbar-brand">PERMISOS</p>
</div>
@stop

@section('content')
<nav aria-label="breadcrumb justify-content-end" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i class="material-icons">dashboard</i> Inicio</a>
        </li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.permissions.index') }}"><i
                    class="material-icons">person</i> Permisos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar permiso {{ $permission->name }}</li>
    </ol>
</nav>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-info">Permiso {{ $permission->name }}</h4>
                    <div class="card-body">
                        <form action="{{ route('admin.permissions.update', $permission) }}" method="post">
                            {{ method_field('PUT') }} {{ csrf_field() }}
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label for="name" class="bmd-label-floating">Identificador</label>
                                    <input disabled class="form-control"
                                        value="{{ $permission->name }}">
                                </div>
                                <div class="form-group bmd-form-group">
                                    <label for="display_name" class="bmd-label-floating">Nombre</label>
                                    <input type="text" class="form-control" name="display_name"
                                        value="{{ old('display_name', $permission->display_name) }}">
                                </div>
                            </div>
                            {{-- @include('admin::roles.form') --}}
                            <button class="btn btn-info btn-block">Actualizar permiso</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ Module::asset('admin:plugins/Select2/css/select2.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ Module::asset('admin:plugins/Select2/js/select2.min.js') }}"></script>
<script>
    $('.selectpicker').select2({
        minimumResultsForSearch: Infinity
    });
</script>
@endpush
