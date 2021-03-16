<?php
$kode = $_GET['id'];
$sql = $koneksi->query("DELETE FROM tb_pelanggan WHERE kode_pelanggan ='$kode'");

if ($sql) {
?>
    <script type="text/javascript">
        alert("Data Berhasil Dihapus !");
        window.location.href = "?page=pelanggan";
    </script>
<?php
}
?>