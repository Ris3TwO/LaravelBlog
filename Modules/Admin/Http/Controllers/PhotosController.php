<?php

namespace Modules\Admin\Http\Controllers;

use App\Post;
use Modules\Admin\Entities\Photo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Post $post)
    {
        $validatedData = request()->validate([
            'photo' => 'required|image|max:2048',
        ]);

        $post->photos()->create([
            'url' => request()->file('photo')->store('posts', 'public')
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();  

        return back()->with('flash', '¡La foto ha sido eliminada de manera exitosa!');
    }
}
