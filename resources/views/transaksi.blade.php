@extends('layouts.main')

@section('content')
    @php
        use App\Models\Barang;
    @endphp
    <section class="first-section p-3 m-3">
        <h1>Transaksi</h1>
        <hr>
        <h3>Kasir</h3>
        <label for="">Cari Barang</label>
        <input type="text" placeholder="Masukkan Nama Barang" autocomplete="off" autofocus id="keyword" name="keyword">
        <button class="btn btn-info" type="submit" name="cari" id="tombol-cari" style="display: none">Cari</button>
        <br>
        <br>
        <div class="input-group">
            <select class="form-select" id="contoh" name="barang_id">
                <option selected>Pilih</option>
                {{-- Tampilkan Barang sesuai keyUp --}}
            </select>
            <button class="btn btn-primary" type="submit" id="tambah">Tambahkan</button>
        </div>
        <hr>
        <h4>List transaksi barang</h4>
        <form action="/transaksi" method="post">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga Satuan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tabel-body">
                    {{-- <tr>
                        <th scope="row">1</th>
                        <td><input type="text" readonly></td>
                        <td><input type="text" readonly></td>
                        <td><input type="text" placeholder="jumlah"></td>
                    </tr> --}}
                </tbody>
            </table>
            <h6>Total Transaksi Rp.<span id="total-harga">0,-</span></h6>
            <button type="submit" class="btn btn-success">Simpan Transaksi</button>
        </form>
    </section>
    <script>
        const tombolTambah = document.getElementById("tambah");
        const tabelBody = document.getElementById("tabel-body");
        // Menambahkan event listener untuk perubahan nilai pada input dengan name "jumlah[]"
        $(document).on('change', '.jumlah-barang', function() {
            updateTotalHarga();
        });

        // Fungsi untuk mengupdate total harga
        function updateTotalHarga() {
            if ($("#tabel-body").find("tr").length > 0) {
                var total = 0;

                // Iterasi melalui setiap input dengan name yang sesuai pola
                $('[name^="barang_harga["]').each(function(index) {
                    var harga = parseFloat($(this).val()) || 0;

                    // Mengambil nilai jumlah dari input dengan nama yang sesuai
                    var jumlah = parseFloat($('[name^="detail_transaksi_jumlah["]').eq(index).val()) || 0;

                    // Menghitung total harga
                    total += harga * jumlah;
                });

                // Memperbarui elemen dengan id "total-harga"
                $('#total-harga').text(total);
            }
        }

        $(document).ready(function() {
            // Tombol Tambah
            $("#tambah").click(function() {
                var selectedValue = $("#contoh").val();
                // AJAX
                console.log(selectedValue);
                if (selectedValue == "Pilih" || selectedValue == null) {
                    alert('Isi Barang Terlebih Dahulu');
                    exit;
                }
                $(document).ready(function() {
                    var loadedHTML;

                    $.ajax({
                        url: "/ajax/option.php?id=" + selectedValue,
                        method: "GET",
                        dataType: "html",
                        success: function(response) {
                            // Callback yang dijalankan jika pembebanan berhasil
                            loadedHTML = response;
                            // Menambahkan HTML ke dalam elemen target dengan menggunakan .append()
                            // MENAMBAHKAN NAME PADA TIAP INPUT dengan tambahan id/nomer yg berbeda tiap baris
                            // var rowIndex = $("tr").length;
                            // console.log(rowIndex);
                            // loadedHTML.find("input").each(function() {
                            //     var currentName = $(this).attr("name");
                            //     var newName = currentName.replace("[1]",
                            //         `[${rowIndex-12}]`);
                            //     $(this).attr("name", newName);
                            // });
                            // 
                            $("#tabel-body").append(loadedHTML);
                            updateTotalHarga();
                        },
                        error: function(xhr, status, error) {
                            // Callback yang dijalankan jika terjadi kesalahan
                            console.error("Terjadi kesalahan:", error);
                        }
                    });
                });

            });
        });
    </script>
@endsection
