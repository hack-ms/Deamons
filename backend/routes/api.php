<?php

Route::group(array('prefix' => 'avaliacao'), function()
{
    Route::get('/', 'AvaliacaoController@get');
    Route::post('/', 'AvaliacaoController@post');
});


Route::group(array('prefix' => 'ubs'), function()
{
    Route::get('/', 'UbsController@get');
    Route::get('/get2', 'UbsController@get2');
    Route::get('/home', 'UbsController@getHome');
});

