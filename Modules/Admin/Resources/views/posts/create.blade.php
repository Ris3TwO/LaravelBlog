<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('admin.posts.store') }}">
        {{ csrf_field() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agrega el título de tu nueva publicación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{-- <label class="label-control" for="title">Título de la publicación</label> --}}
                        <input name="title" type="text" class="form-control" id="title" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary">Crear publicación</button>
                </div>
            </div>
        </div>
    </form>
</div>