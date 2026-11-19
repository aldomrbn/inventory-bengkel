<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\AuthController;

// Route Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route yang hanya bisa diakses setelah login (Middleware Auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/', [SparepartController::class, 'index'])->name('spareparts.index');
    Route::get('/tambah', [SparepartController::class, 'create'])->name('spareparts.create');
    Route::post('/tambah', [SparepartController::class, 'store'])->name('spareparts.store');
    Route::get('/transaksi', [SparepartController::class, 'transactionForm'])->name('spareparts.transaksi.form');
    Route::post('/transaksi', [SparepartController::class, 'storeTransaction'])->name('spareparts.transaksi.store');
    Route::get('/riwayat', [SparepartController::class, 'history'])->name('spareparts.riwayat');
});