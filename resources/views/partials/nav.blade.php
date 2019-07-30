<nav id="main-nav-wrap">
    <ul class="main-navigation sf-menu">
        <li class="{{ setActiveRoute('pages.home') }}">
            <a href="{{ route('pages.home') }}">
                Inicio
            </a>
        </li>	
        <li class="{{ setActiveRoute('pages.archive') }}">
            <a href="{{ route('pages.archive') }}">
                Archivo
            </a>
        </li>	
        <li class="{{ setActiveRoute('pages.about') }}">
            <a href="{{ route('pages.about') }}">
                Sobre Mí
            </a>
        </li>
        <li class="{{ setActiveRoute('pages.contact') }}">
            <a href="{{ route('pages.contact') }}">
                Contáctame
            </a>
        </li>										
    </ul>
</nav> <!-- end main-nav-wrap -->