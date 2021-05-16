<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../../config.php";
?>

<style>
    .noPrint {
        padding: 5px 10px;
        background-color: #483D8B;
        color: white;
    }

    .tanggung {
        width: 250px;
        height: 150px;
        float: right;
        text-align: center;
        padding: 10px;
        margin: 10px;
    }

    @media print {
        button.noPrint {
            display: none;
        }
    }
</style>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<table border="1" width="100%" style="border-collapse:collapse" cellpadding="5">
    <caption>
        <div style="overflow: auto;">
            <img src="../../images/logo.png" alt="" height="150" width="150" style="float:left;  margin-left: 10px;">
            <h2 style="margin-bottom: 0;">Toko Azam Grosir</h2>
            <h3 style="margin-bottom: 5;">Jln. Cempaka Raya Blok AA No.3 Bumiasri Kutajaya, Pasar Kemis, Kab Tangerang</h3>
            <h4 style="margin-bottom: 0; margin-top: 0;">Telp/Wa : +62 856-8005-310</h4>
        </div>
        <hr>
        <h2>Laporan Penjualan</h2>
    </caption>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Kode Barcode</th>
            <th>Nama Barang</th>
            <th>Harga Jual</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Profit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $pengguna = $_POST['user'];
        $tgl_awal = $_POST['tgl_awal'];
        $tgl_akhir = $_POST['tgl_akhir'];
        $no = 1;
        $sql = $koneksi->query("SELECT * FROM tb_barang, tb_penjualan WHERE  tb_barang.kode_barcode=tb_penjualan.kode_barcode AND tgl_penjualan BETWEEN '$tgl_awal' AND '$tgl_akhir'");

        while ($data = $sql->fetch_assoc()) {

            $profit = $data['profit'] * $data['jumlah'];

        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo date('d F Y', strtotime($data["tgl_penjualan"])); ?></td>
                <td><?php echo $data["kode_barcode"]; ?></td>
                <td><?php echo $data["nama_barang"]; ?></td>
                <td><?php echo 'Rp.' . '&nbsp;' . number_format($data["harga_jual"], 0, ",", ".") . ',-'; ?></td>
                <td><?php echo $data["jumlah"]; ?></td>
                <td><?php echo 'Rp.' . '&nbsp;' . number_format($data["total"], 0, ",", ".") . ',-'; ?></td>
                <td><?php echo 'Rp.' . '&nbsp;' . number_format($profit, 0, ",", ".") . ',-'; ?></td>
            </tr>
        <?php
            $total_pj = $total_pj + $data['total'];
            $total_profit = $total_profit + $profit;
        }
        ?>
    </tbody>

    <tr>
        <th colspan="6">
            Total Penjualan Dan Profit
        </th>
        <td><?php echo 'Rp.' . '&nbsp;' . number_format($total_pj, 0, ",", ".") . ',-'; ?></td>
        <td><?php echo 'Rp.' . '&nbsp;' . number_format($total_profit, 0, ",", ".") . ',-'; ?></td>
    </tr>
</table>
<?php include "../../waktu.php"; ?>
<div class="tanggung">
    <span>Tanggerang, <?php echo $tgl . ' ' . $month . ' ' . $tahun; ?></span><br>
    <span><b> Penanggung Jawab</b></span>
    <br><br><br><br><br><br>
    <span><?php echo $pengguna; ?></span>
</div>
<br>
<center>
    <button type="button" class="noPrint btn bg-indigo waves-effect" value="Print" onclick="window.print()">
        <i class="material-icons">print</i>
        <span>PRINT</span>
    </button>
</center>