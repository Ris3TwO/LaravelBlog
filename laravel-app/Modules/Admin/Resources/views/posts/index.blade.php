@extends('admin::layouts.master')
@section('header')
<div class="navbar-wrapper">
    <p class="navbar-brand">POST</p>
</div>
@stop

@section('content')
<nav aria-label="breadcrumb justify-content-end" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i class="material-icons">dashboard</i> Inicio</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page"> Posts</li>
    </ol>
</nav>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Listado de Publicaciones <button class="btn btn-info pull-right"
                                data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Crear
                                publicación</button></h4>
                        <p class="card-category">Aquí se muestran tus post </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="posts-table" class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Titulo
                                    </th>
                                    <th>
                                        Extracto
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->excerpt }}</td>
                                        <td>
                                            <a href="{{ route('posts.show', $post) }}" target="_blank"
                                                class="btn btn-sm btn-default"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('admin.posts.edit', $post) }}"
                                                class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></a>
                                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                                                style="display: inline">
                                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Estás seguro de querer eliminar esta publicación?')"><i
                                                        class="fa fa-times"></i></button>
                                            </form>
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
            $('#posts-table').DataTable({
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