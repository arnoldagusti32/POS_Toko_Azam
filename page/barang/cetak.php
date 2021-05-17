<?php
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<table border="1" width="100%" style="border-collapse:collapse" cellpadding="5">
    <caption>
        <div style="overflow: auto;">
            <img src="../../images/logo.png" alt="" height="150" width="150" style="float:left;  margin-left: 10px;">
            <h2 style="margin-bottom: 0;">Toko Azam Grosir</h2>
            <h3 style="margin-bottom: 5;">Jln. Cempaka Raya Blok AA No.3 Bumiasri Kutajaya, Pasar Kemis, Kab Tangerang</h3>
            <h4 style="margin-bottom: 0; margin-top: 0;">Telp/Wa : +62 856-8005-310</h4>
        </div>
        <hr>
        <h2>Laporan Data Barang</h2>
    </caption>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barcode</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Satuan</th>
            <th>Stok</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Profit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $pengguna = $_GET['user'];
        $no = 1;
        $sql = $koneksi->query("SELECT * FROM tb_barang");

        while ($data = $sql->fetch_assoc()) {

        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data["kode_barcode"]; ?></td>
                <td><?php echo $data["nama_barang"]; ?></td>
                <td><?php echo $data["kategori"]; ?></td>
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