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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Registred routes
Route::name('registred.')
->prefix('registred')
->namespace('registred')
->middleware('auth')
->group(function () {
    // Route::get('/', 'TaskController@index')
    // ->name('task.index');
    
    Route::resource('/', 'TaskController');
    Route::patch('/done/{task}', 'TaskController@done')->name('done');
    Route::get('/donelist', 'TaskController@donelist')->name('donelist');
});