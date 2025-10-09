<?php

use Illuminate\Support\Facades\Route;

// LOGIN
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\auth\ResetPasswordController;

// BACKEND
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\CarouselController;
use App\Http\Controllers\backend\KontakController;


// FRONTEND


Route::get('/', function () {
    return view('welcome');
});

// ==================== LOGIN ====================
Route::middleware('guest')->group(function () {
    //Login
    Route::get('/kataloglogin', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/kataloglogin', [AuthController::class, 'login'])->name('login.submit');

    // Forgot password
    Route::get('/password/forgot', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    // Reset password
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==================== BACKEND ====================
Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');
    
    Route::resource('/kontak', KontakController::class);
    
    Route::resource('/carousel', CarouselController::class);

    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('/user', UserController::class);

    // Hanya superadmin yang boleh kelola
    Route::middleware(['role:superadmin'])->group(function () {

        
         
    });

});




// ==================== FRONTEND ====================



