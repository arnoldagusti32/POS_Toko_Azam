<?php
$koneksi = new mysqli("localhost", "root", "", "db_pos");
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
<table border="1" width="100%" style="border-collapse:collapse" cellpadding="5">
    <caption>
        <h2>Laporan Data Barang</h2>
    </caption>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barcode</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Stok</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Profit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $sql = $koneksi->query("SELECT * FROM tb_barang");

        while ($data = $sql->fetch_assoc()) {

        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data["kode_barcode"]; ?></td>
                <td><?php echo $data["nama_barang"]; ?></td>
                <td><?php echo $data["satuan"]; ?></td>
                <td><?php echo $data["stok"]; ?></td>
                <td><?php echo $data["harga_beli"]; ?></td>
                <td><?php echo $data["harga_jual"]; ?></td>
                <td><?php echo $data["profit"]; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<br>
<center>
    <button type="button" class="noPrint btn bg-indigo waves-effect" value="Print" onclick="window.print()">
        <i class="material-icons">print</i>
        <span>PRINT</span>
    </button>
</center>