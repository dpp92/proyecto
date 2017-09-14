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




Route::get('materia/lista','admin\materiaCtrl@lista');
Route::resource('materia','admin\materiaCtrl');

Route::get('salon/lista','admin\salonCtrl@lista');
Route::resource('salon','admin\salonCtrl');

// Route::get('maestro/lista'),'admin\docenteCtrl@lista');


