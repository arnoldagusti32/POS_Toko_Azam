<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../../config.php";
$kasir = $_GET['kasir'];
$kode_pj = $_GET['kode_pjl'];
?>
<style>
    .noPrint {
        padding: 5px 10px;
        background-color: #483D8B;
        color: white;
    }

    @media print {
        button.noPrint {
            display: none;
        }
    }
</style>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<h4>Struk Pembelanjaan</h4>
<table>
    <tr>
        <td>
            <center><img src="../../images/bulet.png" width="70" height="70" alt=""></center>
        </td>
    </tr>
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
    $sql = $koneksi->query("SELECT * FROM tb_penjualan, tb_pelanggan WHERE tb_penjualan.kode_pelanggan=tb_pelanggan.kode_pelanggan AND kode_penjualan='$kode_pj'");
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
        <td>Pelanggan &nbsp;&nbsp;</td>
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
    $sql2 = $koneksi->query("SELECT * FROM tb_penjualan, tb_penjualan_detail, tb_barang 
    WHERE tb_penjualan.kode_penjualan=tb_penjualan_detail.kode_penjualan 
    AND tb_penjualan.kode_barcode=tb_barang.kode_barcode 
    AND tb_penjualan.kode_penjualan='$kode_pj'");
    while ($tampil2 = $sql2->fetch_assoc()) {
    ?>

        <tr>
            <td><?php echo $tampil2['nama_barang']; ?></td>
            <td><?php echo 'Rp.' . '&nbsp;' . number_format($tampil2['harga_jual'], 0, ",", ".") . ',-' . '&nbsp;' . '&nbsp;' . 'X' . '&nbsp;' . '&nbsp;' . $tampil2['jumlah'] . '&nbsp;' . '&nbsp;' . '&nbsp;' . '&nbsp;' . '&nbsp;' . '&nbsp;' ?> </td>
            <td><?php echo 'Rp.' . '&nbsp;' . number_format($tampil2['total'], 0, ",", ".") . ',-'; ?></td>
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
        <td> : <?php echo 'Rp.' . '&nbsp;' . number_format($total_bayar, 0, ",", ".") . ',-'; ?></td>
    </tr>
    <tr>
        <th colspan="2">Diskon &nbsp;&nbsp;</th>
        <td> : <?php echo $diskon . ' %'; ?></td>
    </tr>
    <tr>
        <th colspan="2">Potongan Diskon &nbsp;&nbsp;</th>
        <td> : <?php echo 'Rp.' . '&nbsp;' . number_format($potongan, 0, ",", ".") . ',-'; ?></td>
    </tr>
    <tr>
        <th colspan="2">Sub Total &nbsp;&nbsp;</th>
        <td> : <?php echo 'Rp.' . '&nbsp;' . number_format($total_b, 0, ",", ".") . ',-'; ?></td>
    </tr>
    <tr>
        <th colspan="2">Bayar &nbsp;&nbsp;</th>
        <td> : <?php echo 'Rp.' . '&nbsp;' . number_format($bayar, 0, ",", ".") . ',-'; ?></td>
    </tr>
    <tr>
        <th colspan="2">Kembali &nbsp;&nbsp;</th>
        <td> : <?php echo 'Rp.' . '&nbsp;' . number_format($kembali, 0, ",", ".") . ',-'; ?></td>
    </tr>
</table>
<br>
<table>
    <tr>
        <td>Barang Yang Sudah Dibeli Tidak Dapat Dikembalikan</td>
    </tr>
    <tr>
        <td> <br>
            <hr><br>
        </td>
    </tr>
    <tr>
        <td>
            <center>Menerima Order Via : </center>
        </td>
    </tr>
    <tr>
        <td>
            <center><i class="fa fa-whatsapp"></i> +62 856-8005-310 &nbsp;&nbsp;&nbsp;&nbsp; <img src="../../images/wa.png" alt="" height="15" width="15"> @heriazam</center>
        </td>
    </tr>
    <tr>
        <td>
            <center><i class="fa fa-instagram"></i> @azamgrosir &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-facebook-official"></i> @azamgrosir</center>
        </td>
    </tr>
    <tr>
        <td>
            <center>
                <button type="button" class="noPrint btn bg-indigo waves-effect" value="Print" onclick="window.print()">
                    <i class="material-icons">print</i>
                    <span>PRINT</span>
                </button>
            </center>
        </td>
    </tr>
</table>