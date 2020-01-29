<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('listUser', 'UserController@listUser');
Route::get('showUser/{id}', 'UserController@showUser');
Route::post('createUser', 'UserController@createUser');
Route::put('addMovieOnTheList/{user_id}/{movie_id}', 'UserController@addMovieOnTheList');
Route::put('updateUser/{id}', 'UserController@updateUser');
Route::delete('deleteUser/{id}', 'UserController@deleteUser');
Route::delete('deleteMovieOnTheList/{user_id}/{movie_id}', 'UserController@deleteMovieOnTheList');


Route::get('listMovie', 'MovieController@listMovie');
Route::get('showMovie/{id}', 'MovieController@showMovie');
Route::post('createMovie', 'MovieController@createMovie');
Route::put('updateMovie/{id}', 'MovieController@updateMovie');
Route::delete('deleteMovie/{id}', 'MovieController@deleteMovie');


Route::get('listPost', 'PostController@listPost');
Route::get('showPost/{id}', 'PostController@showPost');
Route::post('createPost', 'PostController@createPost');
Route::put('addMovie/{id}', 'PostController@addMovie');
Route::put('updatePost/{id}', 'PostController@updatePost');
Route::delete('deletePost/{id}', 'PostController@deletePost');
Route::delete('deleteUser/{id}', 'PostController@deleteUser');
Route::delete('deleteMovie/{id}', 'PostController@deleteMovie');
