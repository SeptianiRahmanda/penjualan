@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Grafik Transaksi Penjualan</h4>

    <div class="card">
        <div class="card-body">
            <canvas id="chartTransaksi"></canvas>
        </div>
    </div>

    <a href="/transaksi" class="btn btn-secondary mt-3">
    Kembali
</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('chartTransaksi');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($labels) !!},
        datasets: [{
            label: 'Total Transaksi',
            data: {!! json_encode($totals) !!},
        }]
    },
});
</script>
@endsection
