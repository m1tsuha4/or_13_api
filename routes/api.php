<?php

// use NewPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\EmailVerificationController;
use App\Http\Controllers\Api\NewPasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which    
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// route auth user and admin
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login')->middleware('cors');;
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register')->middleware('cors');
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout')->middleware(['cors','jwt.verify']);
Route::post('/password', App\Http\Controllers\Api\PasswordController::class)->name('password')->middleware(['cors','jwt.verify']);
Route::post('email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail'])->middleware(['cors','jwt.verify']);
Route::get('verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify')->middleware(['cors','jwt.verify']);
Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword'])->middleware('cors');
Route::post('reset-password', [NewPasswordController::class, 'reset'])->middleware('cors');
// route user
Route::controller(ProfileController::class)->group(function(){
    Route::get('profile/show', 'show')->middleware(['cors','jwt.verify']);
    Route::post('profile/store_profile', 'store_profile')->middleware(['cors','jwt.verify']);
    Route::post('profile/update_profile', 'update_profile')->middleware(['cors','jwt.verify']);
    Route::post('profile/store_file', 'store_file')->middleware(['cors','jwt.verify']);
    Route::get('profile/show_file/{filename}', 'show_file')->middleware(['cors','jwt.verify']);
});
// route admin
Route::controller(AdminController::class)->group(function(){
    Route::get('admin/show_all', 'show_all')->middleware(['cors','jwt.verify','admin']);
    Route::get('admin/show_auser/{id}', 'show_auser')->middleware(['cors','jwt.verify','admin']);
    Route::post('admin/status_aktif/{id}', 'status_aktif')->middleware(['cors','jwt.verify','admin']);
    Route::post('admin/validation_status/{id}', 'validation_status')->middleware(['cors','jwt.verify','admin']);
});

