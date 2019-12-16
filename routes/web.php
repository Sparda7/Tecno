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
//crud alimento
Route::get('/platillo','PlatilloController@index');
Route::post('/platillo/registrar','PlatilloController@store');
Route::put('/platillo/actualizar','PlatilloController@update');
Route::delete('/platillo/eliminar_{id}','PlatilloController@destroy');

//crud horarioalimento(se pone cualquier nombre a la primera ruta)
Route::get('/horarioalimento','HorarioAlimentoController@index');
Route::get('/horarioalimento/listar_alimento','HorarioAlimentoController@listar_alimento');
Route::get('/horarioalimento/listar_horario','HorarioAlimentoController@listar_horario');
Route::post('/horarioalimento/registrar','HorarioAlimentoController@store');
Route::put('/horarioalimento/actualizar','HorarioAlimentoController@update');
Route::delete('/horarioalimento/eliminar_{id}','HorarioAlimentoController@destroy');

//crud actividadfisica
Route::get('/actividadfisica','ActividadFisicaController@index');
Route::post('/actividadfisica/registrar','ActividadFisicaController@store');
Route::put('/actividadfisica/actualizar','ActividadFisicaController@update');
Route::delete('/actividadfisica/eliminar_{id}','ActividadFisicaController@destroy');
Route::get('/actividadfisica/select','ActividadFisicaController@select');



//crud perfil
Route::get('/perfil','PerfilController@index');


//crud dieta
Route::get('/dieta','DietaController@index');


//Crud Tipo actividad
Route::get('/tipoactividad','TipoActividadController@index');
Route::post('/tipoactividad/registrar','TipoActividadController@store');
Route::put('/tipoactividad/actualizar','TipoActividadController@update');
Route::delete('/tipoactividad/eliminar_{id}','TipoActividadController@destroy');




//vista de la pagina
Route::get('/platillos', function () {
    return view('platillo/index');
    
})->name('platillo');

Route::get('/actividadfisicas', function () {
    return view('actividad/index');
    
})->name('acti');

Route::get('/tipoactividads', function () {
    return view('tipoactividad/index');
    
})->name('tipo');

Route::get('/horarioalimentos', function () {
    return view('horarioalimentods/index');    
})->name('horali');