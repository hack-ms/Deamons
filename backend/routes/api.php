<?php

Route::group(array('prefix' => 'avaliacao'), function()
{
    Route::get('/', 'AvaliacaoController@get');
    Route::post('/', 'AvaliacaoController@post');
});
