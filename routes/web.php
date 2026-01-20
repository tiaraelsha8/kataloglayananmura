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
use App\Http\Controllers\backend\KategoriController;
use App\Http\Controllers\backend\LayananController;

// FRONTEND
use App\Http\Controllers\frontend\HomeController;


// KATEGORI LAYANAN
// use Illuminate\Support\Str;

// Route::get('/layanan/{slug}', function ($slug) {
//     $viewPath = 'frontend.layanan.' . $slug;
//     if (view()->exists($viewPath)) {
//         return view($viewPath);
//     } else {
//         abort(404);
//     }
// });

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

    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('layanan', LayananController::class);

    // Hanya superadmin yang boleh kelola
    Route::middleware(['role:superadmin'])->group(function () {

        Route::resource('kategori', KategoriController::class);
        
        Route::resource('/user', UserController::class);
        
        Route::resource('/kontak', KontakController::class);

        Route::resource('/carousel', CarouselController::class);
    });
});



// ==================== FRONTEND ====================

Route::get('/', [HomeController::class, 'index'])->name('beranda');
Route::get('/Layanan/lihat/{id}', [HomeController::class, 'read'])->name('Layanan.read');