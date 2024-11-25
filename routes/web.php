<?php

use Illuminate\{
    Support\Facades\Route,
    Http\RedirectResponse
};

use App\Http\Controllers\Admin\{
    AuthController
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

// register page auth controller
Route::middleware(['guest:admin'])->group(function () {
    Route::controller(AuthController::class)->group(function (): void {
        // register data
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'store')->name('register.store');
        // register password
        Route::get('/register/password', 'password')->name('register.password');
        Route::post('/register/password', 'passwordStore')->name('register.password.store');
    });
});
// welcome
Route::get('/', function () {
    return view('welcome');
});