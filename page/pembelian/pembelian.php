<?php
$kode = $_GET['kodebl'];

$kasir = $data['nama'];
?>


<div class="row clearfix">
    <div class="body">
        <form method="POST">
            <div class="col-md-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="kode" value="<?php echo $kode; ?>" readonly>
                        <label class="form-label">Kode Pembelian</label>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" name="kode_barcode" placeholder="Kode Barcode" class="form-control" autofocus="autofocus" />
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" name="jumlah" class="form-control" />
                        <label class="form-label">Jumlah</label>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <input type="submit" name="simpan" value="Tambahkan" class="btn btn-primary">
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['simpan'])) {
        $date = date("Y-m-d");
        $kd_bl = $_POST['kode'];
        $barcode = $_POST['kode_barcode'];
        $barang = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode='$barcode'");
        $data_barang = $barang->fetch_assoc();
        $harga_beli = $data_barang['harga_beli'];
        $cek = $_POST['jumlah'];
        if ($cek != "") {
            $jumlah = $_POST['jumlah'];
        } else {
            $jumlah = 1;
        }
        $total = $jumlah * $harga_beli;
        $barang2 = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode='$barcode'");

        while ($data_barang2 = $barang2->fetch_assoc()) {
            $sisa = $data_barang2['stok'];

            if ($sisa == 0) {
    ?>
                <script type="text/javascript">
                    alert("Stock Barang Habis.. Tidak Dapat melakukan pembelian");
                    window.location.href = "?page=pembelian&kodebl=<?php echo $kode; ?>"
                </script>
    <?php
            } else {

                $koneksi->query("INSERT INTO tb_pembelian (kode_pembelian, kode_barcode, jumlah, total, tgl_pembelian)VALUES('$kd_bl', '$barcode', '$jumlah', '$total', '$date')");
            }
        }
    }
    ?>
    <br><br><br><br>
    <form method="POST">
        <div class="col-md-3">
            <label for="">Supplier</label>
            <select name="supplier" class="form-control show-tick">
                <?php
                $supplier = $koneksi->query("SELECT * FROM tb_supplier ORDER BY kode_supplier ASC");

                while ($d_supplier = $supplier->fetch_assoc()) {
                    echo "<option value='$d_supplier[kode_supplier]'>$d_supplier[nama]</option>";
                }
                ?>
            </select>
        </div>

        <br><br><br><br>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DAFTAR PEMBELIAN
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barcode</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = $koneksi->query("SELECT * FROM tb_pembelian, tb_barang WHERE tb_pembelian.kode_barcode = tb_barang.kode_barcode AND kode_pembelian='$kode'");

                                    while ($data = $sql->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data["kode_barcode"]; ?></td>
                                            <td><?php echo $data["nama_barang"]; ?></td>
                                            <td><?php echo $data["harga_beli"]; ?></td>
                                            <td><?php echo $data["jumlah"]; ?></td>
                                            <td><?php echo $data["total"]; ?></td>

                                            <td class="d-flex justify-content-center">
                                                <a href="?page=pembelian&aksi=tambah&id=<?php echo $data['id'] ?>&kode_bl=<?php echo $data['kode_pembelian'] ?>&harga_beli=<?php echo $data['harga_beli'] ?>&kode_barcode=<?php echo $data['kode_barcode'] ?>" title="Tambah" class="btn btn-success"><i class="material-icons">add</i></a>
                                                <a href="?page=pembelian&aksi=kurang&id=<?php echo $data['id'] ?>&kode_bl=<?php echo $data['kode_pembelian'] ?>&harga_beli=<?php echo $data['harga_beli'] ?>&kode_barcode=<?php echo $data['kode_barcode'] ?>" title="Kurang" class="btn btn-success"><i class="material-icons">remove</i></a>
                                                <a onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini ...???')" href="?page=pembelian&aksi=hapus&id=<?php echo $data['id'] ?>&kode_bl=<?php echo $data['kode_pembelian'] ?>&harga_beli=<?php echo $data['harga_beli'] ?>&kode_barcode=<?php echo $data['kode_barcode'] ?>&jumlah=<?php echo $data['jumlah'] ?>" class="btn btn-danger"><i title="Hapus" class="material-icons">clear</i></a>
                                            </td>
                                        </tr>
                                    <?php
                                        $total_bayar = $total_bayar + $data['total'];
                                    }
                                    ?>

                                </tbody>
                                <tr>
                                    <td colspan="5" style="text-align: right;">Total</td>
                                    <td><input type="number" name="total_bayar" id="total_bayar" style="text-align: right;" value="<?php echo $total_bayar; ?>" onkeyup="hitung();" readonly></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;">Diskon</td>
                                    <td><input type="number" name="diskon" style="text-align: right;" onkeyup="hitung();" id="diskon"></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;">Potongan Diskon</td>
                                    <td><input type="number" name="potongan" style="text-align: right;" id="potongan"></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;">Sub Total</td>
                                    <td><input type="number" name="s_total" style="text-align: right;" id="s_total"></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;"> Bayar</td>
                                    <td><input type="number" name="bayar" style="text-align: right;" onkeyup="hitung();" id="bayar"></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;"> Kembali</td>
                                    <td>
                                        <input type="number" name="kembali" style="text-align: right;" id="kembali">
                                        <input type="submit" name="simpan_bl" value="Simpan" class="btn btn-info">
                                        <input type="submit" value="Cetak Struk" class="btn btn-success" onclick="window.open('page/pembelian/cetak.php?kode_beli=<?php echo $kode; ?>&kasir=<?php echo $kasir; ?>','mywindow','width=400, height=600, left=300, status=yes')">
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <center>
        <a data-toggle="modal" data-target="#smallModalBeli" target="_blank" class="btn btn-warning"><i class="material-icons">insert_drive_file</i> Laporan Pembelian</a>
    </center>
    <!-- Small Size -->
    <div class="modal fade" id="smallModalBeli" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="smallModalLabel">Laporan Pembelian</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="page/pembelian/laporan.php" target="_blank">
                        <label for="">Tanggal Awal</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" class="form-control" name="tgl_awal" required />
                            </div>
                        </div>
                        <label for="">Tanggal Akhir</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" class="form-control" name="tgl_akhir" required />
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect"><i class="material-icons">print</i> Cetak</button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i title="CLOSE" class="material-icons">clear</i> CLOSE</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['simpan_bl'])) {
        $supplier = $_POST['supplier'];
        $total_bayar = $_POST['total_bayar'];
        $diskon = $_POST['diskon'];
        $potongan = $_POST['potongan'];
        $s_total = $_POST['s_total'];
        $bayar = $_POST['bayar'];
        $kembali = $_POST['kembali'];

        $sql_beli = $koneksi->query("INSERT INTO tb_pembelian_detail(kode_pembelian, bayar, kembali, diskon, potongan, total_b)values('$kode', '$bayar', '$kembali', '$diskon', '$potongan', '$s_total')");
        if ($sql_beli) {

            $koneksi->query("UPDATE tb_pembelian SET kode_supplier='$supplier' WHERE kode_pembelian='$kode'");
        } else {
            $koneksi->query("UPDATE tb_pembelian_detail SET bayar= '$bayar', kembali='$kembali', diskon='$diskon', potongan='$potongan', total_b='$s_total' WHERE kode_pembelian='$kode'");
            $koneksi->query("UPDATE tb_pembelian SET kode_supplier='$supplier' WHERE kode_pembelian='$kode'");
        }
    }
    ?>

    <script type="text/javascript">
        function hitung() {
            var diskon = document.getElementById('diskon').value;
            var total_bayar = document.getElementById('total_bayar').value;

            var diskon_pot = parseInt(total_bayar) * parseInt(diskon) / parseInt(100);

            if (!isNaN(diskon_pot)) {
                var potongan = document.getElementById('potongan').value = diskon_pot;
            }
            var sub_total = parseInt(total_bayar) - parseInt(potongan);
            if (!isNaN(sub_total)) {
                var s_total = document.getElementById('s_total').value = sub_total;
            }
            var bayar = document.getElementById('bayar').value;
            var bayar_b = parseInt(bayar) - parseInt(s_total);
            if (!isNaN(bayar_b)) {
                document.getElementById('kembali').value = bayar_b;
            }
        }
    </script>