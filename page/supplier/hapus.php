<?php
$kode = $_GET['id'];
$sql = $koneksi->query("DELETE FROM tb_supplier WHERE kode_supplier ='$kode'");

if ($sql) {
?>
    <script type="text/javascript">
        alert("Data Berhasil Dihapus !");
        window.location.href = "?page=supplier";
    </script>
<?php
} else {
?>
    <script type="text/javascript">
        alert("Gagal Dihapus !");
        window.location.href = "?page=supplier";
    </script>
<?php
}
?>