<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('admin.posts.store', '#create') }}">
        {{ csrf_field() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Agrega el título de tu nueva publicación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="form-group {{ $errors->has('title') ? 'label-floating has-danger' : '' }}">
                        <input id="post-title" name="title"
                        type="text" class="form-control" id="title" value="{{ old('title') }}" 
                        placeholder="Ingresa aquí el título de la publicación" autofocus required>
                        {!! $errors->first('title', '<span class="material-icons form-control-feedback">clear</span>') !!}
                        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary">Crear publicación</button>
                    <button type="button" class="btn btn-sm" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
    if ( window.location.hash === '#create')
    {
        $(document).ready(function() {
            $('#createModal').modal('show');
        });
    }

    $(document).ready(function() {
        $('#createModal').on('hide.bs.modal', function(){
            window.location.hash = '#';
        });
    });

    $(document).ready(function() {
        $('#createModal').on('shown.bs.modal', function(){
            $('#post-title').focus();
            window.location.hash = '#create';
        });
    });
</script>
@endpush