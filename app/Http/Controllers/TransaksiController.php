<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
class TransaksiController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        $transaksi = Transaksi::with('produk')->get();
        return view('transaksi.index', compact('produk', 'transaksi'));
    }

    public function store(Request $request)
    {
        $produk = Produk::find($request->produk_id);
        $total = $produk->harga * $request->jumlah;

        Transaksi::create([
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'total' => $total
        ]);

        return redirect()->back();
    }
    public function exportExcel()
    {
        return Excel::download(
            new TransaksiExport,
            'laporan-transaksi.xlsx'
         );
    }
    public function chart()
{
    $data = \App\Models\Transaksi::selectRaw(
        'DATE(created_at) as tanggal, SUM(total) as total'
    )
    ->groupBy('tanggal')
    ->orderBy('tanggal')
    ->get();

    $labels = $data->pluck('tanggal');
    $totals = $data->pluck('total');

    return view('transaksi.chart', compact('labels', 'totals'));
}
public function exportPdf()
{
    $transaksis = Transaksi::all();

    $pdf = Pdf::loadView(
        'transaksi.pdf',
        compact('transaksis')
    );

    return $pdf->download('laporan-transaksi.pdf');
}

}
