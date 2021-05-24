<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../../config.php";
$kasir = $_GET['kasir'];
$kode_bl = $_GET['kode_beli'];
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
<h4>Struk Pembelian Barang Supplier</h4>
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
    $sql = $koneksi->query("SELECT * FROM tb_pembelian, tb_supplier WHERE tb_pembelian.kode_supplier=tb_supplier.kode_supplier AND kode_pembelian='$kode_bl'");
    $tampil = $sql->fetch_assoc();
    ?>

    <tr>
        <td>Kd Pembelian &nbsp;&nbsp;</td>
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
</table>
<table>
    <tr>
        <td colspan="5">
            <hr>
        </td>
    </tr>

    <?php
    $sql2 = $koneksi->query("SELECT * FROM tb_pembelian, tb_pembelian_detail, tb_barang 
    WHERE tb_pembelian.kode_pembelian=tb_pembelian_detail.kode_pembelian 
    AND tb_pembelian.kode_barcode=tb_barang.kode_barcode 
    AND tb_pembelian.kode_pembelian='$kode_bl'");
    while ($tampil2 = $sql2->fetch_assoc()) {
    ?>

        <tr>
            <td><?php echo $tampil2['nama_barang']; ?></td>
        </tr>
        <tr>
            <td><?php echo 'Rp.' . '&nbsp;' . number_format($tampil2['harga_beli'], 0, ",", ".") . ',-' . '&nbsp;' . '&nbsp;' . 'X' . '&nbsp;' . '&nbsp;' . $tampil2['jumlah'] . '&nbsp;' . '&nbsp;' . '&nbsp;' . '&nbsp;' . '&nbsp;' . '&nbsp;' ?> </td>
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
</table>
<table>
    <tr>
        <th colspan="2">Total &nbsp;&nbsp;</th>
        <td> : <?php echo 'Rp.' . '&nbsp;' . number_format($total_bayar, 0, ",", ".") . ',-'; ?></td>
    </tr>
    <tr>
        <th colspan="2">Diskon &nbsp;&nbsp;</th>
        <td> : <?php echo $diskon . ' %'; ?></td>
    </tr>
    <tr>
        <th colspan="2">Ptng Diskon &nbsp;&nbsp;</th>
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
            <center><i class="fa fa-whatsapp"></i> 0858-9995-4679 </center>
        </td>
    </tr>
    <tr>
        <td>
            <center><i class="fa fa-instagram"></i> @azamgrosir <br> <i class="fa fa-facebook-official"></i> @azamgrosir</center>
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