<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if($post->isPublished() || auth()->check())
        {
            views($post)->record();

            return view('posts.show', compact('post'));
        }
        abort(404);
    }
}
