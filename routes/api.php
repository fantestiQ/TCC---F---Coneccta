<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Exemplo das suas rotas de vaga
Route::prefix('v1')->group(function () {
    Route::get('vagas', [\App\Http\Controllers\Api\VagaController::class, 'index']);
    Route::get('vagas/{vaga}', [\App\Http\Controllers\Api\VagaController::class, 'show']);
    Route::post('vagas/{vaga}/aplicar', [\App\Http\Controllers\Api\VagaController::class, 'aplicar']);
});
