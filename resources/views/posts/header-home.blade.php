<div class="entry-meta">
    <span class="cat-links">
        {{ $post->published_at->format('M d') }}      				
    </span>			
</div>
   <div class="entry-meta">
       <span class="cat-links">
        @foreach($post->categories as $category)
            <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>  
        @endforeach             				
       </span>			
</div>