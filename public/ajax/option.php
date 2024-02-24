       <?php
        $conn = mysqli_connect("localhost", "root", "", "uas_basdat2");
        $id = $_GET['id'];

        function kueri($query)
        {
            global $conn;
            $result = mysqli_query($conn, $query);
            $rows = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            return $rows;
        }
        $queries = "SELECT * FROM barangs WHERE barang_id = '$id'";
        $barang = kueri($queries);
        ?>
       <tr>
           <input type="hidden" name="detail_transaksi_barang_id[]" value="<?= $barang[0]['barang_id'] ?>">
           <th scope="row">1</th>
           <td><input type="text" readonly name="barang_nama[]" value="<?= $barang[0]['barang_nama'] ?>"></td>
           <td><input type="text" readonly name="barang_harga[]" value="<?= $barang[0]['barang_harga'] ?>"></td>
           <td><input type="text" placeholder="jumlah" name="detail_transaksi_jumlah[]" class="jumlah-barang" value="1" required></td>
           <td><button type='button' class='btn btn-danger delete-button'>Hapus</button></td>
           <script>
               $('.delete-button').click(function() {
                   var konfirmasi = confirm("Apakah Anda yakin ingin menghapus barang?");

                   // Memeriksa hasil konfirmasi
                   if (konfirmasi) {
                       // Jika pengguna menekan OK, lakukan tindakan penghapusan
                       $(this).closest("tr").remove(); // Hapus baris saat tombol Hapus diklik
                       alert("Barang dihapus!");
                       // ... tambahkan logika penghapusan barang di sini ...
                   } else {
                       // Jika pengguna menekan Batal, tidak lakukan apa-apa
                       alert("Penghapusan dibatalkan.");
                   }
               });
               $("#tabel-body").append(deleteButton);
           </script>
       </tr>