<nav id="main-nav-wrap">
    <ul class="main-navigation sf-menu">
        <li class="{{ setActiveRoute('pages.home') }}">
            <a href="{{ route('pages.home') }}">
                Inicio
            </a>
        </li>
        <li class="has-children {{ setActiveRoute('categories.show') }}">
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
        <li class="{{ setActiveRoute('posts.show') }}">
            <a href="#">
                Blog
            </a>
        </li>	
        <li class="{{ setActiveRoute('pages.about') }}">
            <a href="{{ route('pages.about') }}">
                Sobre Mí
            </a>
        </li>
        <li class="{{ setActiveRoute('pages.archive') }}">
            <a href="{{ route('pages.archive') }}">
                Archivo
            </a>
        </li>	
        <li class="{{ setActiveRoute('pages.contact') }}">
            <a href="{{ route('pages.contact') }}">
                Contáctame
            </a>
        </li>										
    </ul>
</nav> <!-- end main-nav-wrap -->