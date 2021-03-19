<?php
$tgl = date("Y-m-d");
$sql = $koneksi->query("SELECT * FROM tb_penjualan, tb_barang WHERE tb_penjualan.kode_barcode=tb_barang.kode_barcode AND tgl_penjualan='$tgl'");

while ($tampil = $sql->fetch_assoc()) {
    $profit = $tampil['profit'] * $tampil['jumlah'];

    $total_pj = $total_pj + $tampil['total'];
    $total_profit = $total_profit + $profit;
}

$sql2 = $koneksi->query("SELECT * FROM tb_barang");
while ($tampil2 = $sql2->fetch_assoc()) {
    $jumlah_brg = $sql2->num_rows;
}
$sql1 = $koneksi->query("SELECT * FROM tb_pelanggan");
while ($tampil1 = $sql1->fetch_assoc()) {
    $jumlah_pelanggan = $sql1->num_rows;
}
?>

<marquee behavior="" direction="">Selamat Datang Di SIstem Informasi Penjualan Toko Azam Grosir</marquee>
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">reorder</i>
                </div>
                <div class="content">
                    <div class="text">
                        <h5>Data Barang</h5>
                    </div>
                    <div class="number count-to" data-from="0" data-to="<?php echo $jumlah_brg ?>" data-speed="1000" data-fresh-interval="20"><?php echo $jumlah_brg ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">add_shopping_cart</i>
                </div>
                <div class="content">
                    <div class="text">
                        <h5>Penjualan Hari Ini</h5>
                    </div>
                    <div class="number"><?php echo 'Rp.' . '&nbsp;' . number_format($total_pj); ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">attach_money</i>
                </div>
                <div class="content">
                    <div class="text">
                        <h5>Profit Hari Ini</h5>
                    </div>
                    <div class="number"><?php echo 'Rp.' . '&nbsp;' . number_format($total_profit); ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-indigo hover-expand-effect hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">tag_faces</i>
                </div>
                <div class="content">
                    <div class="text">
                        <h5>Pelanggan</h5>
                    </div>
                    <div class="number count-to" data-from="0" data-to="<?php echo $jumlah_pelanggan ?>" data-speed="1000" data-fresh-interval="20"><?php echo $jumlah_pelanggan ?></div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->