<?php

Route::get('items', 'ItemController@index');
Route::post('items/import', 'ItemController@import');
Route::get('items/export', 'ItemController@export');

Route::get('/', function () {
    return view('subir');
});
