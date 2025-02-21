<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

// home penguna
Route::get('/inventaris/search', [InventarisController::class, 'search']);

Route::get('/', [HomeController::class, 'index'])->name('home');
// peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'create'])->name('peminjaman.index');
Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');

// route admin inventaris
    // inventaris admin
        // AUTH admin
        Route::get('/auth/admin', [AuthController::class, 'login'])->name('login');
        Route::post('/auth/admin', [AuthController::class, 'postLogin'])->name('admin.authenticate');
        
        // Menampilkan daftar inventaris
        Route::prefix('admin')->middleware('auth')->group(function () {
            // Inventaris routes

            // pake resource we mun 1 controller mah
            Route::resource('inventaris', InventarisController::class);
        
            // Peminjaman routes
            Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('admin.peminjaman.index');
            Route::put('/peminjaman/update/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.updateStatus');
            Route::delete('/admin/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
        });
    // end inventaris admin
 // end route admin