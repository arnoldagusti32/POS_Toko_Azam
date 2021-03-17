<?php
$kode2 = $_GET['id'];
$sql2 = $koneksi->query("SELECT * FROM tb_pengguna WHERE id ='$kode2'");
$tampil = $sql2->fetch_assoc();

$level = $tampil['level'];
?>

<!-- Input -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    UBAH PENGGUNA
                </h2>
            </div>

            <div class="body">
                <form method="POST" enctype="multipart/form-data">
                    <label for="">Username</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" value="<?php echo $tampil['username']; ?>" required />
                        </div>
                    </div>
                    <label for="">Password</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="password" value="<?php echo $tampil['password']; ?>" required />
                        </div>
                    </div>
                    <label for="">Nama</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama" value="<?php echo $tampil['nama']; ?>" required />
                        </div>
                    </div>
                    <label for="">Level</label>
                    <div class=" form-group">
                        <div class="form-line">
                            <select name="level" class="form-control show-tick">
                                <option value="admin" <?php if ($level == "admin") {
                                                            echo "selected";
                                                        } ?>>admin</option>
                                <option value="user" <?php if ($level == "user") {
                                                            echo "selected";
                                                        } ?>>user</option>
                            </select>
                        </div>
                    </div>
                    <label for="">Photo</label>
                    <div class="form-group">
                        <div class="form-line">
                            <img src="images/<?php echo $tampil['photo']; ?>" alt="" height="100" width="100">
                        </div>
                    </div>

                    <label for="">Ganti Photo</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="file" class="form-control" name="photo" />
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

                    if (!empty($lokasi)) {
                        $upload = move_uploaded_file($lokasi, "images/" . $photo);

                        $sql = $koneksi->query("UPDATE tb_pengguna SET username='$username', password='$password', nama='$nama', level='$level', photo='$photo' WHERE id='$kode2'");

                        if ($sql) {
                ?>
                            <script type="text/javascript">
                                alert("Data Berhasil Diubah !");
                                window.location.href = "?page=pengguna";
                            </script>

                        <?php
                        }
                    } else {

                        $sql = $koneksi->query("UPDATE tb_pengguna SET username='$username', password='$password', nama='$nama', level='$level' WHERE id='$kode2'");

                        if ($sql) {
                        ?>
                            <script type="text/javascript">
                                alert("Data Berhasil Diubah !");
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