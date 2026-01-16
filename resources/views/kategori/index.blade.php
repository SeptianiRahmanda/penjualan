@extends('layouts.app')

@section('title', 'Data Kategori')

@section('content')

<div class="card shadow">
    <div class="card-body">

        <h4 class="fw-bold mb-3">📂 Data Kategori</h4>

        <form action="/kategori" method="POST" class="mb-3">
            @csrf
            <div class="input-group">
                <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" required>
                <button class="btn btn-primary">Tambah</button>
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($kategori as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama_kategori }}</td>
                    <td>
                        <a href="/kategori/{{ $k->id }}/edit" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="/kategori/{{ $k->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus data?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>

@endsection
