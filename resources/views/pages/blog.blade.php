@extends('layouts.app')

@section('content')
@if (isset($title))
<section id="page-header">
    <div class="row current-cat">
        <div class="col-full">
            <h1>{{ $title }}</h1>
        </div>
    </div>
</section>
@endif
<section id="bricks" class="{{ isset($title) ? 'with-top-sep' : '' }}">
    <div class="row masonry">
        <!-- brick-wrapper -->
        <div class="bricks-wrapper">
            <div class="grid-sizer"></div>
            @forelse($posts as $post)
                <article
                    class="brick entry {{ $post->photos->count() == 0 ? 'format-video' : ($post->photos->count() < 1 ? 'format-standard' : 'format-gallery group') }} animate-this">

                    @include($post->viewType('home'))
                    <div class="entry-text">
                        <div class="entry-header">
                            @include('posts.header-home')
                            <h1 class="entry-title"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h1>
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
            @empty
                <article class="col-twelve tab-full box">
                    <div class="brick entry format-quote">

                        <div class="entry-thumb">
                            <blockquote>
                                <p>No hay publicaciones disponibles</p>
                            </blockquote>
                        </div>

                    </div> <!-- end article -->
                </article>
            @endforelse

        </div> <!-- end brick-wrapper -->
    </div> <!-- end row -->

    <div class="row">
        {{ $posts->appends(request()->all())->links() }}
    </div>
</section> <!-- end bricks -->
@endsection
