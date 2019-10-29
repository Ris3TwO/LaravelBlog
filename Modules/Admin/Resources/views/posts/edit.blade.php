@extends('admin::layouts.master') 
@section('header')
<div class="navbar-wrapper">
    <p class="navbar-brand">POST</p>
</div>
@stop 

@section('content')
<nav aria-label="breadcrumb justify-content-end" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i class="material-icons">dashboard</i> Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}"><i class="material-icons">menu</i> Posts</a></li>
        <li class="breadcrumb-item active" aria-current="page">Crear</li>
    </ol>
</nav>
<div class="content">
    <div class="container-fluid">
        <form method="POST" action="{{ route('admin.posts.update', $post) }}">
            {{ csrf_field() }} {{ method_field('PUT') }}
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Crear una publicación</h4>
                            <p class="card-category">Complete los campos que contienen un * son requeridos</p>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label class="label-control" for="title">Título de la publicación*</label>
                                <input name="title" type="text" class="form-control" id="title" value="{{ old('title', $post->title) }}">
                            </div>

                            <div class="form-group">
                                <label class="label-control">Contenido de la publicación*</label>
                                <br>
                                <textarea name="body" id="editor" cols="30" rows="10" class="form-control" placeholder="Ingresa el contenido completo de la publicación">{{ old('body', $post->body) }}</textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="label-control">Vídeo</label>
                                <br>
                                <textarea name="iframe" id="editor" cols="30" rows="3" class="form-control" placeholder="Ingresa la URL del vídeo">{{ old('iframe', $post->iframe) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Datos adicionales</h4>
                            <p class="card-category">Complete los campos que contienen un * son requeridos</p>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="label-control">Fecha de publicación*</label>
                                <input name="published_at" type="text" class="form-control datetimepicker">
                            </div>
                            <div class="form-group">
                                <label class="label-control">Categorías*</label>
                                <select name="categories[]" class="form-control select2" multiple="multiple" data-size="5" data-style="btn-primary"
                                    title="Seleccione categorías">
                                @foreach ($categories as $category)
                                    <option {{ collect(old('categories', $post->categories->pluck('id')))->contains($category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label class="label-control">Etiquetas*</label>
                                <select name="tags[]" class="form-control select2" multiple="multiple" data-size="5" data-style="btn-primary" title="Seleccione etiquetas">
                                    @foreach ($tags as $tag)
                                        <option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="label-control">Extracto de la publicación*</label>
                                <textarea name="excerpt" class="form-control" rows="6">{{ old('excerpt', $post->excerpt) }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="dropzone"></div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @if ($post->photos->count())
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Imágenes de la publicación</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($post->photos as $photo)
                                <div class="col-md-2">
                                    <form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
                                        {{ method_field('DELETE') }} {{ csrf_field() }}
                                        <button class="btn btn-danger btn-sm pull-right" style="position: absolute; left: 70%;">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <img class="img-fluid" src="{{ url($photo->url) }}">
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" rel="stylesheet" >
<link href="{{ Module::asset('admin:plugins/DatePicker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
<link href="{{ Module::asset('admin:plugins/Select2/css/select2.min.css') }}" rel="stylesheet"> 
@endpush 

@push('scripts')
<!-- DatePicker JS plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script src="{{ Module::asset('admin:vendors/ckeditor/ckeditor.js') }}"></script>
<script src="{{ Module::asset('admin:plugins/Select2/js/select2.min.js') }}"></script>
<script src="{{ Module::asset('admin:plugins/DatePicker/js/bootstrap-datetimepicker.js') }}"></script>
<script type="text/javascript">
    var fecha = "{{ old('published_at', $post->published_at) }}";
    <!-- javascript for init -->
    $(document).ready(function () {
        if (fecha != ""){
            $('.datetimepicker').datetimepicker({
                defaultDate: new Date(fecha),
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });
        }else{
            $('.datetimepicker').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });
        }
            
        CKEDITOR.replace( 'editor' );
            
        $('.select2').select2({
            tags: true
        });    
    });
        
    var myDropzone = new Dropzone('.dropzone', {
        url: '/admin/posts/{{ $post->url }}/photos',
        acceptedFiles: 'image/*',
        paramName: 'photo',
        maxFilesize: 2,
        /*maxFiles: 1,*/
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        dictDefaultMessage: 'Arrastra las fotos para subirlas'
    });

    myDropzone.on('error', function(file, res){
        var msg = (res.errors.photo[0]);
        $('.dz-error-message:last > span').text(msg);
    });

    Dropzone.autoDiscover = false;

</script>

























































@endpush