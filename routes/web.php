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
    return view('home');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

//Rutas protegidas
Route::group(['middleware' => ['auth']], function () {
    Route::resource('/intranet', 'NotaController');

    Route::get('/web', 'webController@index')->name('web');
    Route::post('/web/update_presentation', 'webController@update_presentation')->name('webUpdatePresentation');
    Route::post('/web/update_frase', 'webController@update_frase')->name('webUpdateFrase');
    Route::post('/web/update_carrusel', 'webController@update_carrusel')->name('webUpdateCarrusel');
    Route::get('/PageWeb', 'PageWebController@index')->name('PageWeb');
    Route::post('/PageWeb/update_pageWeb', 'PageWebController@update_pageWeb')->name('webUpdatePageWeb');

});
