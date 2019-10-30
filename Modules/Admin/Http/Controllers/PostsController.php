<?php

namespace Modules\Admin\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Admin\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $posts = Post::allowed()->get();

        return view('admin::posts.index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */

    public function store(Request $request)
    {

        $this->authorize('create', new Post);

        $validatedData = $request->validate([
            'title' => 'required|min:3',
        ]);

        $post = Post::create($request->all());

        return redirect()->route('admin.posts.edit', $post);
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
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('admin::posts.edit', [
            'post' => $post,
            'tags' => Tag::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Post $post, StorePostRequest $request)
    {
        //Función para autorizar la actualización
        $this->authorize('update', $post);
        //Función para actualizar
        $post->update($request->all());

        //Sincronización para categorías y tags
        $post->syncCategories($request->get('categories'));
        $post->syncTags($request->get('tags'));

        return redirect()->route('admin.posts.edit', compact('post'))
        ->with('flash', '¡Tu publicación ha sido guardada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Post $post)
    {
        //Función para autorizar la eliminación
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('admin.posts.index')
        ->with('flash', '¡Tu publicación ha sido eliminada exitosamente!');
    }
}
