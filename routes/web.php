<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Hello World";
});

Route::get('/about', function() {
    echo "About us";
});