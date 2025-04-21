<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\KategoriPengaduanController;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/', [SaranController::class, 'storeUser'])->name('saran.store');
Route::post('/home', [PengaduanController::class, 'storeUser'])->name('pengaduan.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.index');

    Route::get('manage-user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('manage-user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('manage-user', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('manage-user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('manage-user/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('manage-user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    Route::get('kategori-pengaduan', [KategoriPengaduanController::class, 'index'])->name('admin.kategoriPengaduan.index');
    Route::get('kategori-pengaduan/create', [KategoriPengaduanController::class, 'create'])->name('admin.kategoriPengaduan.create');
    Route::post('kategori-pengaduan', [KategoriPengaduanController::class, 'store'])->name('admin.kategoriPengaduan.store');
    Route::get('kategori-pengaduan/edit/{slug}', [kategoriPengaduanController::class, 'edit'])->name('admin.kategoriPengaduan.edit');
    Route::put('kategori-pengaduan/{slug}', [kategoriPengaduanController::class, 'update'])->name('admin.kategoriPengaduan.update');
    Route::delete('kategori-pengaduan/{id}', [KategoriPengaduanController::class, 'destroy'])->name('admin.kategoriPengaduan.destroy');

    Route::get('saran', [SaranController::class, 'index'])->name('admin.saran.index');
    Route::get('saran/create', [SaranController::class, 'create'])->name('admin.saran.create');
    Route::post('saran', [SaranController::class, 'store'])->name('admin.saran.store');
    Route::delete('saran/{id}', [SaranController::class, 'destroy'])->name('admin.saran.destroy');

    Route::get('petugas', [PetugasController::class, 'index'])->name('admin.petugas.index');
    Route::get('petugas/create', [PetugasController::class, 'create'])->name('admin.petugas.create');
    Route::post('petugas', [PetugasController::class, 'store'])->name('admin.petugas.store');
    Route::get('petugas/edit/{id}', [PetugasController::class, 'edit'])->name('admin.petugas.edit');
    Route::put('petugas/{id}', [PetugasController::class, 'update'])->name('admin.petugas.update');
    Route::delete('petugas/{id}', [PetugasController::class, 'destroy'])->name('admin.petugas.destroy');

    Route::get('pengaduan', [PengaduanController::class, 'index'])->name('admin.pengaduan.index');
    Route::get('pengaduan/create', [PengaduanController::class, 'create'])->name('admin.pengaduan.create');
    Route::post('pengaduan', [PengaduanController::class, 'store'])->name('admin.pengaduan.store');
    Route::get('pengaduan/edit/{slug}', [PengaduanController::class, 'edit'])->name('admin.pengaduan.edit');
    Route::put('pengaduan/{slug}', [PengaduanController::class, 'update'])->name('admin.pengaduan.update');
    Route::delete('pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('admin.pengaduan.destroy');
});
