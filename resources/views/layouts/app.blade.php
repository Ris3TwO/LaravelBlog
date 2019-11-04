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
    {{--  <div id="app">  --}}


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

            @include('partials.nav')

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
    @yield('content')
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
    {{--  </div>  --}}

    <!-- Java Script
        ================================================== -->
    <script src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
