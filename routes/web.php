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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/index', function () {
    return view('index');
});

Route::resource('usuario', 'UsuarioController');
Route::get('/cambiartema', 'UsuarioController@CambiarTema');
Route::resource('producto', 'ProductoController');
Route::resource('venta', 'VentaController');
Route::resource('asistencia', 'AsistenciaController');
Route::resource('mensualidad', 'MensualidadController');
Route::resource('alimentacion', 'AlimentacionController');
Route::resource('socio_rutina', 'SocioRutinaController');
Route::resource('nivel_academico', 'NivelAcademicoController');
Route::resource('estadistica','EstadisticaController');
Route::resource('carrera', 'CarreraController');
Route::resource('cargo', 'CargoController');
Route::resource('autoridad', 'AutoridadController');
Route::resource('firmante', 'FirmanteController');
Route::resource('titulo', 'TituloController');
Route::resource('inscribe', 'InscribeController');
Route::resource('estudiante', 'EstudianteController');
Route::get('carreras/{id}','NivelAcademicoController@getCarreras')->name('car');
Route::resource('emitirTitulo', 'TituloController@imprimirTitulo');
Route::get('emitirT/{id}', 'TituloController@imprimirTitulo')->name('titulo');;
Route::resource('emitirCertificado', 'TituloController@imprimirCertificado');
Route::resource('ofertarCarrera', 'CarreraOfertadaController');
Route::resource('lugarOferta', 'LugarOfertaController');
Route::get('lugar/{nombre}','LugarOfertaController@setLugar')->name('setLugar');
Route::get('allLugar','LugarOfertaController@showLugar')->name('showLugar');
Route::get('deletLugar/{id}','LugarOfertaController@deletLugar')->name('deletLugar');
Route::resource('docente', 'DocenteController');