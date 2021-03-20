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
                <td><?php echo 'Rp.' . '&nbsp;' . number_format($data["harga_jual"]) . ',-'; ?></td>
                <td><?php echo $data["jumlah"]; ?></td>
                <td><?php echo 'Rp.' . '&nbsp;' . number_format($data["total"]) . ',-'; ?></td>
                <td><?php echo 'Rp.' . '&nbsp;' . number_format($profit) . ',-'; ?></td>
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
        <td><?php echo 'Rp.' . '&nbsp;' . number_format($total_pj) . ',-'; ?></td>
        <td><?php echo 'Rp.' . '&nbsp;' . number_format($total_profit) . ',-'; ?></td>
    </tr>
</table>
<br>
<input type="button" class="noPrint" value="Cetak" onclick="window.print()">