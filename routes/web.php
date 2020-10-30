<?php

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
    return view('index');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

//Route::get('/posts', function () {
    //$posts = [1,2,3,4,5];
    //return view('posts.list', ['posts'=> $posts]);
//});

//Route::get('/posts/{id}', function ($id) {
    //return view('posts.show');
//});

//CRUD 
// 3Routing :create/edit/list


//管理者頁面
Route::get('/posts/admin','PostController@admin')->middleware('auth');
//create 表單
Route::get('/posts/create','PostController@create')->middleware('auth');
//edit form
Route::get('/posts/{post}/edit','PostController@edit')->middleware('auth');




//C create controller 的儲存操作
Route::post('/posts','PostController@store')->middleware('auth');
//1 add read routing 
Route::get('/posts/show/{post}','PostController@showByAdmin')->middleware('auth');

Route::put('/posts/{post}','PostController@update')->middleware('auth');
//D
Route::delete('/posts/{post}','PostController@destroy')->middleware('auth');

Route::resource('categories','CategoryController')->except(['show'])->middleware('auth');
Route::resource('tags','TagController')->only(['index','destroy'])->middleware('auth');

//for everyone 
//list
Route::get('/posts','PostController@index');
// show by category 分類
Route::get('/posts/category/{category}','PostController@indexWithCategory');
// show by tag 分類
Route::get('/posts/tag/{tag}','PostController@indexWithTag');


//R read controller 的儲存操作 。{post}指的是post 的model 最後會疊代成數字@後面為method 的名子 只要兩邊對應就可以
Route::get('/posts/{post}','PostController@show');
//Update 跟資料庫互動

// for comment 
Route::resource('comments','CommentController')->only(['store','update','destroy']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

