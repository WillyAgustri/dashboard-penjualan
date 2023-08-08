<?php

/*
TODO Nama function setiap controller masih kacau (hint: web.php, PenjualanController,LoginController)
   INFO: 1.Gunakan bahasa Inggris
   INFO: 2.huruf besar pada kalimat kedua (hint: addCart)
*/

use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;

/*
*PUBLIC ROUTE
EVERYONE CAN ACCESS IT EVEN IF THEY ACCES MANUAL.
*/

Route::view('/', 'ShopInterface.landing_home')->name('landing-page');
Route::get('/shop', [PenjualanController::class, 'showProduct'])->name('showProduct');

// Cart
Route::get('Cart', [CartController::class, 'showCart'])->name('cart');
Route::get('Cart/{product_id}', [CartController::class, 'tambah_ke_keranjang'])->name('add-cart');

Route::controller(LoginController::class)->group(function () {
    /*
     INFO:This is for Login
     */

    Route::get('Login', 'index')->name('user-login'); // login user
    Route::post('Login/verify', 'proses_login')->name('proses-user'); // Verify Login
    Route::view('Register', 'login.user_register')->name('register-user'); // register
    Route::post('Register/verify', 'store')->name('proses-user-register'); // verify register
    Route::get('logout', 'proses_logout')->name('user-logout'); // Logout
});
/* END PUBLIC ROUTE */

/*
*ROUTE WITH AUTH
ADMIN (HAS LOGIN) AUTH : 2
USER (HAS LOGIN) AUTH : 1
UNKNOWN USER WITHOUT LOGIN THEY WILL REDIRECT TO LOGIN IF UNKNOWN USER USE MANUAL ACCESS
/
/
*/

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['CekUserLogin:2']], function () {
        route::get('/dashboard', [PenjualanController::class, 'showDashboard'])->name('show-dashboard');
        // Route Tambah
        Route::view('/dashboard/tambah', 'sales.tambah');
        Route::post('/dashboard/tambah', [PenjualanController::class, 'store'])->name('store');

        // Route Edit
        Route::get('/dashboard/edit/{product_id}', [PenjualanController::class, 'edit'])->name('edit');
        Route::post('/dashboard/edit/{product_id}', [PenjualanController::class, 'proses_edit'])->name('proses-edit');

        // Route Hapus
        Route::delete('/dashboard/delete/{product_id}', [PenjualanController::class, 'destroy'])->name('destroy');
    });

    route::get('edit-akun', [LoginController::class, 'edit_akun'])->name('edit-akun');
    route::post('edit-akun/proses', [LoginController::class, 'proses_edit_akun'])->name('proses-edit-akun');
    Route::view('hapus-akun', 'login.user_hapus');

    Route::view('home', 'sales.home')->name('home');

    /* END AUTH */
});