<?php

Route::get('/', function () {
    return response()->json(['message' => 'API dos Daemons', 'status' => 'Online']);
});
