{{ csrf_field() }}
<div class="row">
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label for="name" class="bmd-label-floating">Identificador</label>
            @if ($role->exists)
                <input type="text" class="form-control" value="{{ $role->name }}" disabled>
            @else
                <input name="name" type="text" class="form-control" value="{{ old('name', $role->name) }}">
            @endif
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label for="display_name" class="bmd-label-floating">Nombre</label>
            <input type="text" class="form-control" name="display_name"
                value="{{ old('display_name', $role->display_name) }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Permisos</label>
            <div class="form-group">
                @include('admin::permissions.checkboxes', ['model' => $role])
            </div>
        </div>
    </div>
</div>