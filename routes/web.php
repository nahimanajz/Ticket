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

Route::get('/create/ticket', 'TicketsController@create');
Route::post('/create/ticket', 'TicketsController@store'); //saving ticket
Route::get('/tickets','TicketsController@index'); //view all tickets
Route::get('/edit/ticket/{id}','TicketsController@edit');
Route::post('/edit/ticket/{id}','TicketsController@update');
Route::delete('/delete/ticket/{id}','TicketsController@destroy');

Route::get('clients/{title}','ClientsController@index');

//pages from traversy tuts
Route::get('pages','pagesController@index');
Route::get('pages/about','pagesController@about');
Route::get('pages/services','pagesController@services');

//get all routes by single line in controller
Route::resource('posts','PostsController');
Route::post('/post/create','PostsController@store');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');//->name('home');
//starting admin lte
Route::get('/adminlte', function(){
    return view('adminlte.admin_template');
});
Route::get('material/index','MaterialController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
