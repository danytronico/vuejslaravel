<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/contacto/create', 'contactoController@store');

Route::post('/login/auth', 'loginController@index');

Route::get('/contacto', 'contactoController@index');

Route::delete('/contacto/delete/{id}', 'contactoController@delete');


Route::get('/noticia', 'noticiaController@index');

Route::get('/noticia/index2', 'noticiaController@index2');


Route::post('/noticia/update/{id}', 'noticiaController@update');

Route::delete('/noticia/delete/{id}', 'noticiaController@delete');

Route::get('/login/index2', 'loginController@index2');

Route::post('/ofrenda/create', 'ofrendaController@store');

Route::get('/ofrenda', 'ofrendaController@index');

Route::post('/ofrenda/update/{id}', 'ofrendaController@update');

Route::delete('/ofrenda/delete/{id}', 'ofrendaController@delete');

Route::post('/evento/create', 'eventoController@store');

Route::get('/evento', 'eventoController@index');

Route::post('/evento/update/{id}', 'eventoController@update');

Route::post('/evento/image/{id}', 'eventoController@image');

Route::post('/evento/image2/{id}', 'eventoController@image2');


Route::get('/evento/index2', 'eventoController@index2');

Route::post('/evento/index3/{id}', 'eventoController@index3');



Route::delete('/evento/delete/{id}', 'eventoController@delete');

Route::post('/predica/create', 'predicaController@store');


Route::get('/predica', 'predicaController@index');

Route::get('/predica/index2', 'predicaController@index2');


Route::get('/predica/index3', 'predicaController@index3');


Route::get('/predica/index4', 'predicaController@index4');



Route::post('/predica/update/{id}', 'predicaController@update');

Route::post('/predica/image/{id}', 'predicaController@image');


Route::delete('/predica/delete/{id}', 'predicaController@delete');



Route::post('/minisgalery/create', 'minisgalleryController@store');


Route::get('/minisgalery', 'minisgalleryController@index');

Route::get('/minisgalery/index2', 'minisgalleryController@index2');


Route::get('/minisgalery/index3', 'minisgalleryController@index3');


Route::get('/minisgalery/index4', 'minisgalleryController@index4');

Route::get('/minisgalery/index5', 'minisgalleryController@index5');

Route::get('/minisgalery/index6', 'minisgalleryController@index6');



Route::post('/minisgalery/update/{id}', 'minisgalleryController@update');

Route::post('/minisgalery/image/{id}', 'minisgalleryController@image');


Route::delete('/minisgalery/delete/{id}', 'minisgalleryController@delete');

