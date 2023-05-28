<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\EcomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\GaleryController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/storage', function () {
    Artisan::call('storage:link');
});

Route::GET('/admin', [adminController::class, 'loginAdmin'])->name('admin.login');
Route::POST('/admin/loginAdminProses', [adminController::class, 'loginAdminProses'])->name('admin.proseslogin');

Route::middleware(['adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [adminController::class, 'index'])->name('dashboard');
    Route::get('/admin/dataBarang', [adminController::class, 'dataBarang'])->name('admin.dataBarang');
    Route::get('/admin/tambahBarang', [adminController::class, 'tambahBarang']);
    Route::get('/admin/laporanBarang', [adminController::class, 'laporan']);
    Route::get('/admin/user', [adminController::class, 'user'])->name('admin.user');
    Route::get('/admin/user/tambahKaryawanModal', [adminController::class, 'tambahKaryawanModal']);
    Route::POST('/admin/user/tambahKaryawan', [adminController::class, 'tambahKaryawan'])->name('admin.tambahKaryawan');
    Route::get('/admin/{id}/editKaryawanModal', [adminController::class, 'editKaryawanModal']);
    Route::PUT('/admin/updateKaryawan/{id}', [adminController::class, 'updateKaryawan']);
    Route::DELETE('/admin/deleteKaryawan/{id}', [adminController::class, 'deleteKaryawan']);
    Route::GET('/admin/{id}/editMamberModal', [adminController::class, 'editMamberModal']);
    Route::PUT('/admin/updateMamber/{id}', [adminController::class, 'updateMamber']);
    Route::POST('/logoutAdmin', [adminController::class, 'logoutAdmin'])->name('logout');
    Route::POST('/admin/tambahData', [DataBarangController::class, 'store'])->name('admin.tambahDataBarang');
    Route::PUT('/admin/tambahData/{id}', [DataBarangController::class, 'update'])->name('admin.updateData');
    Route::get('/admin/{id}/edit', [DataBarangController::class, 'edit'])->name('admin.showModal');
    Route::DELETE('/admin/delete/{id}', [DataBarangController::class, 'destroy']);
    Route::GET('/admin/galery', [GaleryController::class, 'index'])->name('admin.galery');
    Route::GET('/admin/{id}/galery', [GaleryController::class, 'show'])->name('admin.galeryShow');
    Route::GET('/admin/galery/modalTambah', [GaleryController::class, 'modalTambah'])->name('admin.galeryModalAdd');
    Route::GET('/admin/galery/modalEdit', [GaleryController::class, 'modalEdit'])->name('admin.galeryModalEdit');
    Route::POST('/admin/galery', [GaleryController::class, 'add'])->name('admin.galeryAdd');
    Route::PUT('/admin/galery/update/{id}', [GaleryController::class, 'update'])->name('admin.galeryUpdate');
    Route::DELETE('/admin/galery/delete/{id}', [GaleryController::class, 'destroy'])->name('admin.galeryDelete');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/galery', [EcomController::class, 'galery']);
    Route::get('/kontak_kami', [EcomController::class, 'kontakKami']);
    Route::get('/karir', [EcomController::class, 'karir']);
    Route::get('/kartuMamber', [EcomController::class, 'mamber']);
    Route::get('/printKartu', [EcomController::class, 'printKartu']);
    Route::get('/store', [UserController::class, 'store']);
    Route::get('/loginProses', [UserController::class, 'loginProses']);
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/', [EcomController::class, 'index'])->name('pelanggan');
});
