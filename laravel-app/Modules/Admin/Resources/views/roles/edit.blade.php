@extends('admin::layouts.master')
@section('header')
<div class="navbar-wrapper">
    <p class="navbar-brand">ROLES</p>
</div>
@stop

@section('content')
<nav aria-label="breadcrumb justify-content-end" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i class="material-icons">dashboard</i> Inicio</a>
        </li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.roles.index') }}"><i
                    class="material-icons">person</i> Roles</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar rol {{ $role->name }}</li>
    </ol>
</nav>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-info">Rol {{ $role->name }}</h4>
                    <div class="card-body">
                        <form action="{{ route('admin.roles.update', $role) }}" method="post">
                            {{ method_field('PUT') }}

                            @include('admin::roles.form')
                            <button class="btn btn-info btn-block">Guardar rol</button>
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