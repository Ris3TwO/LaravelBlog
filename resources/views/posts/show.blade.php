@extends('layouts.app')

@section('meta-title', $post->title . " | Blog")
@section('meta-description', $post->excerpt)

@section('content')
<section id="content-wrap" class="blog-single">
    <div class="row">
        <div class="col-twelve"> 
            <article class="{{ $post->photos->count() == 0 ? 'format-video' : ($post->photos->count() < 1 ? 'format-standard' : 'format-gallery') }}">  
                <div class="content-media">
                    <div class="{{ $post->photos->count() == 0 ? 'fluid-video-wrapper' : ($post->photos->count() < 1 ? 'post-thumb' : 'post-slider flexslider') }}">
                        @include($post->viewType())    
                    </div>    
                </div>

                <div class="primary-content">
                    <h1 class="page-title">{{ $post->title }}</h1>	
 
                    <ul class="entry-meta">
                        @include('posts.header')
                    </ul>						
 
                    <p class="lead">{!! $post->body !!}</p>
                    
                    @if ($post->tags)
                        <p class="tags">
                            <span>Etiquetado en:</span>
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('tags.show', $tag) }}">#{{ $tag->name }}</a>
                            @endforeach
                        </p> 
                    @endif
                    
                    @include('partials.social-links', ['description' => $post->title, 'excerpt' => $post->excerpt])

                    <div class="author-profile">
                        <img src="images/avatars/user-05.jpg" alt="">
 
                        <div class="about">
                            <h4>
                                <a href="#">
                                    {{ $post->owner->name }}
                                </a>
                            </h4>
                              
                            <p>
                                {{ $post->owner->biography }}
                            </p>
 
                            <ul class="author-social">
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">GooglePlus</a></li>
                                <li><a href="#">Instagram</i></a></li>					        	
                            </ul>
                        </div>
                    </div> <!-- end author-profile -->						
 
                </div> <!-- end entry-primary -->		  			   
                {{--  {{ $post->links() }}
                <div class="pagenav group">
                    <div class="prev-nav">
                        <a href="#" rel="prev">
                            <span>Previous</span>
                            Tips on Minimalist Design 
                        </a>
                    </div>
                    <div class="next-nav">
                        <a href="#" rel="next">
                            <span>Next</span>
                            Less Is More 
                        </a>
                    </div>  				   
                </div>  --}}
 
            </article>
            
 
        </div> <!-- end col-twelve -->
    </div> <!-- end row -->
 
    <div class="comments-wrap">
        <section id="page-header">
            <div class="row current-cat">
                <div class="col-full">
                    <h1>Comentarios</h1>
                </div>   		
            </div>
        </section>
        <div id="comments" class="row">
            <div class="col-full">                
                <div id="disqus_thread"></div>
                @include('partials.disqus-script')
            </div> <!-- end col-full -->
        </div> <!-- end row comments -->
    </div> <!-- end comments-wrap --> 
</section> <!-- end content -->
@stop

@push('styles')
    <link href="{{ asset('css/social-media.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script id="dsq-count-scr" src="//artax-blog-1.disqus.com/count.js" async></script>
@endpush