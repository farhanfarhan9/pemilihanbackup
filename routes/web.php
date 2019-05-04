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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Organization route

Route::name('admin.')
		->namespace('Admin')
		->middleware('auth')
		->prefix('admin')
		->group(function(){
			Route::resource('elections', 'Organization\ElectionController');
			Route::resource('candidates', 'Organization\CandidateController');
		});
/*
 | Admin Routes goes here :)
 | Call : admin.routes
 | Middleware: authentication
 | Namespace : Admin, mean all controllers in App\Http\Controllers\Admin namespace
 | Prefix : /admin/routes
 */
Route::name('admin.')
        ->namespace('Admin')
        ->middleware('auth')
        ->prefix('admin')
        ->group(function () {
            // User section
            Route::get('users', 'UserController@index')->name('users');
            Route::get('users/{user}/show', 'UserController@show')->name('users.show');
            Route::get('users/create', 'UserController@create')->name('users.create');
            Route::post('users/create', 'UserController@store')->name('users.store');
            Route::delete('users/{user}/delete', 'UserController@destroy')->name('users.destroy');
        });
