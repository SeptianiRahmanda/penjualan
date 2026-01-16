@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card shadow">
            <div class="card-body">

                <h4 class="text-center fw-bold mb-3">✏️ Edit Kategori</h4>

                <form action="/kategori/{{ $kategori->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input
                        type="text"
                        name="nama_kategori"
                        class="form-control mb-3"
                        value="{{ $kategori->nama_kategori }}"
                        required
                    >

                    <button class="btn btn-primary w-100">
                        Update
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection
