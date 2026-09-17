<?php

//Langkah 1: Membuat Route Dasar untuk Aplikasi POS

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanPenjualanController;


// Rute untuk Halaman Utama / Dashboard POS
Route::get('/', function () {     return '<h1>Selamat Datang di Dashboard POS Toko Kelontong</h1>'; });
// Rute dengan Parameter Wajib (Melihat detail produk berdasarkan ID)
Route::get('/produk/{id}', function ($id) {     return 'Menampilkan data produk dengan ID: ' . $id; });
// Rute dengan Parameter Opsional (Mencari produk berdasarkan nama)
Route::get('/produk/cari/{nama?}', function ($nama = null) {     if ($nama) {         return 'Hasil pencarian produk: ' . $nama;
    }     return 'Silakan masukkan kata kunci pencarian pada URL
    (contoh: /produk/cari/sabun)';
});

Route::get('/', function () {
    // Mengirim data ke view menggunakan array asosiatif
    return view('dashboard_pos', [
        'nama_pegawai' => 'Budi Santoso',
        'shift' => 'Pagi (08:00 - 15:00)'
    ]);
});

//Langkah 2: Mengelompokkan Rute Menggunakan Route Groups & Prefix

// Group Rute untuk Fitur Admin (Manajemen Data)
Route::prefix('admin')->group(function () {
    Route::get('/produk', function () {         return 'Halaman Kelola Produk (Hanya Admin)';     })->name('admin.produk');
    Route::get('/kategori', function () {         return 'Halaman Kelola Kategori Produk (Hanya Admin)';
    })->name('admin.kategori');
});
// Group Rute untuk Fitur Kasir (Transaksi)
Route::prefix('kasir')->group(function () {
    Route::get('/transaksi', function () {         return 'Halaman Input Transaksi Penjualan (Kasir)';
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

// Group Rute untuk Fitur Admin (Manajemen Data)
Route::prefix('admin')->group(function () {
    Route::get('/produk', function () {         return 'Halaman Kelola Produk (Hanya Admin)';     })->name('admin.produk');
    Route::get('/kategori', function () {         return 'Halaman Kelola Kategori Produk (Hanya Admin)';
    })->name('admin.kategori');
});
// Group Rute untuk Fitur Kasir (Transaksi)
Route::prefix('kasir')->group(function () {
    Route::get('/transaksi', function () {         return 'Halaman Input Transaksi Penjualan (Kasir)';
    })->name('kasir.transaksi');
});

Route::get('/', function () {
 return view('welcome');
});
// Routing menuju Controller
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);

// Routing menuju Controller Laporan Penjualan
Route::get('/laporan', LaporanPenjualanController::class)->name('laporan');
Route::get('/laporan/penjualan', LaporanPenjualanController::class)->name('laporan.penjualan');
