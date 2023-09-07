<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/ujian/aturan", function () {
    return view("aturan");
});

Route::get("ujian/mmd", function () {
    return view("1");
});
Route::get("ujian/prog", function () {
    return view("2");
});
Route::get("ujian/skj", function () {
    return view("3");
});
Route::get("ujian/organisasi", function () {
    return view("4");
});
