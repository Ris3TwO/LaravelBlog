<?php

namespace Modules\Admin\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Photo;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
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

        $url = request()->file('photo')->store('posts', 'public');

        $post->photos()->create([
            'url' => Storage::url($url)
        ]);
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
