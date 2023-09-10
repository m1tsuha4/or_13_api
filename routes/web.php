<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
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

Route::controller(ExamController::class)->group(function(){
    Route::get('/ujian/aturan/{ujianId}/{user_id}', 'ruleView')->name('ruleView');
    Route::post('/ujian/{ujianId}/{user_id}', 'startExam')->name('startExam');
    Route::get('/ujian/{ujianId}/{user_id}/start', 'onExam')->name('onExam');
    Route::post('/ujian/{ujianId}/{user_id}/save', 'save')->name('saveExam');
    Route::post('/ujian/{ujianId}/{user_id}/end', 'end')->name('endExam');
    Route::get('/ujian/{ujianId}/{user_id}/end', 'end')->name('endExam');
    Route::get('/ujian/{ujianId}/{user_id}/result', 'result')->name('resultExam');
});

