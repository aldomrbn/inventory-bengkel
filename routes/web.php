<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SparepartController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/', [SparepartController::class, 'index'])->name('spareparts.index');
    Route::get('/spareparts/create', [SparepartController::class, 'create'])->name('spareparts.create');
    Route::post('/spareparts', [SparepartController::class, 'store'])->name('spareparts.store');

    Route::get('/transaksi', [SparepartController::class, 'transactionForm'])->name('spareparts.transaksi.form');
    Route::post('/transaksi', [SparepartController::class, 'storeTransaction'])->name('spareparts.transaksi.store');

    // Jika ada akses lama ke /riwayat, arahkan langsung ke /transaksi
    Route::redirect('/riwayat', '/transaksi')->name('spareparts.riwayat');

    Route::get('/profil', [AuthController::class, 'profile'])->name('admin.profile');
    Route::put('/profil', [AuthController::class, 'updateProfile'])->name('admin.profile.update');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});