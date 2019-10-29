<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\UpdateUserPasswordRequest;

class UsersPasswordController extends Controller
{
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateUserPasswordRequest $request, User $user)
    {
        $user->update( $request->validated() );

        return back()->withFlash('¡Contraseña actualizada exitosamente!');
    }
   
}
