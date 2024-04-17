<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/create_user', [App\Http\Controllers\UserController::class, 'create'])->name("create_user");
Route::post('/login_user', [App\Http\Controllers\UserController::class, 'loginUser'])->name("login_user");





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
