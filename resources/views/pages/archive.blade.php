@extends('layouts.app')

@section('content')
<div id="content-wrap" class="styles">

    <div class="row">

        <div class="col-four tab-full">
            <h3>Autores</h3>
            <ul class="disc">
                @foreach ($authors as $author)
                <li>
                    {{ $author->name }} {{ $author->lastname }}
                </li>
                @endforeach
            </ul>
            <hr>
            <h3>Categorías</h3>
            <ul class="disc">
                @foreach ($categories as $category)
                <li>
                    <a href="{{ route('categories.show', $category) }}">
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach

            </ul>
        </div>

        <div class="col-eight tab-full">
            <h3>Últimos Posts</h3>
            @foreach ($posts as $post)
                <div class="row">
                    <p>
                        @if ($post->photos->count() == 1)
                            <a href="{{ route('posts.show', $post) }}">
                                <img width="160" height="160" class="pull-left" alt="{{ $post->title }}" src="{{ url($post->photos->first()->url) }}">
                            </a>
                        @else
                            <a href="{{ route('posts.show', $post) }}">
                                <img width="160" height="160" class="pull-left" alt="{{ $post->title }}" src="/images/news-sample.jpg">
                            </a>
                        @endif
                        <h2>
                            <a href="{{ route('posts.show', $post) }}">
                                {{ $post->title }}
                            </a>
                        </h2>
                        {{ $post->excerpt }}
                    </p>
                </div>
            @endforeach

            {{-- <p>
                <a href="#">
                    <img width="120" height="120" class="pull-left" alt="sample-image" src="images/sample-image.jpg">
                </a>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.Cras id
                urna.
                Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus
                leo.
                Donec mattis, purus nec placerat bibendum, dui pede condimentum odio.
            </p>
            <p>
                <a href="#">
                    <img width="120" height="120" class="pull-left" alt="sample-image" src="images/sample-image.jpg">
                </a>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.Cras id
                urna.
                Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus
                leo.
                Donec mattis, purus nec placerat bibendum, dui pede condimentum odio.
            </p>
            <p>
                <a href="#">
                    <img width="120" height="120" class="pull-left" alt="sample-image" src="images/sample-image.jpg">
                </a>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.Cras id
                urna.
                Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus
                leo.
                Donec mattis, purus nec placerat bibendum, dui pede condimentum odio.
            </p> --}}


        </div>

    </div> <!-- end row -->

</div> <!-- end styles -->
@endsection
