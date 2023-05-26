<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\EcomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\GaleryController;
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

Route::get('/', [EcomController::class, 'index']);
Route::get('/galery', [EcomController::class, 'galery']);
Route::get('/kontak_kami', [EcomController::class, 'kontakKami']);
Route::get('/karir', [EcomController::class, 'karir']);
Route::get('/kartuMamber', [EcomController::class, 'mamber']);
Route::get('/printKartu', [EcomController::class, 'printKartu'])->middleware('auth');

Route::get('/store', [UserController::class, 'store']);
Route::get('/loginProses', [UserController::class, 'loginProses']);
Route::get('/logout', [UserController::class, 'logout']);

Route::get('/admin/dashboard', [adminController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/admin/dataBarang', [adminController::class, 'dataBarang'])->name('admin.dataBarang')->middleware('auth');
Route::get('/admin/tambahBarang', [adminController::class, 'tambahBarang'])->middleware('auth');
Route::get('/admin/laporanBarang', [adminController::class, 'laporan'])->middleware('auth');

Route::get('/admin/user', [adminController::class, 'user'])->name('admin.user')->middleware('auth');
Route::get('/admin/user/tambahKaryawanModal', [adminController::class, 'tambahKaryawanModal']);
Route::POST('/admin/user/tambahKaryawan', [adminController::class, 'tambahKaryawan'])->name('admin.tambahKaryawan');
Route::get('/admin/{id}/editKaryawanModal', [adminController::class, 'editKaryawanModal']);
Route::PUT('/admin/updateKaryawan/{id}', [adminController::class, 'updateKaryawan']);
Route::DELETE('/admin/deleteKaryawan/{id}', [adminController::class, 'deleteKaryawan']);
Route::GET('/admin/{id}/editMamberModal', [adminController::class, 'editMamberModal']);
Route::PUT('/admin/updateMamber/{id}', [adminController::class, 'updateMamber']);

Route::GET('/admin', [adminController::class, 'loginAdmin'])->name('admin.login');
Route::POST('/admin/loginAdminProses', [adminController::class, 'loginAdminProses'])->name('admin.proseslogin')->middleware('guest');
Route::POST('/logoutAdmin', [adminController::class, 'logoutAdmin'])->name('logout');


Route::POST('/admin/tambahData', [DataBarangController::class, 'store'])->name('admin.tambahDataBarang')->middleware('auth');
Route::PUT('/admin/tambahData/{id}', [DataBarangController::class, 'update'])->name('admin.updateData')->middleware('auth');
Route::get('/admin/{id}/edit', [DataBarangController::class, 'edit'])->name('admin.showModal')->middleware('auth');
Route::DELETE('/admin/delete/{id}', [DataBarangController::class, 'destroy'])->middleware('auth');


Route::GET('/admin/galery', [GaleryController::class, 'index'])->name('admin.galery')->middleware('auth');
Route::GET('/admin/{id}/galery', [GaleryController::class, 'show'])->name('admin.galeryShow')->middleware('auth');
Route::GET('/admin/galery/modalTambah', [GaleryController::class, 'modalTambah'])->name('admin.galeryModalAdd')->middleware('auth');
Route::GET('/admin/galery/modalEdit', [GaleryController::class, 'modalEdit'])->name('admin.galeryModalEdit')->middleware('auth');
Route::POST('/admin/galery', [GaleryController::class, 'add'])->name('admin.galeryAdd')->middleware('auth');
Route::PUT('/admin/galery/update/{id}', [GaleryController::class, 'update'])->name('admin.galeryUpdate')->middleware('auth');
Route::DELETE('/admin/galery/delete/{id}', [GaleryController::class, 'destroy'])->name('admin.galeryDelete')->middleware('auth');

