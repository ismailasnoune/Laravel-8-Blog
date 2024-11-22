<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Route::get('/home','HomeController@index')->name('home');
// Route::get('post/{id}','HomeController@show')->name("post.show");
// Route::get('create/post','HomeController@create')->name("post.create");
// Route::post('add/post','HomeController@store')->name("post.store");
// Route::get('edit/post/{id}','HomeController@edit')->name("post.edit");
// Route::put('update/post/{id}','HomeController@update')->name("post.update");
// Route::delete('delete/post{id}','HomeController@delete')->name("post.delete");
Route::delete('delete/posts/{id}','PostController@delete')->name("posts.delete");
Route::get('restore/posts/{id}','PostController@restore')->name("posts.restore");
Route::get('search/posts','PostController@search')->name("posts.search");



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/');
});

Route::resource('posts','PostController');
