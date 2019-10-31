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

Route::group(['domain' => 'cp.'. Config::get('app.url')], function () {

    Route::get('/', function () {
        return redirect(Config::get('app.url'));
    });

    Route::get('settings', function () {
        return redirect('admin/settings');
    });
});

Route::group([
    'domain' => 'cp.'. Config::get('app.url'),
    'prefix' => 'admin',
    'middleware' => 'auth'],

    function() {
        Route::get('/', 'AdminController@index')->name('admin');

        Route::resource('posts', 'PostsController', ['except' => 'show', 'as' => 'admin']);
        Route::resource('users', 'UsersController', ['as' => 'admin']);
        Route::resource('roles', 'RolesController', ['except' => 'show', 'as' => 'admin']);
        Route::resource('permissions', 'PermissionsController', ['only' => ['index', 'edit', 'update'], 'as' => 'admin']);

        Route::put('users/{user}/password', 'UsersPasswordController@update')->name('admin.users.password.update');

        Route::middleware('role:Admin')
        ->put('users/{user}/roles', 'UsersRolesController@update')
        ->name('admin.users.roles.update');

        Route::middleware('role:Admin')
        ->put('users/{user}/permissions', 'UsersPermissionsController@update')
        ->name('admin.users.permissions.update');

        Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');
        Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');

        Route::get('settings', '\QCod\AppSettings\Controllers\AppSettingController@index')->name('settings.index');
        Route::post('settings', '\QCod\AppSettings\Controllers\AppSettingController@store')->name('settings.store');


    }
);
