<!-- Input -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    TAMBAH SUPPLIER
                </h2>
            </div>

            <div class="body">
                <form method="POST">
                    <label for="">Nama Supplier</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama" required />
                        </div>
                    </div>
                    <label for="">Alamat</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea rows="4" class="form-control no-resize" name="alamat" required></textarea>
                        </div>
                    </div>
                    <label for="">Telepon</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="telepon" required />
                        </div>
                    </div>
                    <label for="">Email</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" required />
                        </div>
                    </div>

                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </form>

                <?php
                if (isset($_POST["simpan"])) {
                    $nama = $_POST["nama"];
                    $alamat = $_POST["alamat"];
                    $telepon = $_POST["telepon"];
                    $email = $_POST["email"];

                    $sql = $koneksi->query("INSERT INTO tb_supplier values(NULL,'$nama','$alamat','$telepon','$email')");

                    if ($sql) {
                ?>
                        <script type="text/javascript">
                            alert("Data Berhasil Disimpan !");
                            window.location.href = "?page=supplier";
                        </script>

                    <?php
                    } else {
                    ?>
                        <script type="text/javascript">
                            alert("Gagal Disimpan !");
                            window.location.href = "?page=supplier";
                        </script>

                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>