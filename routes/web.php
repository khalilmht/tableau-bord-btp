<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChantierController;

Route::get('/', function () {
    return view('welcome');
});

// Une seule ligne pour générer les 7 routes CRUD de base
Route::resource('chantiers', ChantierController::class);