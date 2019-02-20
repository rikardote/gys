<?php

Route::post('items/import', 'ItemController@import');
Route::get('items/export', 'ItemController@export');

Route::post('items/partefija', 'ItemController@import_parte');

Route::get('/', function () {
    return view('items');
});
