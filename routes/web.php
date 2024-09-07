<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/doctor', function () {
    return view('doctors');
});
Route::get('/hospital', function () {
    return view('hospital');
});
Route::get('/admin', function () {
    return view('admin');
});

Route::get('/transaction', function () {
    return view('transaction');
});

Route::get('/subscribers', function () {
    return view('subscribers');
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/appointments', function () {
    return view('appointments');
});

Route::get('/patients', function () {
    return view('patients');
});
