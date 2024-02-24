@extends('layouts.main')

@section('content')
    <section class="first-section p-3 m-3">
        <a href="/detail-transaksi" class="btn btn-warning">kembali</a>
        <h1>Detail Transaksi</h1>
        <h6>ID Transaksi : {{ $transaksi->transaksi_id }}</h6>
        <a href="/print-transaksi/{{ $transaksi->transaksi_id }}" class="btn btn-primary">Print Invoice</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total_barang = 0;
                    $total_semua = 0;
                @endphp
                @foreach ($detail_transaksis as $detail_transaksi)
                    @php
                        $total_barang += $detail_transaksi->detail_transaksi_jumlah;
                        $total_semua += $detail_transaksi->total;
                    @endphp
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $detail_transaksi->barang_nama }}</td>
                        <td>Rp. {{ number_format($detail_transaksi->barang_harga, 0, ',', '.') }}</td>
                        <td>{{ $detail_transaksi->detail_transaksi_jumlah }}</td>
                        <td>Rp. {{ number_format($detail_transaksi->total, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total</td>
                    <td>{{ $total_barang }}</td>
                    <td>Rp. {{ number_format($total_semua, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </section>
@endsection
