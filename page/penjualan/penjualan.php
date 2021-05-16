<?php
$kode = $_GET['kodepj'];

$kasir = $data['nama'];
?>


<div class="row clearfix">
    <div class="body">
        <form method="POST">
            <?php
            $barang = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode='$barcode'");
            ?>
            <div class="col-md-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="kode" value="<?php echo $kode; ?>" readonly>
                        <label class="form-label">Kode Penjualan</label>
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
                <button type="submit" name="simpan" class="btn btn-primary waves-effect">
                    <i class="material-icons">add_to_queue</i>
                    <span>Tambahkan</span>
                </button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['simpan'])) {
        $date = date("Y-m-d");
        $kd_pj = $_POST['kode'];
        $barcode = $_POST['kode_barcode'];
        $barang = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode='$barcode'");
        $data_barang = $barang->fetch_assoc();
        $harga_jual = $data_barang['harga_jual'];
        $cek = $_POST['jumlah'];
        if ($cek != "") {
            $jumlah = $_POST['jumlah'];
        } else {
            $jumlah = 1;
        }
        $total = $jumlah * $harga_jual;
        $barang2 = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode='$barcode'");

        while ($data_barang2 = $barang2->fetch_assoc()) {
            $sisa = $data_barang2['stok'];

            if ($sisa == 0) {
    ?>
                <script type="text/javascript">
                    alert("Stock Barang Habis.. Tidak Dapat melakukan penjualan");
                    window.location.href = "?page=penjualan&kodepj=<?php echo $kode; ?>"
                </script>
    <?php
            } else {

                $koneksi->query("INSERT INTO tb_penjualan (kode_penjualan, kode_barcode, jumlah, total, tgl_penjualan)VALUES('$kd_pj', '$barcode', '$jumlah', '$total', '$date')");
            }
        }
    }
    ?>
    <br><br><br><br>
    <form method="POST">
        <div class="col-md-3">
            <label for="">Pelanggan</label>
            <select name="pelanggan" class="form-control show-tick">
                <?php
                $pelanggan = $koneksi->query("SELECT * FROM tb_pelanggan ORDER BY kode_pelanggan ASC");

                while ($d_pelanggan = $pelanggan->fetch_assoc()) {
                    echo "<option value='$d_pelanggan[kode_pelanggan]'>$d_pelanggan[nama]</option>";
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
                            DAFTAR BELANJAAN
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
                                    $sql = $koneksi->query("SELECT * FROM tb_penjualan, tb_barang WHERE tb_penjualan.kode_barcode = tb_barang.kode_barcode AND kode_penjualan='$kode'");

                                    while ($data = $sql->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data["kode_barcode"]; ?></td>
                                            <td><?php echo $data["nama_barang"]; ?></td>
                                            <td><?php echo $data["harga_jual"]; ?></td>
                                            <td><?php echo $data["jumlah"]; ?></td>
                                            <td><?php echo $data["total"]; ?></td>

                                            <td class="d-flex justify-content-center">
                                                <a href="?page=penjualan&aksi=tambah&id=<?php echo $data['id'] ?>&kode_pj=<?php echo $data['kode_penjualan'] ?>&harga_jual=<?php echo $data['harga_jual'] ?>&kode_barcode=<?php echo $data['kode_barcode'] ?>" title="Tambah" class="btn btn-success"><i class="material-icons">add</i></a>
                                                <a href="?page=penjualan&aksi=kurang&id=<?php echo $data['id'] ?>&kode_pj=<?php echo $data['kode_penjualan'] ?>&harga_jual=<?php echo $data['harga_jual'] ?>&kode_barcode=<?php echo $data['kode_barcode'] ?>" title="Kurang" class="btn btn-success"><i class="material-icons">remove</i></a>
                                                <a onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini ...???')" href="?page=penjualan&aksi=hapus&id=<?php echo $data['id'] ?>&kode_pj=<?php echo $data['kode_penjualan'] ?>&harga_jual=<?php echo $data['harga_jual'] ?>&kode_barcode=<?php echo $data['kode_barcode'] ?>&jumlah=<?php echo $data['jumlah'] ?>" class="btn btn-danger"><i title="Hapus" class="material-icons">clear</i></a>
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;">Diskon</td>
                                    <td><input type="number" name="diskon" style="text-align: right;" onkeyup="hitung();" id="diskon"> %</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;">Potongan Diskon</td>
                                    <td><input type="number" name="potongan" style="text-align: right;" id="potongan"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;">Sub Total</td>
                                    <td><input type="number" name="s_total" style="text-align: right;" id="s_total"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;"> Bayar</td>
                                    <td><input type="number" name="bayar" style="text-align: right;" onkeyup="hitung();" id="bayar"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;"> Kembali</td>
                                    <td>
                                        <input type="number" name="kembali" style="text-align: right;" id="kembali">
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <center>
                                            <button type="submit" name="simpan_pj" class="btn bg-orange waves-effect">
                                                <i class="material-icons">save</i>
                                                <span>Simpan</span>
                                            </button>
                                            <button type="submit" class="btn bg-indigo waves-effect" onclick="window.open('page/penjualan/cetak.php?kode_pjl=<?php echo $kode; ?>&kasir=<?php echo $kasir; ?>','mywindow','width=450, height=600, left=300, status=yes')">
                                                <i class="material-icons">print</i>
                                                <span>Cetak Struk</span>
                                            </button>
                                        </center>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php
    if (isset($_POST['simpan_pj'])) {
        $pelanggan = $_POST['pelanggan'];
        $total_bayar = $_POST['total_bayar'];
        $diskon = $_POST['diskon'];
        $potongan = $_POST['potongan'];
        $s_total = $_POST['s_total'];
        $bayar = $_POST['bayar'];
        $kembali = $_POST['kembali'];

        $sql_jual = $koneksi->query("INSERT INTO tb_penjualan_detail(kode_penjualan, bayar, kembali, diskon, potongan, total_b, id_pengguna)values('$kode', '$bayar', '$kembali', '$diskon', '$potongan', '$s_total', '$user')");
        if ($sql_jual) {

            $koneksi->query("UPDATE tb_penjualan SET kode_pelanggan='$pelanggan' WHERE kode_penjualan='$kode'");
        } else {
            $koneksi->query("UPDATE tb_penjualan_detail SET bayar= '$bayar', kembali='$kembali', diskon='$diskon', potongan='$potongan', total_b='$s_total' WHERE kode_penjualan='$kode'");
            $koneksi->query("UPDATE tb_penjualan SET kode_pelanggan='$pelanggan' WHERE kode_penjualan='$kode'");
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