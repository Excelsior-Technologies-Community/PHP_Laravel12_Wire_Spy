<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard'); // load dashboard instead of default welcome
});

