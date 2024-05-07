<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/etudiants', [EtudiantController::class, 'index']);
Route::get('/etudiants/{id}', [EtudiantController::class, 'show']);
Route::post('/etudiants', [EtudiantController::class, 'store']);
Route::put('/etudiants/{id}', [EtudiantController::class, 'update']);
Route::delete('/etudiants/{id}', [EtudiantController::class, 'destroy']);
