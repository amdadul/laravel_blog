<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', function () {
    return view('home');
});
Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{id}', 'HomeController@post')->name('post');
Route::get('/tag/{id}', 'HomeController@tag')->name('tag');
Route::get('/category/{id}', 'HomeController@category')->name('category');

Auth::routes();
Route::resource('user', 'UserController');


Route::prefix('admin')->middleware('auth')->group(function()
{
    Route::get('/home', function () {
        return view('sudb.home');
    })->name('admin.home');
    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
    Route::post('/category/store', 'CategoryController@store')->name('category.store');
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/post/save', 'PostController@store')->name('post.store');
    Route::get('/categories','CategoryController@index')->name('category.manage');
    Route::get('/comments','CategoryController@index')->name('comments');
    Route::delete('/categories/{id}','CategoryController@destroy')->name('category.destroy');
    Route::get('/posts','PostController@index')->name('post.manage');
    Route::get('/posts/edit/{id}','PostController@edit')->name('post.edit');
    Route::post('/posts/update/{id}','PostController@update')->name('post.update');
    Route::delete('/posts/{id}','PostController@destroy')->name('post.destroy');
    Route::resource('slider','SliderController');
    Route::resource('tag','TagController');

    //Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('admins','AdminController');
    Route::resource('roles','RoleController');

});
