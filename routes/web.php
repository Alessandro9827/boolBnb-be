<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ApartmentController as AdminApartmentController;
use App\Http\Controllers\Admin\MyApartmentController as MyApartmentController;
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
    return view('guest.home');
});


    
Auth::routes();
Route::middleware('auth')
    ->name('admin.')
    ->prefix('admin/')
    ->group(function () {
        Route::get('/my_apartments/deleted', [MyApartmentController::class, 'deletedAparments'])->name('apartments.deleted');
        Route::get('/my_apartments/deleted/{apartment}', [MyApartmentController::class, 'deletedShow'])->name('apartments.deleted.show');
        Route::patch('/my_apartments/deleted/{apartment}', [MyApartmentController::class, 'deletedRestore'])->name('apartments.deleted.restore');
        
        Route::delete('/my_apartments/{apartment}', [MyApartmentController::class, 'destroy'])->name('apartments.destroy');
        Route::resource('my_apartments', MyApartmentController::class);
    });

    Auth::routes();

Route::name('guest.')
    ->prefix('guest/')
    ->group(function () {
        Route::resource('apartments', GuestApartmentController::class);
    });

    Auth::routes();

// Route::middleware('auth')
//         ->name('admin.')
//         ->prefix('admin/')
//         ->group(function () {
//             Route::resource('apartments', AdminApartmentController::class);
//             Route::get('/home', function (){
//                 return view('admin.apartments.home');
//             }); 
//         });