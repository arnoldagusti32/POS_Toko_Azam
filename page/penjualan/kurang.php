<?php
$id = $_GET['id'];
$kode_pj = $_GET['kode_pj'];
$harga_jual = $_GET['harga_jual'];
$kode_barcode = $_GET['kode_barcode'];

$sql = $koneksi->query("UPDATE tb_penjualan SET jumlah=(jumlah-1) WHERE id='$id'");
$sql1 = $koneksi->query("UPDATE tb_penjualan SET total=(total-$harga_jual) WHERE id='$id'");
$sql2 = $koneksi->query("UPDATE tb_barang SET stok=(stok+1) WHERE kode_barcode='$kode_barcode'");

if ($sql || $sql1 || $sql2) {
?>
    <script>
        window.location.href = "?page=penjualan&kodepj=<?php echo $kode_pj ?>";
    </script>
<?php
}
?>