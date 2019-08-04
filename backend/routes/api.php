<?php

Route::group(array('prefix' => 'avaliacao'), function()
{
    Route::get('/', 'AvaliacaoController@get');
    Route::post('/', 'AvaliacaoController@post');
});


Route::group(array('prefix' => 'ubs'), function()
{
    Route::get('/', 'UbsController@get');
    Route::get('/filtro', 'UbsController@filtro');
});

