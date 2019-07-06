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

Route::middleware('auth')->group(function () {
    Route::get('elections/{election}/voters', 'ElectionController@voters')
           ->name('elections.voters');
    Route::patch('elections/{election}/voters/{voter}', 'ElectionController@updateVoters')
           ->name('elections.updateVoters');
    Route::resource('elections', 'ElectionController');
    Route::resource('elections.candidates', 'CandidateController');
    Route::resource('voters', 'VoterController'); // All voters belongs to organization
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
            // Users section
            Route::get('users', 'UserController@index')->name('users');
            Route::get('users/{user}/show', 'UserController@show')->name('users.show');
            Route::get('users/create', 'UserController@create')->name('users.create');
            Route::post('users/create', 'UserController@store')->name('users.store');
            Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
            Route::post('users/{user}/update', 'UserController@update')->name('users.update');
            Route::delete('users/{user}/delete', 'UserController@destroy')->name('users.destroy');

            // Organizations section
            Route::resource('organizations', 'OrganizationController');
            Route::resource('elections', 'ElectionController');
        });
