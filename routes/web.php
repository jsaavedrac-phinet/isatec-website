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

Route::name('web.')->group(function(){
    Route::get('/', 'WebController@index')->name('home');
    Route::get('/about','WebController@about')->name('about');
    Route::get('/programs/{slug}/info','WebController@program')->name('program');
    Route::get('/posts/{type}','WebController@posts')->name('posts');
    Route::get('/posts/{type}/{post}/read','WebController@post')->name('post');
    Route::get('/contact','WebController@contact')->name('contact');
    Route::post('/contact','WebController@send_email')->name('send_email');
    Route::get('/admision','WebController@admision')->name('admision');
    Route::post('/admision','WebController@pre_register')->name('pre_register');
});

Route::post('deploy', 'DeployController@deploy');
Auth::routes();
// CARGAR POR DEFECTO EL LOGIN
Route::get('admin/','Auth\LoginController@showLoginForm')->name('login');
// VERIFICAR USUARIO
Route::post('admin/','Auth\LoginController@login')->name('verificar');
Route::name('virtual-library.')->prefix('virtual-library')->group(function(){
    Route::get('/','VirtualLibraryController@index')->name('index');
    Route::get('/byTag/{tag}','VirtualLibraryController@byTag')->name('byTag');
    Route::get('/book/{book}','VirtualLibraryController@book')->name('book');

    Route::get('books','VirtualLibraryController@books')->name('books');
    Route::get('/books/byTag/{tag}','VirtualLibraryController@booksByTag')->name('booksByTag');
});

