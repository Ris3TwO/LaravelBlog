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
        <li class="breadcrumb-item active" aria-current="page"> Roles</li>
    </ol>
</nav>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Listado de Roles
                            @can('create', $roles->first())
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-info pull-right">
                                <i class="fa fa-plus"></i>
                                Crear rol
                            </a>
                            @endcan
                        </h4>
                        <p class="card-category">Aquí se muestran los roles.</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="roles-table" class="table">
                                <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Identificador</th>
                                    <th>Nombre</th>
                                    <th>Permisos</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->display_name }}</td>
                                        <td>{{ $role->permissions->pluck('display_name')->implode(', ') }}</td>
                                        <td>
                                            @can('update', $role)
                                                <a href="{{ route('admin.roles.edit', $role) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            @endcan
                                            @can('delete', $role)
                                                @if ($role->id !== 1)
                                                    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST"
                                                        style="display: inline">
                                                        {{ csrf_field() }} {{ method_field('DELETE') }}
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="return confirm('¿Estás seguro de querer eliminar esta usuario?')">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






@stop @push('styles')
<link href="{{ Module::asset('admin:plugins/DataTables/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endpush
@push('scripts')
<! -- DataTables JS plugin -->
    <script src="{{ Module::asset('admin:plugins/DataTables/js/jquery.dataTables.js') }}"></script>
    <script src="{{ Module::asset('admin:plugins/DataTables/js/dataTables.bootstrap4.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#roles-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });

    </script>
    @endpush
