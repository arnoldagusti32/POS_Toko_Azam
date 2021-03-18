<?php
$koneksi = new mysqli("localhost", "root", "", "db_pos");
$kasir = $_GET['kasir'];
$kode_pj = $_GET['kode_pjl'];
?>

<h4>Struk Pembelanjaan</h4>
<table>
    <tr>
        <td>Toko Azam Grosir</td>
    </tr>
    <tr>
        <td>Jln. Bumi Asri Kutajaya. Pasar Kemis</td>
    </tr>
</table>

<table>
    <?php
    $sql = $koneksi->query("SELECT * FROM tb_penjualan WHERE kode_penjualan='$kode_pj'");
    $tampil = $sql->fetch_assoc();
    ?>

    <tr>
        <td>Kode Penjualan &nbsp;&nbsp;</td>
        <td>: &nbsp;&nbsp;<?php echo $tampil['kode_penjualan']; ?></td>
    </tr>
    <tr>
        <td>Tanggal &nbsp;&nbsp;</td>
        <td>: &nbsp;&nbsp;<?php echo $tampil['tgl_penjualan']; ?></td>
    </tr>
    <tr>
        <td>Kasir &nbsp;&nbsp;</td>
        <td>: &nbsp;&nbsp;<?php echo $kasir ?></td>
    </tr>
</table>