<?php

use Illuminate\{
    Http\Request,
    Support\Facades\Route
};
use App\Http\Controllers\API\{
    TestController,
    AuthController
};
// controller
use App\Http\Controllers\Admin\{
    Profiles\ProfileController,
    Sectors\RegionsController,
    Users\UsersController
};

/*
|--------------------------------------------------------------------------
| Web Routes > API
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->get('/user/access', function (Request $request) {
    return $request->user();
});

// auth group
Route::controller(AuthController::class)->group(function () {
    // group route => auth
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/login', 'login')->name('auth.login.submit');
    Route::get('/verify', 'index')->name('auth.verify');
    Route::get('/user', 'show')->name('auth.data');
})->middleware(['auth:sanctum', 'ability:check-status,place-orders']);

// auth group
Route::middleware(['auth:sanctum'])->group(function () {
    // group route => profile
    Route::controller(ProfileController::class)->group(function () {
        // profile page
        Route::get('/profile', 'profile')->name('profile');
        Route::post('/profile', 'execute')->name('profile.update');
    });
    // group route => users
    Route::controller(UsersController::class)->group(function () {
        // users page
        Route::get('/users', 'index')->name('users')->middleware(['admin.role']);
        Route::get('/user/{id}', 'edit')->name('user.edit')->middleware(['admin.role']);
    });
    // group route => sectors
    Route::prefix('sectors')->name('sectors')->group(function () {
        Route::get('/regions', [RegionsController::class, 'index'])->name('.regions')->middleware(middleware: ['admin.role']);
    });
});