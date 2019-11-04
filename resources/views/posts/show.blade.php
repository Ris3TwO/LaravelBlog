@extends('layouts.app')

@section('meta-title', $post->title . " | Blog")
@section('meta-description', $post->excerpt)

@section('content')
<section id="content-wrap" class="blog-single">
    <div class="row">
        <div class="col-twelve">
            <article
                class="{{ $post->photos->count() == 0 ? 'format-video' : ($post->photos->count() < 1 ? 'format-standard' : 'format-gallery') }}">
                <div class="content-media">
                    <div
                        class="{{ $post->photos->count() == 0 ? 'fluid-video-wrapper' : ($post->photos->count() < 1 ? 'post-thumb' : 'post-slider flexslider') }}">
                        @include($post->viewType())
                    </div>
                </div>

                <div class="primary-content">
                    <h1 class="page-title">{{ $post->title }}</h1>

                    <ul class="entry-meta">
                        @include('posts.header')
                    </ul>

                    <ul class="stats-tabs">
                        <li>
                            <a href="#">
                                {{ $post->views->count() }}
                                <em>Leído</em>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                {{ $post->comments->count() }}
                                <em>{{ $post->comments->count() == 1 ? 'Comentario' : 'Comentarios' }}</em>
                            </a>
                        </li>
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
                        <img src="{{ asset('storage/profile.png') }}" alt="">

                        <div class="about">
                            <h4>
                                {{ $post->owner->name }} {{ $post->owner->lastname }}
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
                </div> --}}

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
                @if ($post->comments)
                <h3>{{ $post->comments->count() }} {{ $post->comments->count() == 1 ? 'Comentario' : 'Comentarios' }}
                </h3>

                @include('comments.list', ['comments' => $post->comments])
                @endif

                @include('comments.form')
            </div> <!-- end col-full -->
        </div> <!-- end row comments -->
    </div> <!-- end comments-wrap -->
</section> <!-- end content -->
@stop

@push('styles')
<link href="{{ asset('css/social-media.css') }}" rel="stylesheet">
@endpush

{{-- @push('scripts')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endpush --}}
