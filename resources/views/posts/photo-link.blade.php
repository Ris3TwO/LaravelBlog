<div class="entry-thumb">
    <a href="{{ route('posts.show', $post) }}" class="thumb-link">
        <img src="{{ $post->photos->first()->url }}" alt="{{ $post->title }}" class="thumb-img">             
    </a>
</div>