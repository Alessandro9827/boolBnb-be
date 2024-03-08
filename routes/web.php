<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ApartmentController as AdminApartmentController;
use App\Http\Controllers\Guest\ApartmentController as GuestApartmentController;

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

Route::get('/', function () {
    return view('home');
});


    
Auth::routes();
Route::middleware('auth')
    ->name('admin.')
    ->prefix('admin/')
    ->group(function () {
        Route::resource('apartments', AdminApartmentController::class);
    });

    Auth::routes();
Route::middleware('auth')
    ->name('guest.')
    ->prefix('guest/')
    ->group(function () {
        Route::resource('apartments', GuestApartmentController::class);
    });