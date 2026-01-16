<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>

<h3 align="center">LAPORAN PENJUALAN</h3>

<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Produk</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($penjualans as $p)
            @foreach($p->details as $d)
            <tr>
                <td>{{ $p->tanggal }}</td>
                <td>{{ $d->produk->nama_produk }}</td>
                <td>{{ $d->qty }}</td>
                <td>Rp {{ number_format($d->subtotal) }}</td>
            </tr>
            <a href="{{ route('laporan.penjualan') }}" class="btn btn-danger mb-3">
                Download PDF
            </a>
            @endforeach
        @endforeach
    </tbody>
</table>

</body>
</html>
