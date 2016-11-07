<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('chat/salas');
});

Route::group(['prefix' => 'chat', 'as' => 'chat.', 'middleware' => 'auth'], function (){
    Route::get('salas', 'RoomsController@index')->name('rooms.list');
    Route::get('salas/{id}', 'RoomsController@show')->name('rooms.show');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
