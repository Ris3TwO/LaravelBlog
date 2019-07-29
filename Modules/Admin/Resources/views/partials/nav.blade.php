<ul class="nav">
    <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin') }}">
                <i class="material-icons">dashboard</i>
                <p>Panel</p>
            </a>
    </li>
    <li class="nav-item dropdown {{ request()->is('admin/posts*') ? 'active' : '' }} ">
        <a class="nav-link " href="#" role="button" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">menu</i>
                <p>Blog</p>
            </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item personal" href="{{  route('admin.posts.index') }}">
                    <i class="fa fa-eye"></i>
                    <p>Todos los posts</p>
                </a>
            <a class="dropdown-item personal" href="#" data-toggle="modal" data-target="#exampleModal">
                    <i class="material-icons">create</i>
                    <p>Crear un post</p>
                </a>
        </div>
    </li>
</ul>