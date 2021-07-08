<?php
$jumlah = $_GET['jumlah'];
$id = $_GET['id'];
$kode_bl = $_GET['kode_bl'];
$harga_beli = $_GET['harga_beli'];
$kode_barcode = $_GET['kode_barcode'];

$sql = $koneksi->query("DELETE FROM tb_pembelian WHERE id='$id'");
$sql2 = $koneksi->query("UPDATE tb_barang SET stok=(stok-$jumlah) WHERE kode_barcode='$kode_barcode'");

if ($sql || $sql1 || $sql2) {
?>
    <script>
        window.location.href = "?page=pembelian&kodebl=<?php echo $kode_bl ?>";
    </script>
<?php
} else {
?>
    <script type="text/javascript">
        alert("Gagal !");
        window.location.href = "?page=pembelian&kodebl=<?php echo $kode_bl ?>";
    </script>

<?php
}
?>