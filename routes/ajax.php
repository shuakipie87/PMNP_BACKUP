<?php

use Illuminate\{
    Http\Request,
    Support\Facades\Route
};
use App\Http\Controllers\API\{
    TestController,
    AuthController
};

/*
|--------------------------------------------------------------------------
| Web Routes > Ajax
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->get('/access', function (Request $request) {
    return $request->user();
});
