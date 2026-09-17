<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanPenjualanController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Rute dengan Parameter Opsional (Mencari produk berdasarkan nama)
Route::get('/produk/cari/{nama?}', function ($nama = null) {
    if ($nama) {
        return 'Hasil pencarian produk: ' . $nama;
    }

    return 'Silakan masukkan kata kunci pencarian pada URL (contoh: /produk/cari/sabun)';
});

// Group Rute untuk Fitur Admin (Manajemen Data)
Route::prefix('admin')->group(function () {
    Route::get('/produk', function () {
        return 'Halaman Kelola Produk (Hanya Admin)';
    })->name('admin.produk');

    Route::get('/kategori', function () {
        return 'Halaman Kelola Kategori Produk (Hanya Admin)';
    })->name('admin.kategori');
});

// Group Rute untuk Fitur Kasir (Transaksi)
Route::prefix('kasir')->group(function () {
    Route::get('/transaksi', function () {
        return 'Halaman Input Transaksi Penjualan (Kasir)';
    })->name('kasir.transaksi');
});

Route::get('/produk-toko', function () {
    $produk = [
        [
            'nama' => 'Beras Premium 5 Kg',
            'sku' => 'BRG-001',
            'harga' => 75000,
            'foto' => 'beras.jpg',
            'stok' => 25,
        ],
        [
            'nama' => 'Minyak Goreng 1 Liter',
            'sku' => 'MNY-002',
            'harga' => 18000,
            'foto' => 'minyak-goreng.jpg',
            'stok' => 40,
        ],
        [
            'nama' => 'Gula Pasir 1 Kg',
            'sku' => 'GUL-003',
            'harga' => 16000,
            'foto' => 'gula.jpg',
            'stok' => 30,
        ],
    ];

    return view('daftar_produk', compact('produk'));
});

// Routing menuju Controller
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);

// Routing menuju Controller Laporan Penjualan
Route::get('/laporan', LaporanPenjualanController::class)->name('laporan');
Route::get('/laporan/penjualan', LaporanPenjualanController::class)->name('laporan.penjualan');
