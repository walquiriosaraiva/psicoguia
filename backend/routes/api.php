<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PacienteController;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::group([
        'middleware' => ['api', 'auth.online']
    ], function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/user-profile', [AuthController::class, 'userProfile']);
    });
});

Route::prefix('usuario')->group(function () {
    Route::post('/', [UserController::class, 'store']);
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::put('/edit/{id}', [UserController::class, 'edit']);
    Route::patch('/update/{id}', [UserController::class, 'update']);
    Route::delete('/delete/{id}', [UserController::class, 'destroy']);
});

Route::prefix('paciente')->group(function () {
    Route::post('/', [PacienteController::class, 'store']);
    Route::get('/', [PacienteController::class, 'index']);
    Route::get('/{id}', [PacienteController::class, 'show']);
    Route::put('/edit/{id}', [PacienteController::class, 'edit']);
    Route::patch('/update/{id}', [PacienteController::class, 'update']);
    Route::delete('/delete/{id}', [PacienteController::class, 'destroy']);
});
