<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\AutenticarController;
use App\Models\usuario;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UsuarioController::class)->group(function () {
    Route::get('/usuarios', 'index');
    Route::post('/usuarios', 'store');
    Route::get('/usuario/{id}', 'show');
    Route::put('/usuario/{id}', 'update');
    Route::delete('/usuario/{id}', 'destroy');
});

Route::post('/registro',[AutenticarController::class, 'registro']);
Route::post('/acceso',[AutenticarController::class, 'acceso']);
