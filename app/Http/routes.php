<?php

Route::post('items/import', 'ItemController@import');
Route::get('items/export', 'ItemController@export');

Route::get('/', function () {
    return view('items');
});
