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
        <li class="breadcrumb-item active" aria-current="page"> Permisos</li>
    </ol>
</nav>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Listado de Permisos
                        </h4>
                        <p class="card-category">Aquí se muestran los permisos.</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="roles-table" class="table">
                                <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Identificador</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->display_name }}</td>
                                        <td>
                                            @can('update', $permission)
                                                <a href="{{ route('admin.permissions.edit', $permission) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
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
