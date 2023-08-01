<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;

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

/*
!PUBLIC ROUTE
EVERYONE CAN ACCESS IT EVEN IF THEY ACCES MANUAL.
*/

Route::view('home', 'sales.home')->name('home');
Route::view('register-user', 'login.user_register')->name('register-user');
Route::view('welcome', 'ShopInterface.landing_home')->name('landing-page');
Route::get('/shop', [PenjualanController::class, 'show_product'])->name('showProduct');

Route::controller(LoginController::class)->group(function () {
    /*
     INFO:This is for Login
     */
    Route::get('login-user', 'index')->name('login-user');
    Route::post('login-user/proses', 'proses_login')->name('proses-user');
    Route::get('logout', 'proses_logout')->name('user-logout');
    Route::post('register-user/proses', 'store')->name('proses-user-register');
});
/* END PUBLIC ROUTE */

/*
!ROUTE WITH AUTH
ADMIN (HAS LOGIN) AUTH : 2
USER (HAS LOGIN) AUTH : 1

UNKNOWN USER WITHOUT LOGIN THEY WILL REDIRECT TO LOGIN IF UNKNOWN USER USE MANUAL ACCESS
/
/
*/

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['CekUserLogin:2']], function () {
        route::get('/dashboard', [PenjualanController::class, 'index'])->name('index');
        // Route Tambah
        Route::view('/dashboard/tambah', 'sales.tambah');
        Route::post('/dashboard/tambah', [PenjualanController::class, 'store'])->name('store');

        // Route Edit
        Route::get('/dashboard/edit/{product_id}', [PenjualanController::class, 'show'])->name('show');
        Route::post('/dashboard/dashboard/edit/{product_id}', [PenjualanController::class, 'edit'])->name('edit');

        // Route Hapus
        Route::delete('/dashboard/delete/{product_id}', [PenjualanController::class, 'destroy'])->name('destroy');
    });
    /* END AUTH */
});