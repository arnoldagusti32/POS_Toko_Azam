<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$koneksi = new mysqli("localhost", "root", "", "db_pos");
$kasir = $_GET['kasir'];
$kode_bl = $_GET['kode_beli'];
?>
<style>
    @media print {
        input.noPrint {
            display: none;
        }
    }
</style>
<h4>Struk Pembelian Barang Supplier</h4>
<table>
    <tr>
        <td>
            <center>Toko Azam Grosir</center>
        </td>
    </tr>
    <tr>
        <td>
            <center>Jln. Cempaka Raya Blok AA No.3 Bumiasri Kutajaya, Pasar Kemis, Kab Tangerang</center>
        </td>
    </tr>
    <tr>
        <td>
            <hr>
        </td>
    </tr>
</table>

<table>
    <?php
    $sql = $koneksi->query("SELECT * FROM tb_pembelian, tb_supplier WHERE tb_pembelian.kode_supplier=tb_supplier.kode_supplier AND kode_pembelian='$kode_bl'");
    $tampil = $sql->fetch_assoc();
    ?>

    <tr>
        <td>Kode pembelian &nbsp;&nbsp;</td>
        <td>: &nbsp;&nbsp;<?php echo $tampil['kode_pembelian']; ?></td>
    </tr>
    <tr>
        <td>Tanggal &nbsp;&nbsp;</td>
        <td>: &nbsp;&nbsp;<?php echo $tampil['tgl_pembelian']; ?></td>
    </tr>
    <tr>
        <td>Supplier &nbsp;&nbsp;</td>
        <td>: &nbsp;&nbsp;<?php echo $tampil['nama']; ?></td>
    </tr>
    <tr>
        <td>Kasir &nbsp;&nbsp;</td>
        <td>: &nbsp;&nbsp;<?php echo $kasir; ?></td>
    </tr>
    <td colspan="5">
        <hr>
    </td>

    <?php
    $sql2 = $koneksi->query("SELECT * FROM tb_pembelian, tb_pembelian_detail, tb_barang 
    WHERE tb_pembelian.kode_pembelian=tb_pembelian_detail.kode_pembelian 
    AND tb_pembelian.kode_barcode=tb_barang.kode_barcode 
    AND tb_pembelian.kode_pembelian='$kode_bl'");
    while ($tampil2 = $sql2->fetch_assoc()) {
    ?>

        <tr>
            <td><?php echo $tampil2['nama_barang']; ?></td>
            <td><?php echo 'Rp.' . '&nbsp;' . number_format($tampil2['harga_beli']) . ',-' . '&nbsp;' . '&nbsp;' . 'X' . '&nbsp;' . '&nbsp;' . $tampil2['jumlah'] . '&nbsp;' . '&nbsp;' . '&nbsp;' . '&nbsp;' . '&nbsp;' . '&nbsp;' ?> </td>
            <td><?php echo 'Rp.' . '&nbsp;' . number_format($tampil2['total']) . ',-'; ?></td>
        </tr>

    <?php
        $diskon = $tampil2['diskon'];
        $potongan = $tampil2['potongan'];
        $bayar = $tampil2['bayar'];
        $kembali = $tampil2['kembali'];
        $total_b = $tampil2['total_b'];

        $total_bayar = $total_bayar + $tampil2['total'];
    }
    ?>

    <tr>
        <td colspan="5">
            <hr>
        </td>
    </tr>
    <tr>
        <th colspan="2">Total &nbsp;&nbsp;</th>
        <td> : <?php echo 'Rp.' . '&nbsp;' . number_format($total_bayar) . ',-'; ?></td>
    </tr>
    <tr>
        <th colspan="2">Diskon &nbsp;&nbsp;</th>
        <td> : <?php echo $diskon . ' %'; ?></td>
    </tr>
    <tr>
        <th colspan="2">Potongan Diskon &nbsp;&nbsp;</th>
        <td> : <?php echo 'Rp.' . '&nbsp;' . number_format($potongan) . ',-'; ?></td>
    </tr>
    <tr>
        <th colspan="2">Sub Total &nbsp;&nbsp;</th>
        <td> : <?php echo 'Rp.' . '&nbsp;' . number_format($total_b) . ',-'; ?></td>
    </tr>
    <tr>
        <th colspan="2">Bayar &nbsp;&nbsp;</th>
        <td> : <?php echo 'Rp.' . '&nbsp;' . number_format($bayar) . ',-'; ?></td>
    </tr>
    <tr>
        <th colspan="2">Kembali &nbsp;&nbsp;</th>
        <td> : <?php echo 'Rp.' . '&nbsp;' . number_format($kembali) . ',-'; ?></td>
    </tr>
</table>

<table>
    <tr>
        <td>Barang Yang Sudah Dibeli Tidak Dapat Dikembalikan</td>
    </tr>
    <tr>
        <td>
            <center><input type="button" class="noPrint" value="Print" onclick="window.print()"></center>
        </td>
    </tr>
</table>