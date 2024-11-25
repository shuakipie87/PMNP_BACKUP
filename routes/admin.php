<?php
// illuminate
use Illuminate\{
    Http\Request,
    Support\Facades\Hash,
    Support\Facades\Redirect,
    Support\Facades\Route
};
// controller
use App\Http\Controllers\Admin\{
    AuthController,
    AdminController,
    Demographics\DemographicsController,
    Profiles\ProfileController,
    Sectors\RegionsController,
    Users\UsersController
};

/*
|--------------------------------------------------------------------------
| Web Routes => Admin
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// register form -------------- DISABLED
Route::middleware(['guest:admin'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        // register
        //Route::get('/register', 'register')->name('register');
        //Route::post('/register', 'store')->name('register.execute');
        Route::match(['get', 'post'], '/forgot-password', 'forgot_password')->name('forgot-password');
        Route::get('/verify/{token}', 'verify')->name('verify');
    });
});
// admin form
Route::middleware(['guest:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        // login
        // Route::get('/login', 'login')->name('login');
        // Route::post('/login', 'execute')->name('login.submit');
    });
}); // ------------------------- DISABLED - END

// confirm password
Route::middleware(['auth:admin', 'throttle:6,1'])->group(function () {
    Route::post('/confirm-password', function (Request $request) {
        if (!Hash::check($request->password, $request->user()->password)) {
            return back()->withErrors([
                'password' => ['The provided password does not match our records.']
            ]);
        }
        $request->session()->passwordConfirmed();
        return redirect()->intended();
    });
});

// auth group -> dashbaord
// 'auth:admin', 'auth.session', 'auth.api'
Route::middleware(['auth:admin'])->group(function () {
    // group route => admin
    Route::controller(AdminController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
        // main page
        Route::get('/', 'dashboard')->name('home');
        Route::any('/dashboard', 'dashboard')->name('dashboard');
        Route::any('/dashboard/search/{region}/{province}/{municipality}/{year}', 'dashboard')->name('dashboard.search');
    });
    // demographics-socio-economic-profiles => page
    Route::controller(DemographicsController::class)->prefix('dashboard')->group(function () {
        // main page
        Route::any('demographics-socio-economic-profiles', 'show')->name('dashboard.demographics-socio-economic-profiles');
    });
    
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
    // end [dashbaord]
})->middleware(['auth:sanctum', 'ability:check-status,place-orders']);

