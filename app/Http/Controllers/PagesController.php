<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // public function spa(){
    //     return view('pages.spa');
    // }

    public function home()
    {
        // $sliders = Post::take(3)->published()->byYearAndMonth()->orderByViews()->get();
        $posts = Post::published()->paginate();
        $sliders = $posts->take(3);

        return view('pages.home', compact('posts', 'sliders'));
    }

    public function blog()
    {
        $query = Post::published();

        if(request('month'))
        {
            $query->whereMonth('published_at', request('month'));
        }

        if(request('year'))
        {
            $query->whereYear('published_at', request('year'));
        }

        $posts = $query->paginate();

        return view('pages.blog', compact('posts'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function archive()
    {
        $archive = Post::published()->byYearAndMonth()->get();

        return view('pages.archive', [
            'authors' => User::take(4)->get(),
            'categories' => Category::take(7)->get(),
            'posts' => Post::latest('published_at')->take(5)->get(),
            'archive' => $archive
        ]);
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
