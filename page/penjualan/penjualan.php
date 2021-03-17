<?php
$kode = $_GET['kodepj'];

?>


<div class="row clearfix">
    <div class="body">
        <form method="POST">

            <div class="col-md-2">
                <input type="text" name="kode" value="<?php echo $kode; ?>" class="form-control" readonly />
            </div>

            <div class="col-md-2">
                <input type="text" name="kode_barcode" class="form-control" autofocus />
            </div>

            <div class="col-md-2">
                <input type="submit" name="simpan" value="Tambahkan" class="btn btn-primary">
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['simpan'])) {
        $date = date("Y-m-d");
        $kd_pj = $_POST['kode'];
        $barcode = $_POST['kode_barcode'];
        $barang = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode='$barcode'");
        $data_barang = $barang->fetch_assoc();
        $harga_jual = $data_barang['harga_jual'];
        $jumlah = 1;
        $total = $jumlah * $harga_jual;
        $barang2 = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode='$barcode'");

        while ($data_barang2 = $barang2->fetch_assoc()) {
            $sisa = $data_barang2['stok'];

            if ($sisa == 0) {
    ?>
                <script type="text/javascript">
                    alert("Stock Barang Habis.. Tidak Dapat melakukan penjualan");
                    window.location.href = "?page=penjualan&kodepj=<?php echo $kode; ?>"
                </script>
    <?php
            } else {

                $koneksi->query("INSERT INTO tb_penjualan (kode_penjualan, kode_barcode, jumlah, total, tgl_penjualan)VALUES('$kd_pj', '$barcode', '$jumlah', '$total', '$date')");
            }
        }
    }
    ?>