<ul class="nav">
    <li class="nav-item {{ setActiveRoute('admin')  }}">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="material-icons">dashboard</i>
            <p>Panel</p>
        </a>
    </li>
    <li class="nav-item dropdown {{ setActiveRoute(['admin.posts.index', 'admin.posts.edit']) }} ">
        <a class="nav-link " href="#" role="button" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">menu</i>
            <p>Blog</p>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item personal {{ setActiveRoute('admin.posts.index') }}" href="{{  route('admin.posts.index') }}">
                <i class="fa fa-eye"></i>
                <p>Todos los posts</p>
            </a>
            @if (request()->is('admin/posts/*'))
            <a class="dropdown-item personal {{ setActiveRoute('admin.posts.index') }}" href="{{ route('admin.posts.index', '#create') }}">
                <i class="material-icons">create</i>
                <p>Crear un post</p>
            </a>
            @else
            <a class="dropdown-item personal" href="#" data-toggle="modal" data-target="#createModal">
                <i class="material-icons">create</i>
                <p>Crear un post</p>
            </a>
            @endif
        </div>
    </li>
    <li class="nav-item dropdown {{ setActiveRoute(['admin.users.index', 'admin.users.create']) }} ">
        <a class="nav-link " href="#" role="button" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
            <p>Usuarios</p>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item personal {{ setActiveRoute('admin.users.index') }}" href="{{  route('admin.users.index') }}">
                <i class="fa fa-eye"></i>
                <p>Todos los usuarios</p>
            </a>
            <a class="dropdown-item personal {{ setActiveRoute('admin.users.create') }}" href="{{ route('admin.users.create') }}">
                <i class="material-icons">create</i>
                <p>Crear un usuario</p>
            </a>
        </div>
    </li>
</ul>