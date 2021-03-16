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
<!-- Input -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    TAMBAH BARANG
                </h2>
            </div>

            <div class="body">
                <form method="POST">
                    <label for="">Kode Barcode</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="kode" />
                        </div>
                    </div>
                    <label for="">Nama Barang</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama" />
                        </div>
                    </div>
                    <label for="">Satuan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="satuan" class="form-control show-tick">
                                <option value="">-- Pilih Satuan --</option>
                                <option value="LUSIN">LUSIN</option>
                                <option value="PCS">PCS</option>
                                <option value="PACK">PACK</option>
                            </select>
                        </div>
                    </div>
                    <label for="">Stok</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" class="form-control" name="stok" />
                        </div>
                    </div>
                    <label for="">Harga Beli</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" class="form-control" id="harga_beli" onkeyup="sum()" name="hbeli" />
                        </div>
                    </div>
                    <label for="">Harga Jual</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" class="form-control" id="harga_jual" onkeyup="sum()" name="hjual" />
                        </div>
                    </div>
                    <label for="">Profit</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" class="form-control" id="profit" name="profit" readonly="" style="background-color: #c7c3e9;" value="0" />
                        </div>
                    </div>

                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </form>

                <?php
                if (isset($_POST["simpan"])) {
                    $kode = $_POST["kode"];
                    $nama = $_POST["nama"];
                    $satuan = $_POST["satuan"];
                    $stok = $_POST["stok"];
                    $hbeli = $_POST["hbeli"];
                    $hjual = $_POST["hjual"];
                    $profit = $_POST["profit"];

                    $sql = $koneksi->query("INSERT INTO tb_barang values('$kode','$nama','$satuan','$stok','$hbeli','$hjual','$profit')");

                    if ($sql) {
                ?>
                        <script type="text/javascript">
                            alert("Data Berhasil Disimpan !");
                            window.location.href = "?page=barang";
                        </script>

                <?php
                    }
                }
                ?>