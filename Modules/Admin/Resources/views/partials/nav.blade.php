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
            <i class="material-icons">list</i>
            <p>Blog</p>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item personal {{ setActiveRoute('admin.posts.index') }}"
                href="{{  route('admin.posts.index') }}">
                <i class="fa fa-eye"></i>
                <p>Todos los posts</p>
            </a>

            @can('create', new App\Post)
                @if (request()->is('admin/posts/*'))
                    <a class="dropdown-item personal {{ setActiveRoute('admin.posts.index') }}"
                        href="{{ route('admin.posts.index', '#create') }}">
                        <i class="material-icons">create</i>
                        <p>Crear un post</p>
                    </a>
                @else
                    <a class="dropdown-item personal" href="#" data-toggle="modal" data-target="#createModal">
                        <i class="material-icons">create</i>
                        <p>Crear un post</p>
                    </a>
                @endif
            @endcan
        </div>
    </li>


    @can('view', new App\User)
    <li class="nav-item dropdown {{ setActiveRoute(['admin.users.index', 'admin.users.create']) }} ">
        <a class="nav-link " href="#" role="button" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
            <p>Usuarios</p>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item personal {{ setActiveRoute('admin.users.index') }}"
                href="{{  route('admin.users.index') }}">
                <i class="fa fa-eye"></i>
                <p>Todos los usuarios</p>
            </a>
            <a class="dropdown-item personal {{ setActiveRoute('admin.users.create') }}"
                href="{{ route('admin.users.create') }}">
                <i class="material-icons">create</i>
                <p>Crear un usuario</p>
            </a>
        </div>
    </li>
    @endcan

    @can('view', new \Spatie\Permission\Models\Role)
    <li class="nav-item {{ setActiveRoute(['admin.roles.index', 'admin.roles.edit'])  }}">
        <a class="nav-link" href="{{ route('admin.roles.index') }}">
            <i class="material-icons">supervisor_account</i>
            <p>Roles</p>
        </a>
    </li>
    @endcan

    @can('view', new \Spatie\Permission\Models\Permission)
    <li class="nav-item {{ setActiveRoute(['admin.permissions.index', 'admin.permissions.edit'])  }}">
        <a class="nav-link" href="{{ route('admin.permissions.index') }}">
            <i class="material-icons">supervisor_account</i>
            <p>Permisos</p>
        </a>
    </li>
    @endcan

</ul>
