<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
     public function penjualan()
    {
        $penjualans = Penjualan::with('details.produk')->get();

        $pdf = Pdf::loadView('laporan.penjualan', compact('penjualans'));
        return $pdf->download('laporan-penjualan.pdf');
    }
}
