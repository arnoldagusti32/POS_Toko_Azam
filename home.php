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
?>

<marquee behavior="" direction="">
    <h2>Selamat Datang Di SIstem Informasi Penjualan Toko Azam Grosir</h2>
</marquee>
<br>
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
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
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">add_shopping_cart</i>
                </div>
                <div class="content">
                    <div class="text">
                        <h5>Penjualan Hari Ini</h5>
                    </div>
                    <div class="number"><?php echo 'Rp.' . '&nbsp;' . number_format($total_pj, 0, ",", ".") . ',-'; ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">attach_money</i>
                </div>
                <div class="content">
                    <div class="text">
                        <h5>Profit Hari Ini</h5>
                    </div>
                    <div class="number"><?php echo 'Rp.' . '&nbsp;' . number_format($total_profit, 0, ",", ".") . ',-'; ?></div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DATA BARANG DENGAN STOK DIBAWAH 20
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barcode</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                $sql = $koneksi->query("SELECT * FROM tb_barang WHERE stok < 20");
                                $ket = 'class="col-red font-bold"';

                                while ($data = $sql->fetch_assoc()) {

                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data["kode_barcode"]; ?></td>
                                        <td><?php echo $data["nama_barang"]; ?></td>
                                        <td><?php echo $data["satuan"]; ?></td>
                                        <td <?php echo $ket; ?>>
                                            <center><?php echo $data["stok"]; ?> </center>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>