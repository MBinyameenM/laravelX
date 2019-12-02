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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test/{check?}',function($check = "User") {
	return view('test',compact('check'));
})->where('check','.*');


Route::match(['get'],'test/{check}',function(){
	echo "Its a get url";
});


Route::resource('users','UserController')->middleware('verified');

Route::get('auth',function(){
	return App\User::first();
});