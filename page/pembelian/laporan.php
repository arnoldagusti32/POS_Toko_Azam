<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$koneksi = new mysqli("localhost", "root", "", "db_pos");
?>

<style>
    @media print {
        input.noPrint {
            display: none;
        }
    }
</style>
<table border="1" width="100%" style="border-collapse:collapse" cellpadding="5">
    <caption>
        <h2>Laporan Pembelian Barang</h2>
    </caption>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Kode Barcode</th>
            <th>Nama Barang</th>
            <th>Harga Beli</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $tgl_awal = $_POST['tgl_awal'];
        $tgl_akhir = $_POST['tgl_akhir'];
        $no = 1;
        $sql = $koneksi->query("SELECT * FROM tb_barang, tb_pembelian WHERE  tb_barang.kode_barcode=tb_pembelian.kode_barcode AND tgl_pembelian BETWEEN '$tgl_awal' AND '$tgl_akhir'");

        while ($data = $sql->fetch_assoc()) {

        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo date('d F Y', strtotime($data["tgl_pembelian"])); ?></td>
                <td><?php echo $data["kode_barcode"]; ?></td>
                <td><?php echo $data["nama_barang"]; ?></td>
                <td><?php echo number_format($data["harga_beli"]); ?></td>
                <td><?php echo $data["jumlah"]; ?></td>
                <td><?php echo number_format($data["total"]); ?></td>
            </tr>
        <?php
            $total_bl = $total_bl + $data['total'];
        }
        ?>
    </tbody>

    <tr>
        <th colspan="6">
            Total Pembelian
        </th>
        <td><?php echo number_format($total_bl); ?></td>
    </tr>
</table>
<br>
<input type="button" class="noPrint" value="Cetak" onclick="window.print()">