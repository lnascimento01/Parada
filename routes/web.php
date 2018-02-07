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

Route::get('/', 'HomeController@index');
Route::get('/os', 'OsController@index');
Route::post('/os/save', 'OsController@salvar');
Route::get('/clientes', 'ClientesController@index');
Route::post('/clientes/save', 'ClientesController@salvar');
Route::post('/clientes/del', 'ClientesController@deletar');

Route::group(['prefix' => 'modal'], function() {

    Route::get('view_cliente', 'ModalController@viewCliente');
    Route::get('edit_cliente', 'ModalController@editCliente');
    Route::get('view_os', 'ModalController@view');
    Route::get('edit_os', 'ModalController@edit');
    
});
Route::get('/sendemail', function () {

    $data = array(
        'name' => "Learning Laravel",
    );

    Mail::send('emailwelcome', $data, function ($message) {

        $message->from('lfsnascimento84@gmail.com', 'Learning Laravel');

        $message->to('zeus.com@gmail.com')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";

});