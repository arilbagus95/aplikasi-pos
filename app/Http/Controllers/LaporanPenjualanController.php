<?php

namespace App\Http\Controllers;

class LaporanPenjualanController extends Controller
{
    public function __invoke()
    {
        $statistik = [
            ['barang' => 'Total Penjualan', 'nilai' => 'Rp 100.000.000'],
            ['barang' => 'Transaksi Selesai', 'nilai' => '100 transaksi'],
            ['barang' => 'Produk Terjual', 'nilai' => '100 produk'],
            ['barang' => 'Rata-rata Transaksi', 'nilai' => 'Rp 1000.000'],
        ];

        return view('laporan.penjualan', compact('statistik'));
    }
}
