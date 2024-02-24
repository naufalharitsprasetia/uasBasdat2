@extends('layouts.main')

@section('content')
    <section class="first-section p-3 m-3">
        <h1>Riwayat Transaksi</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">Kasir</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $transaksi->transaksi_id }}</td>
                        <td>{{ $transaksi->user->nama }}</td>
                        <td>{{ $transaksi->transaksi_created_at }}</td>
                        <td>
                            <a href="/detail-transaksi/{{ $transaksi->transaksi_id }}" class="badge bg-info "><i
                                    class="bi bi-eye"></i>Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
