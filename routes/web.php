<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriPengaduanController;

Route::get('/', function () {
    return view('welcome');
});

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
});
