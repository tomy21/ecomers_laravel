<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\EcomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataBarangController;
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
Route::get('/printKartu', [EcomController::class, 'printKartu']);

Route::get('/store', [UserController::class, 'store']);
Route::get('/loginProses', [UserController::class, 'loginProses']);
Route::get('/logout', [UserController::class, 'logout']);

Route::get('/admin/dashboard', [adminController::class, 'index'])->name('dashboard');
Route::get('/admin/dataBarang', [adminController::class, 'dataBarang']);
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
Route::GET('/admin', [adminController::class, 'loginAdmin'])->name('login');
Route::POST('/admin/loginAdminProses', [adminController::class, 'loginAdminProses'])->name('admin.login');


Route::POST('/admin/tambahData', [DataBarangController::class, 'store']);
Route::PUT('/admin/tambahData/{id}', [DataBarangController::class, 'update']);
Route::get('/admin/{id}/edit', [DataBarangController::class, 'edit']);
Route::DELETE('/admin/delete/{id}', [DataBarangController::class, 'destroy']);

