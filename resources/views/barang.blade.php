@extends('layouts.main')

@section('content')
    <section class="first-section p-3 m-3">
        <h6><a href="/" class="text-decoration-none">/ Home </a> / Barang</h6>
        <h1>Data Barang</h1>
        <h4>Total Barang : @php
            echo $total[0]->{"count(*)"};
        @endphp</h4>
        <form class="row g-3 my-2">
            <div class="col-auto">
                <label for="staticEmail2" class="visually-hidden">Search</label>
                <label class="form-control-plaintext">Cari Barang</label>
            </div>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Barang</label>
                <input type="text" class="form-control" id="search-barang" name="nama" value="{{ request('nama') }}"
                    placeholder="Nama Barang">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Cari !</button>
            </div>
        </form>
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-12" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <a href="/create-barang" class="btn btn-success">Create Barang</a>
        <br>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $barang)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $barang->barang_nama }}</td>
                        <td>Rp. {{ number_format($barang->barang_harga, 0, ',', '.') }}</td>
                        <td>{{ $barang->barang_stok }}</td>
                        <td>
                            {{-- <a href="/detail-barang/{{ $barang->barang_id }}" class="badge bg-info "><i
                                    class="bi bi-eye"></i>Detail</a> --}}
                            <a href="/edit-barang/{{ $barang->barang_id }}" class="badge bg-warning "><i
                                    class="bi bi-pencil"></i> Edit</a>
                            <form action="/delete-latihan/{{ $barang->barang_id }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you Sure?')"><i
                                        class="bi bi-x-circle"></i> Delete</button>
                            </form>
                        </td>
                        <td>{{ $barang->barang_created_at }}</td>
                        <td>{{ $barang->barang_updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                {{ $barangs->links() }}
            </ul>
        </nav>
    </section>
@endsection
