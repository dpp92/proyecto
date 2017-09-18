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

Route::get('grado/lista','admin\gradosCtrl@lista');
Route::resource('grado','admin\gradosCtrl');
// Route::get('maestro/lista'),'admin\docenteCtrl@lista');

Route::get('docente/home','admin\docenteCtrl@home');
Route::get('docente/lista','admin\docenteCtrl@lista');
Route::resource('docente','admin\docenteCtrl');

Route::get('alumno/lista','admin\alumnosCtrl@lista');
Route::resource('alumno','admin\alumnosCtrl');


Route::get('docente/califica/{dni}','docente\calificacionCtrl@califica');
Route::post('docente/calificar','docente\calificacionCtrl@calificar');
Route::get('docente/listo/{dni}','docente\calificacionCtrl@listo');



