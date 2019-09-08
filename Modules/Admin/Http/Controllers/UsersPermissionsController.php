<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class UsersPermissionsController extends Controller
{
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        $user->permissions()->detach();
        if($request->filled('permissions'))
        {
            $user->givePermissionTo($request->permissions);
        }

        return back()->withFlash('¡Los permisos fueron actualizados exitosamente!');
    }
}
