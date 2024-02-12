<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login.index');
    Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');
    Route::post("/logout", [AuthController::class, 'logout'])->name("logout");

});
Route::fallback(function () {
    return abort(404);
})->name('fallback');
