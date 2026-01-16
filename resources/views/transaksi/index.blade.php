@extends('layouts.app')

@section('title', 'Transaksi Penjualan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card shadow mb-4">
            <div class="card-body">
                <h4 class="text-center fw-bold text-success mb-3">
                    🧾 Transaksi Penjualan
                </h4>

                <form action="/transaksi" method="POST" class="row g-2">
                    @csrf
                    <div class="col-md-5">
                        <select name="produk_id" class="form-select" required>
                            <option value="">-- Pilih Produk --</option>
                            @foreach ($produk as $p)
                                <option value="{{ $p->id }}">
                                    {{ $p->nama_produk }} - Rp {{ number_format($p->harga) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-success w-100 fw-bold">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <a href="{{ route('transaksi.export.excel') }}"
                    class="btn btn-success mb-3">
                        Export Excel
                </a>
                <a href="{{ route('transaksi.chart') }}" 
                        class="btn btn-info mb-3">
                            Lihat Grafik
                </a>
                <a href="{{ route('transaksi.export.pdf') }}"
                    class="btn btn-danger mb-3">
                        Export PDF
                </a>
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $t)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $t->produk->nama_produk }}</td>
                            <td>{{ $t->jumlah }}</td>
                            <td class="text-end">
                                Rp {{ number_format($t->total, 0, ',', '.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
