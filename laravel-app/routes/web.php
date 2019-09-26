<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('email', function() {
//     return new App\Mail\LoginCredentials(App\User::first(), '41312312312');
// });

Route::group(['domain' => 'sign.' . Config::get('app.url')], function () {
    Auth::routes(['register' => false]);
});

Route::group(['domain' => Config::get('app.url')], function () {

    Route::get('/', 'PagesController@home')->name('pages.home');
    Route::get('sobre-mi', 'PagesController@about')->name('pages.about');
    Route::get('archivo', 'PagesController@archive')->name('pages.archive');
    Route::get('contactame', 'PagesController@contact')->name('pages.contact');
    Route::get('/blog', 'PagesController@home')->name('blog.home');

    Route::get('blog/{post}', 'PostsController@show')->name('posts.show');
    Route::post('blog/{post}/comment', 'CommentsController@store')->name('comments.store');
    Route::get('categorias/{category}', 'CategoriesController@show')->name('categories.show');
    Route::get('tags/{tag}', 'TagsController@show')->name('tags.show');

    Route::get('/home', 'PagesController@home')->name('home');

    Route::get('posts', function () {
        return App\Post::all();
    });
});

// Auth::routes(['register' => false]);
