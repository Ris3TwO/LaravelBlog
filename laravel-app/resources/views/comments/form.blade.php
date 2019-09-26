<!-- respond -->
<div class="respond" id="comments">

    <h3>Deja un comentario</h3>

    @foreach ($errors->all() as $error)
        <div class="alert-box ss-error hideit">
            <p>{{ $error }}</p>
            <i class="fa fa-times close"></i>
        </div>
    @endforeach

    <form action="{{route('comments.store', $post)}}" method="POST">
        {{ csrf_field() }}
        <fieldset>
            @if (isset($comment->id))
                <input type="hidden" name="parent_id" value="{{ old('parent_id', $comment->id) }}">
            @endif

            <div class="form-field">
                <input name="name" type="text" id="name" class="full-width" placeholder="Nombre"
                    value="{{ old('name') }}">
            </div>

            <div class="message form-field">
                <textarea name="content" id="content" class="full-width"
                    placeholder="Mensaje">{{ old('content') }}</textarea>
            </div>

            <button type="submit" class="submit button-primary">Comentar</button>

        </fieldset>
    </form> <!-- Form End -->

</div> <!-- Respond End -->
