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
        <li class="breadcrumb-item active" aria-current="page"> Usuarios</li>
    </ol>
</nav>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Listado de usuarios
                            @can('create', $users->first())
                                <a href="{{ route('admin.users.create') }}" class="btn btn-info pull-right">
                                    <i class="fa fa-plus"></i>
                                    Crear usuario
                                </a>
                            @endcan
                        </h4>
                        <p class="card-category">Aquí se muestran los usuarios </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="users-table" class="table">
                                <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }} {{ $user->lastname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                                        <td>
                                            @can('view', $user)
                                                <a href="{{ route('admin.users.show', $user) }}"
                                                    class="btn btn-sm btn-default">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endcan

                                            @can('update', $user)
                                                <a href="{{ route('admin.users.edit', $user) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            @endcan

                                            @can('delete', $user)
                                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                                    style="display: inline">
                                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('¿Estás seguro de querer eliminar esta usuario?')">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
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
            $('#users-table').DataTable({
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
