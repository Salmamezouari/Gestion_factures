<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FactureController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('factures', FactureController::class);
