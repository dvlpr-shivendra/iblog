<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', 'PostController@index')->name('posts.index');

Route::resource('posts', 'PostController')->except([
    'index', 'show'
])->middleware('can:manage-posts');

Route::post('/posts/file-upload', 'PostController@fileUpload')->middleware('can:manage-posts');

Route::get('/posts/{post}', 'PostController@show');

Route::post('/posts/{post}/like', 'PostController@like');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/comments', 'AdminController@comments')->middleware('can:manage-posts');
Route::get('/admin/approve-comment/{comment}', 'AdminController@approveComment')->middleware('can:manage-posts');
Route::get('/admin/trash-comment/{comment}', 'AdminController@trashComment')->middleware('can:manage-posts');