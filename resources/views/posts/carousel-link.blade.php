<div class="post-slider flexslider">
    <ul class="slides">
        @foreach ($post->photos as $photo)
        <li>
            <a href="{{ route('posts.show', $post) }}" class="thumb-link">
                <img src="{{ url($photo->url) }}" alt="{{ $post->title }}" class="thumb-img" style="height: 320px;"> 
            </a>
        </li>    
        @endforeach                 
    </ul>							
</div>