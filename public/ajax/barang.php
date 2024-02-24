       <?php

        use App\Models\Barang;

        $conn = mysqli_connect("localhost", "root", "", "uas_basdat2");

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
        $keyword = $_GET['keyword'];
        $queries = "SELECT * FROM barangs WHERE barang_nama LIKE '%$keyword%'";
        $barangs = kueri($queries);
        ?>
       <script>
           console.log($barangs);
       </script>
       <?php if (count($barangs) > 0) : ?>
           <option disabled selected>Klik Untuk Melihat Hasil</option>
           <?php foreach ($barangs as $barang) : ?>
               <option value="<?= $barang['barang_id'] ?>"><?= $barang['barang_nama'] ?></option>
           <?php endforeach ?>
       <?php else : ?>
           <option disabled selected>Tidak ada hasil yang ditemukan !!</option>
       <?php endif; ?>