<h1 style="text-align:center">Toko Bangunan Sinar Mas</h1>
<hr>
{{-- $detail_transaksis
$transaksi --}}
<section class="first-section p-2 m-1">
    <h2>Detail Transaksi</h2>
    <h4>NOTA / ID Transaksi : {{ $transaksi->transaksi_id }}</h4>

    <table class="table" border="1">
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
    <br>
    <h5>Tanggal Cetak : {{ now() }}</h5>
</section>
