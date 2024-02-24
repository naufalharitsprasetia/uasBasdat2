@extends('layouts.main')

@section('content')
    <section class="first-section p-3 m-3">
        <h6><a href="/" class="text-decoration-none">/ Home / </a> <a href="/barang" class="text-decoration-none"> Barang
            </a> / Create Data Barang</h6>
        <h1>Create Barang</h1>
        <hr>
        <form method="post" action="/create-barang">
            @csrf
            @method('post')
            <div class="mb-3">
                {{--  --}}

                <label for="barang_nama" class="form-label">Nama Barang</label>
                <input type="text" class="form-control @error('barang_nama') is-invalid @enderror" id="barang_nama"
                    name="barang_nama" placeholder="Nama Barang" value="{{ old('barang_nama') }}">
                @error('barang_nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                {{--  --}}
                <br>
                <label for="barang_harga" class="form-label">Harga</label>
                <input type="number" class="form-control @error('barang_harga') is-invalid @enderror" id="barang_harga"
                    name="barang_harga" placeholder="Nama Barang" value="{{ old('barang_harga') }}">
                @error('barang_harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                {{--  --}}
                <br>
                <label for="barang_stok" class="form-label">Stok</label>
                <input type="number" class="form-control @error('barang_stok') is-invalid @enderror" id="barang_stok"
                    name="barang_stok" placeholder="Nama Barang" value="{{ old('barang_stok') }}">
                @error('barang_stok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                {{--  --}}
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </section>
@endsection
