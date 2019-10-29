<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->authorize('view', new Permission);

        return view('admin::permissions.index', [
            'permissions' => Permission::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Permission $permission)
    {
        $this->authorize('update', $permission);

        return view('admin::permissions.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->authorize('update', $permission);

        $data = $request->validate(['display_name' => 'required']);

        $permission->update($data);

        return redirect()->route('admin.permissions.edit', $permission)->withFlash('¡El permiso ha sido actualizado exitosamente!');

    }
}
