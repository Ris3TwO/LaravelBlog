<?php

namespace Modules\Admin\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
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
        $posts = Post::all();

        return view('admin::posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    // public function create()
    // {
    //     $categories = Category::all();
    //     $tags = Tag::all();

    //     return view('admin::posts.create', compact('categories', 'tags'));
    // }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3',
        ]);

        // $post = new Post;
        // $post->title = $request->get('title');
        // $post->url = str_slug($request->get('title'));
        // $post->save();
        $post = Post::create($request->only('title'));

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
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin::posts.edit', compact('categories', 'tags', 'post'));
        // return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Post $post, StorePostRequest $request)
    {
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
        $post->delete();

        return redirect()->route('admin.posts.index')
        ->with('flash', '¡Tu publicación ha sido eliminada exitosamente!');
    }
}
