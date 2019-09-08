<li class="date">{{ optional($post->published_at)->format('d M, Y') }}</li>						
@if ($post->categories)
    <li class="cat">
        @foreach ($post->categories as $category)
            <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
        @endforeach
    </li>				
@endif