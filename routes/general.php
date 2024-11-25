<?php

use Illuminate\{
    Support\Facades\Route,
    Http\RedirectResponse
};

use App\Http\Controllers\{
    Admin\AuthController,
    General\GeneralController
};

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

// reset-password page auth controller
Route::middleware(['guest:admin'])->group(function () {
    Route::controller(AuthController::class)->group(function (): void {
        // forgot password
        Route::get('/forgot-password', 'forgotPassword')->name('forgot-password');
        Route::post('/forgot-password', 'forgotPasswordAction')->name('forgot-password.action');
        Route::get('/forgot-password/message', 'forgotPasswordMessage')->name('forgot-password.message');
        Route::get('/reset-password/{token}', 'resetPassword')->name('password.reset');
        Route::post('/reset-password', action: 'resetPasswordAction')->name('password.update');
    });
});

// general page (home, about, contact)
Route::controller(GeneralController::class)->group(function () {
    // Route::get('/login', 'index')->name('login');
});
