<ul class="slides">
    @foreach($post->photos as $photo)
        <li><img src="{{ url($photo->url) }}" alt="{{ $post->title }}"></li>
    @endforeach
</ul>