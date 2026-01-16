@extends('layouts.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-warning">
        <h5 class="mb-0">Edit Produk</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('produk.update', $produk->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk"
                       class="form-control"
                       value="{{ $produk->nama_produk }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori_id" class="form-select">
                    @foreach ($kategoris as $k)
                        <option value="{{ $k->id }}"
                            {{ $produk->kategori_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="harga"
                       class="form-control"
                       value="{{ $produk->harga }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok"
                       class="form-control"
                       value="{{ $produk->stok }}" required>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('produk.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <button class="btn btn-warning">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection
