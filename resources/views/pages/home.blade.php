@extends('layouts.app')

@section('content')
<section id="bricks">
   	<div class="row masonry">
        @if (isset($title))
            <h3>{{ $title }}</h3>
        @endif
   		<!-- brick-wrapper -->
        <div class="bricks-wrapper">
         	<div class="grid-sizer"></div>
            @foreach($posts as $post)
         	    <article class="brick entry {{ $post->photos->count() == 0 ? 'format-video' : ($post->photos->count() < 1 ? 'format-standard' : 'format-gallery group') }} animate-this">
                    @if ($post->photos->count() === 1)
                        <div class="entry-thumb">
                            <a href="/blog/{{ $post->url }}" class="thumb-link">
                                <img src="{{ $post->photos->first()->url }}" alt="{{ $post->title }}" class="thumb-img">             
                            </a>
                        </div>
                    @elseif ($post->photos->count() > 1)
                        <div class="post-slider flexslider">
                            <ul class="slides">
                                @foreach ($post->photos as $photo)
                                <li>
                                    <a href="/blog/{{ $post->url }}" class="thumb-link">
                                        <img src="{{ url($photo->url) }}" alt="{{ $post->title }}" class="thumb-img"> 
                                    </a>
                                </li>    
                                @endforeach                 
                            </ul>							
                        </div> 
                    @elseif ($post->iframe)
                        <div class="entry-thumb video-image">
                            <a href="{!! $post->iframe !!}" data-lity>
                                <img src="images/thumbs/ottawa-bokeh.jpg" alt="bokeh">                   
                            </a> 
                        </div>
                    @endif
                    <div class="entry-text">
               	        <div class="entry-header">
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
                   		    <h1 class="entry-title"><a href="/blog/{{ $post->url }}">{{ $post->title }}</a></h1>
                        </div>
                       
		    			<div class="entry-excerpt">
			    			{{ $post->excerpt }}
                        </div>
                    
                        <div class="entry-header">
                            <div class="entry-meta">
                                <span class="cat-links">
			    					@foreach($post->tags as $tag)
                                        <a href="{{ route('tags.show', $tag) }}">#{{ $tag->name }}</a>  
						    		@endforeach          				
                                </span>			
                            </div>
                        </div>
                    </div>
                </article> <!-- end article -->
            @endforeach
        </div> <!-- end brick-wrapper --> 
   	</div> <!-- end row -->

   	<div class="row">
           {{ $posts->links() }}
    </div>
</section> <!-- end bricks -->       
@endsection

