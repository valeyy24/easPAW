<?php

namespace App\Http\Controllers;
use App\Models\penjualan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // app/Http/Controllers/LaporanController.php
public function harian()
{
    $penjualans = Penjualan::whereDate('sale_date', now())->get();
    return view('laporan.harian', compact('penjualans'));
}

public function bulanan()
{
    $penjualans = Penjualan::whereMonth('sale_date', now()->month)->get();
    return view('laporan.bulanan', compact('penjualans'));
}

public function tahunan()
{
    $penjualans = Penjualan::whereYear('sale_date', now()->year)->get();
    return view('laporan.tahunan', compact('penjualans'));
}

}
