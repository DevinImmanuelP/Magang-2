<?php

use App\Http\Controllers\Api\celanaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/celana', [celanaController::class, 'index']);
Route::post('/celana', [celanaController::class, 'store']);
Route::get('/celana/{id}', [celanaController::class, 'show']);
Route::put('/celana/{id}', [celanaController::class, 'update']);
Route::delete('/celana/{id}', [celanaController::class, 'destroy']);