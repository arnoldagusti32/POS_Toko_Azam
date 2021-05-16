<!-- Input -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    TAMBAH PENGGUNA
                </h2>
            </div>

            <div class="body">
                <form method="POST" enctype="multipart/form-data">
                    <label for="">Username</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" required />
                        </div>
                    </div>
                    <label for="">Password</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" required />
                        </div>
                    </div>
                    <label for="">Nama</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama" required />
                        </div>
                    </div>
                    <label for="">Level</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="level" class="form-control show-tick">
                                <option value="">-- Pilih Level --</option>
                                <option value="admin">admin</option>
                                <option value="kasir">kasir</option>
                            </select>
                        </div>
                    </div>
                    <label for="">Photo</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="file" class="form-control" name="photo" required />
                        </div>
                    </div>

                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </form>

                <?php
                if (isset($_POST["simpan"])) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $nama = $_POST["nama"];
                    $level = $_POST["level"];
                    $photo = $_FILES['photo']['name'];
                    $lokasi = $_FILES['photo']['tmp_name'];
                    $upload = move_uploaded_file($lokasi, "images/" . $photo);

                    if ($upload) {

                        $sql = $koneksi->query("INSERT INTO tb_pengguna values(NULL,'$username','$password','$nama','$level','$photo')");

                        if ($sql) {
                ?>
                            <script type="text/javascript">
                                alert("Data Berhasil Disimpan !");
                                window.location.href = "?page=pengguna";
                            </script>

                <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>