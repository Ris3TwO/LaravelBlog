<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class UsersRolesController extends Controller
{
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->detach();

        if($request->filled('roles'))
        {
            $user->assignRole($request->roles);
        }
        return back()->withFlash('¡Los roles fueron actualizados exitosamente!');
    }
}
