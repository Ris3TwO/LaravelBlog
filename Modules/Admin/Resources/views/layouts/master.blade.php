<!doctype html>
<html lang="en">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- Material Dashboard CSS -->
    <link href="{{ Module::asset('admin:css/material-dashboard-personal.css') }}" rel="stylesheet">
    <link href="{{ Module::asset('admin:css/material-dashboard.css') }}" rel="stylesheet">
    @stack('styles')

</head>

<body class="white-edition">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="black"
            data-image="{{ Module::asset('admin:img/sidebar-1.jpg') }}">
            <div class="logo">
                <a href="{{ url('/') }}" class="simple-text logo-normal">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <div class="sidebar-wrapper">
                @include('admin::partials.nav')
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
                <div class="container-fluid">
                    @yield('header')
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">

                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                    <div class="ripple-container"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <div class="dropdown-item">{{ auth()->user()->name }} {{ auth()->user()->lastname }} - {{ auth()->user()->getRoleDisplayNames() }}</div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('admin.users.show', auth()->user()) }}">Perfil</a>
                                    <a class="dropdown-item" href="#">Configuraciones</a>
                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('logout') }}" method="POST">
                                        {{ csrf_field() }}
                                        <button class="dropdown-item">Salir</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                @yield('content')
                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="float-left">
                            <ul>
                                <li>
                                    <a href="#">
                                        Artax Apps
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Nosotros
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Blog
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Licencia
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="copyright float-right" id="date">
                            , creado con <i class="material-icons">favorite</i> por
                            <a href="https://twitter.com/xfreeshot" target="_blank">Ris3TwO</a> para Yaremí Mendoza.
                        </div>
                    </div>
                </footer>
                <script>
                    const x = new Date().getFullYear();
                    let date = document.getElementById('date');
                    date.innerHTML = '&copy; ' + x + date.innerHTML;
                </script>
            </div>
        </div>

        <!--   Core JS Files   -->
        <script src="{{ Module::asset('admin:js/core/jquery.min.js') }}"></script>
        <script src="{{ Module::asset('admin:js/core/popper.min.js') }}"></script>
        <script src="{{ Module::asset('admin:js/core/bootstrap-material-design.min.js') }}"></script>
        <script src="{{ Module::asset('admin:js/plugins/moment.min.js') }}"></script>
        <script src="{{ Module::asset('admin:plugins/DatePicker/js/bootstrap-datetimepicker.js') }}"></script>
        <script src="{{ Module::asset('admin:js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
        <!-- Place this tag in your head or just before your close body tag. -->
        @unless(request()->is('admin/posts/*'))
        @include('admin::posts.create')
        @endunless
        @stack('scripts')
        <script src="{{ Module::asset('admin:js/plugins/jquery.sharrre.js') }}"></script>
        <!-- Chartist JS -->
        <script src="{{ Module::asset('admin:js/plugins/chartist.min.js') }}"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ Module::asset('admin:js/material-dashboard.js?v=2.1.0') }}"></script>
        <!--  Notifications Plugin    -->
        <script src="{{ Module::asset('admin:js/plugins/bootstrap-notify.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
            @if (session()->has('flash'))   
                $.notify({
                    icon: "check",
                    message: "{{ session('flash') }}"
                },{
                    type: 'success',
                    timer: 3000,
                    placement: {
                        from: "top",
	    	            align: "right"
                    }
                });
            @endif
            @if ($errors->any())   
                @foreach ($errors->all() as $error)
                    $.notify({
                        icon: "error",
                        message: "{{ $error }}"
                    },{
                        type: 'danger',
                        timer: 3000,
                        placement: {
                            from: "top",
	        	            align: "right"
                        }
                    });
                @endforeach
            @endif
        });
    
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
        });
        </script>
</body>

</html>