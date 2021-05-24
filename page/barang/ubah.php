<script>
    function sum() {
        var harga_beli = document.getElementById('harga_beli').value;
        var harga_jual = document.getElementById('harga_jual').value;
        var result = parseInt(harga_jual) - parseInt(harga_beli);
        if (!isNaN(result)) {
            document.getElementById('profit').value = result;
        }
    }
</script>

<?php
$kode2 = $_GET['id'];
$sql2 = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode ='$kode2'");
$tampil = $sql2->fetch_assoc();

$kategori = $tampil['kategori'];
$satuan = $tampil['satuan'];

?>

<!-- Input -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    UBAH BARANG
                </h2>
            </div>

            <div class="body">
                <form method="POST">
                    <label for="">Kode Barcode</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="kode" value="<?php echo $tampil['kode_barcode']; ?>" required />
                        </div>
                    </div>
                    <label for="">Nama Barang</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama" value="<?php echo $tampil['nama_barang']; ?>" required />
                        </div>
                    </div>
                    <label for="">Kategori</label>
                    <div class=" form-group">
                        <div class="form-line">
                            <select name="kategori" class="form-control show-tick">
                                <option value="Perabotan Rumah Tangga" <?php if ($kategori == "Perabotan Rumah Tangga") {
                                                                            echo "selected";
                                                                        } ?>>Perabotan Rumah Tangga</option>
                                <option value="Barang Unik" <?php if ($kategori == "Barang Unik") {
                                                                echo "selected";
                                                            } ?>>Barang Unik</option>
                            </select>
                        </div>
                    </div>
                    <label for="">Satuan</label>
                    <div class=" form-group">
                        <div class="form-line">
                            <select name="satuan" class="form-control show-tick">
                                <option value="LUSIN" <?php if ($satuan == "LUSIN") {
                                                            echo "selected";
                                                        } ?>>LUSIN</option>
                                <option value="PCS" <?php if ($satuan == "PCS") {
                                                        echo "selected";
                                                    } ?>>PCS</option>
                                <option value="PACK" <?php if ($satuan == "PACK") {
                                                            echo "selected";
                                                        } ?>>PACK</option>
                            </select>
                        </div>
                    </div>
                    <label for="">Stok</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" class="form-control" name="stok" value="<?php echo $tampil['stok']; ?>" required />
                        </div>
                    </div>
                    <label for="">Harga Beli</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" class="form-control" id="harga_beli" onkeyup="sum()" name="hbeli" value="<?php echo $tampil['harga_beli']; ?>" required />
                        </div>
                    </div>
                    <label for="">Harga Jual</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" class="form-control" id="harga_jual" onkeyup="sum()" name="hjual" value="<?php echo $tampil['harga_jual']; ?>" required />
                        </div>
                    </div>
                    <label for="">Profit</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" class="form-control" id="profit" name="profit" readonly="" style="background-color: #c7c3e9;" value="<?php echo $tampil['profit']; ?>" required />
                        </div>
                    </div>

                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </form>

                <?php
                if (isset($_POST["simpan"])) {
                    $kode = $_POST["kode"];
                    $nama = $_POST["nama"];
                    $kategori = $_POST['kategori'];
                    $satuan = $_POST["satuan"];
                    $stok = $_POST["stok"];
                    $hbeli = $_POST["hbeli"];
                    $hjual = $_POST["hjual"];
                    $profit = $_POST["profit"];

                    $sql = $koneksi->query("UPDATE tb_barang SET kode_barcode='$kode', nama_barang='$nama', kategori='$kategori', satuan='$satuan',stok='$stok', harga_beli='$hbeli',harga_jual='$hjual', profit='$profit' WHERE kode_barcode='$kode2'");

                    if ($sql) {
                ?>
                        <script type="text/javascript">
                            alert("Data Berhasil Diubah !");
                            window.location.href = "?page=barang";
                        </script>

                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>