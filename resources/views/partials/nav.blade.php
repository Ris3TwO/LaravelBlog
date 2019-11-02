<nav id="main-nav-wrap">
    <ul class="main-navigation sf-menu">
        <li class="{{ setActiveRouteHome('pages.home') }}">
            <a href="{{ route('pages.home') }}">
                Inicio
            </a>
        </li>
        <li class="{{ setActiveRouteHome('posts.show') }}{{ setActiveRouteHome('blog.home') }}">
            <a href="{{ route('blog.home') }}">
                Blog
            </a>
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
            <a href="{{ route('pages.archive') }}">
                Archivo
            </a>
        </li>
        <li class="{{ setActiveRouteHome('pages.about') }}">
            <a href="{{ route('pages.about') }}">
                Nosotros
            </a>
        </li>
        <li class="{{ setActiveRouteHome('pages.contact') }}">
            <a href="{{ route('pages.contact') }}">
                Contacto
            </a>
        </li>
    </ul>
</nav> <!-- end main-nav-wrap -->
