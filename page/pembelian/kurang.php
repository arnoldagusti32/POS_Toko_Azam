<?php
$id = $_GET['id'];
$kode_bl = $_GET['kode_bl'];
$harga_beli = $_GET['harga_beli'];
$kode_barcode = $_GET['kode_barcode'];

$sql = $koneksi->query("UPDATE tb_pembelian SET jumlah=(jumlah-1) WHERE id='$id'");
$sql1 = $koneksi->query("UPDATE tb_pembelian SET total=(total-$harga_beli) WHERE id='$id'");
$sql2 = $koneksi->query("UPDATE tb_barang SET stok=(stok-1) WHERE kode_barcode='$kode_barcode'");

if ($sql || $sql1 || $sql2) {
?>
    <script>
        window.location.href = "?page=pembelian&kodebl=<?php echo $kode_bl ?>";
    </script>
<?php
}
?>