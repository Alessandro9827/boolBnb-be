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
        Route::get('/apartments/deleted', [AdminApartmentController::class, 'deletedAparments'])->name('apartments.deleted');
        Route::resource('apartments', AdminApartmentController::class);
        Route::delete('/apartments/{apartment}', [AdminApartmentController::class, 'destroy'])->name('apartments.destroy');
    });

    Auth::routes();

Route::name('guest.')
    ->prefix('guest/')
    ->group(function () {
        Route::resource('apartments', GuestApartmentController::class);
    });