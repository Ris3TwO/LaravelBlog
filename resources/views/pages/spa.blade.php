<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>@yield('meta-title', setting('app_name') . " | Blog")</title>
    <meta name="description" content="@yield('meta-description', 'Este es el blog de Yaremí Mendoza')">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @stack('styles')

    <!-- script
    ================================================== -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="{{ asset('js/pace.min.js') }}"></script>
    @stack('scripts')

    <!-- favicons
	================================================== -->
    <link rel="shortcut icon" href="{{ \Storage::disk('public')->url(AppSettings::get('favicon')) }}"
        type="image/x-icon">
    <link rel="icon" href="{{ \Storage::disk('public')->url(AppSettings::get('favicon')) }}" type="image/x-icon">

</head>

<body id="top">
    <div id="app">


        <!-- header
    ================================================== -->
        <header class="short-header">
            <div class="gradient-block"></div>
            <div class="row header-content">
                <div class="logo">
                    <a href="{{ route('pages.home') }}">
                        <img src="{{ \Storage::disk('public')->url(AppSettings::get('logo')) }}"
                            alt="{{ setting('app_name') }}" width="60" height="60">
                    </a>
                </div>

                <nav id="main-nav-wrap">
                    <ul class="main-navigation sf-menu">
                        <li class="{{ setActiveRouteHome('pages.home') }}">
                            <router-link to="/">Inicio</router-link>
                        </li>
                        <li class="{{ setActiveRouteHome('posts.show') }}{{ setActiveRouteHome('blog.home') }}">
                            <router-link to="/blog">Blog</router-link>
                        </li>
                        <li class="has-children {{ setActiveRouteHome('categories.show') }}">
                            <a href="#">
                                Categorías
                            </a>
                            <ul class="sub-menu">
                                @foreach(App\Category::get() as $category)
                                <li>
                                    <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="{{ setActiveRouteHome('pages.archive') }}">
                            <router-link to="/archivo">Archivo</router-link>
                        </li>
                        <li class="{{ setActiveRouteHome('pages.about') }}">
                            <router-link to="/nosotros">Nosotros</router-link>
                        </li>
                        <li class="{{ setActiveRouteHome('pages.contact') }}">
                            <router-link to="/contacto">Contacto</router-link>
                        </li>
                    </ul>
                </nav> <!-- end main-nav-wrap -->

                <!-- search wrap -->
                <div class="search-wrap">
                    <form role="search" method="get" class="search-form" action="#">
                        <label>
                            <span class="hide-content">Search for:</span>
                            <input type="search" class="search-field" placeholder="Type Your Keywords" value="" name="s"
                                title="Search for:" autocomplete="off">
                        </label>
                        <input type="submit" class="search-submit" value="Buscar">
                    </form>
                    <a href="#" id="close-search" class="close-btn">Cerrar</a>
                </div>
                <!-- end search wrap -->

                <div class="triggers">
                    <a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
                    <a class="menu-toggle" href="#"><span>Menu</span></a>
                </div> <!-- end triggers -->
            </div>
        </header> <!-- end header -->
        <!-- masonry
        ================================================== -->
        {{--  @if (isset($title))  --}}
        <section id="page-header">
            <div class="row current-cat">
                <div class="col-full">
                    {{--  <h1>{{ $title }}</h1> --}}
                </div>
            </div>
        </section>
        {{--  @endif  --}}
        {{--  <section id="bricks" class="{{ isset($title) ? 'with-top-sep' : '' }}"> --}}
        <div class="row masonry">
            <!-- brick-wrapper -->
            <div class="bricks-wrapper">
                <div class="grid-sizer"></div>

                <router-view></router-view>

                {{--  <div class="brick entry featured-grid animate-this">
                <div class="entry-content">
                    <div id="featured-post-slider" class="flexslider">
                        <ul class="slides">

                            {{--  @foreach ($sliders as $slider)  --}}
                <li>
                    <div class="featured-post-slide">

                        {{--  @if($slider->photos->count() == 1)  --}}
                        <div class="post-background"
                            {{--  style="background-image:url('{{ $slider->photos->first()->url }}');"></div> --}}
                        {{--  @endif  --}}

                        <div class="overlay"></div>

                        <div class="post-content">
                            <ul class="entry-meta">
                                <li class="text-capitalize">
                                    {{--  {{ $slider->published_at->format('M d, Y') }} --}}
                                </li>
                                <li>
                                    {{--  <a href="{{ route('posts.show', $slider) }}"> --}}
                                    {{--  {{ $slider->owner->name }} {{ $slider->owner->lastname }} --}}
                                    </a>
                                </li>
                            </ul>

                            <h1 class="slide-title">
                                {{--  <a href="{{ route('posts.show', $slider) }}" title="{{ $slider->title }}"> --}}
                                {{--  {{ $slider->title }} --}}
                                </a>
                            </h1>
                        </div>

                    </div>
                </li> <!-- /slide -->
                {{--  @endforeach  --}}

                </ul> <!-- end slides -->
            </div> <!-- end featured-post-slider -->
        </div> <!-- end entry content -->
        {{--  </div>  --}} --}}

        {{--  @forelse($posts as $post)  --}}
        <article
            {{--  class="brick entry {{ $post->photos->count() == 0 ? 'format-video' : ($post->photos->count() < 1 ? 'format-standard' : 'format-gallery group') }}
            animate-this"> --}}

            {{--  @include($post->viewType('home'))  --}}
            <div class="entry-text">
                <div class="entry-header">
                    {{--  @include('posts.header-home')  --}}
                    <h1 class="entry-title">
                        {{--  <a href="{{ route('posts.show', $post) }}"> --}}
                        {{--  {{ $post->title }} --}}
                        {{--  </a>  --}}
                    </h1>
                </div>

                <div class="entry-excerpt">
                    {{--  {{ $post->excerpt }} --}}
                </div>

                <div class="entry-header">
                    <div class="entry-meta">
                        <span class="cat-links">
                            {{--  @foreach($post->tags as $tag)
                                    <a href="{{ route('tags.show', $tag) }}">#{{ $tag->name }}</a>
                            @endforeach --}}
                        </span>
                    </div>
                </div>
            </div>
        </article> <!-- end article -->
        {{--  @empty  --}}
        <article class="col-twelve tab-full box">
            <div class="brick entry format-quote">

                <div class="entry-thumb">
                    <blockquote>
                        <p>No hay publicaciones disponibles</p>
                    </blockquote>
                </div>

            </div> <!-- end article -->
        </article>
        {{--  @endforelse  --}}

    </div> <!-- end brick-wrapper -->
    </div> <!-- end row -->

    <div class="row">
        {{--  {{ $posts->links() }} --}}
    </div>
    </section> <!-- end bricks -->
    <!-- footer
    ================================================== -->
    <footer>

        <div class="footer-main">

            <div class="row">

                <div class="col-four tab-full mob-full footer-info">

                    <h4>Sobre Nuestro Sitio</h4>

                    <p class="text-justify">
                        {{ AppSettings::get('about_short') }}
                    </p>

                </div> <!-- end footer-info -->

                <div class="col-two tab-1-3 mob-1-2 site-links">

                    <h4>Enlaces del Sitio</h4>

                    <ul>
                        <li>
                            <a href="{{ route('admin') }}">
                                {{ Auth::guest() ? "Ingresar" : "Administración" }}
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Términos y Condiciones
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Política de Privacidad
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Política de Cookies
                            </a>
                        </li>
                    </ul>

                </div> <!-- end site-links -->

                <div class="col-two tab-1-3 mob-1-2 social-links">

                    <h4>Redes Sociales</h4>

                    <ul>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Dribbble</a></li>
                        <li><a href="#">Google+</a></li>
                        <li><a href="#">Instagram</a></li>
                    </ul>

                </div> <!-- end social links -->

                <div class="col-four tab-1-3 mob-full footer-subscribe">

                    <h4>Suscríbete</h4>

                    <p>Manténgase informado. Suscríbase a nuestro boletín de noticias.</p>

                    <div class="subscribe-form">

                        <form id="mc-form" class="group" novalidate="true">

                            <input type="email" value="" name="dEmail" class="email" id="mc-email"
                                placeholder="Type &amp; press enter" required="">

                            <input type="submit" name="subscribe">

                            <label for="mc-email" class="subscribe-message"></label>

                        </form>

                    </div>

                </div> <!-- end subscribe -->

            </div> <!-- end row -->

        </div> <!-- end footer-main -->

        <div class="footer-bottom">
            <div class="row">

                <div class="col-twelve">
                    <div class="copyright">
                        <span>
                            <script>
                                var f = new Date(); document.write(f.getFullYear());
                            </script> © Copyright {{ setting('app_name') }} - Todos los derechos reservados
                        </span>
                        <span>Diseño por <a href="http://www.styleshout.com/" target="_blank">Styleshout</a></span>
                        <span>Modificado y Programado por <a href="https://www.twitter.com/xfreeshot"
                                target="_blank">Ris3TwO</a>.</span>
                    </div>

                    <div id="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon icon-arrow-up"></i></a>
                    </div>
                </div>

            </div>
        </div> <!-- end footer-bottom -->

    </footer>

    <div id="preloader">
        <div id="loader"></div>
    </div>
    </div>

    <!-- Java Script
    ================================================== -->
    <script src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
