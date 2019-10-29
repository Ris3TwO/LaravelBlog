<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Events\UserWasCreated;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Modules\Admin\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $users = User::allowed()->get();
        return view('admin::users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $user = new User();

        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');

        return view('admin::users.create', compact('user', 'roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', new User);

        // Validación del formulación
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'biography' => ['string', 'max:255']
        ]);

        // Generado de contraseña
        $data['password'] = str_random(12);

        // Guardado del usuario
        $user = User::create($data);

        // Asignación de roles
        if ($request->filled('roles'))
        {
            $user->assignRole($request->roles);
        }

        // Asignación de permisos
        if ($request->filled('permissions'))
        {
            $user->givePermissionTo($request->permissions);
        }

        // Envío de Email con los datos
        UserWasCreated::dispatch($user, $data['password']);

        // Return a la vista usuarios
        return redirect()->route('admin.users.index')->withFlash('¡El usuario ha sido creado exitosamente!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('admin::users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');

        return view('admin::users.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update( $request->validated() );

        return redirect()->route('admin.users.edit', $user)
        ->withFlash('¡Usuario actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('admin.users.index')
        ->withFlash('¡Usuario eliminado exitosamente!');
    }
}
