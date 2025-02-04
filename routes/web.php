<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

// home penguna
Route::get('/', [HomeController::class, 'index'])->name('home');
// peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'create'])->name('peminjaman.index');
Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');

// route admin inventaris
    // inventaris admin
        // AUTH admin
        Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');
        Route::post('/admin/login', [AuthController::class, 'postLogin'])->name('admin.authenticate');
        
        // Menampilkan daftar inventaris
        Route::get('/admin/inventaris', [InventarisController::class, 'index'])->name('admin.inventaris.index');

        // Menampilkan form untuk membuat inventaris baru
        Route::get('/admin/inventaris/create', [InventarisController::class, 'create'])->name('admin.inventaris.create');
        // Menyimpan data inventaris baru
        Route::post('/admin/inventaris', [InventarisController::class, 'store'])->name('admin.inventaris.store');
        // Menampilkan detail inventaris tertentu
        Route::get('/admin/inventaris/{inventaris}', [InventarisController::class, 'show'])->name('admin.inventaris.show');
        // Menampilkan form untuk mengedit inventaris
        Route::get('/admin/inventaris/{inventaris}/edit', [InventarisController::class, 'edit'])->name('admin.inventaris.edit');
        // Memperbarui data inventaris
        Route::put('/admin/inventaris/{inventaris}', [InventarisController::class, 'update'])->name('admin.inventaris.update');
        // Menghapus inventaris
        Route::delete('/admin/inventaris/{inventaris}', [InventarisController::class, 'destroy'])->name('admin.inventaris.destroy');
        // peminjaman admin
        Route::get('/admin/peminjaman', [PeminjamanController::class, 'index'])->name('admin.peminjaman.index');
    // end inventaris admin
 // end route admin