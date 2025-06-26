<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('users', [UserController::class, 'index']);
Route::get('users-export', [UserController::class, 'export'])->name('users.export');
Route::post('users-import', [UserController::class, 'import'])->name('users.import');
