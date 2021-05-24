<?php
$kode2 = $_GET['id'];
$sql2 = $koneksi->query("SELECT * FROM tb_pelanggan WHERE kode_pelanggan ='$kode2'");
$tampil = $sql2->fetch_assoc();

?>

<!-- Input -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    UBAH PELANGGAN
                </h2>
            </div>

            <div class="body">
                <form method="POST">
                    <label for="">Kode Pelanggan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="kode_pelanggan" value="<?php echo $tampil['kode_pelanggan']; ?>" readonly />
                        </div>
                    </div>
                    <label for="">Nama</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama" value="<?php echo $tampil['nama']; ?>" required />
                        </div>
                    </div>
                    <label for="">Alamat</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea rows="4" class="form-control no-resize" name="alamat" required><?php echo $tampil['alamat']; ?></textarea>
                        </div>
                    </div>
                    <label for="">Telepon</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="telepon" value="<?php echo $tampil['telepon']; ?>" required />
                        </div>
                    </div>
                    <label for="">Email</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" value="<?php echo $tampil['email']; ?>" required />
                        </div>
                    </div>

                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </form>

                <?php
                if (isset($_POST["simpan"])) {
                    $kode_pelanggan = $_POST["kode_pelanggan"];
                    $nama = $_POST["nama"];
                    $alamat = $_POST["alamat"];
                    $telepon = $_POST["telepon"];
                    $email = $_POST["email"];

                    $sql = $koneksi->query("UPDATE tb_pelanggan SET nama='$nama', alamat='$alamat', telepon='$telepon', email='$email' WHERE kode_pelanggan='$kode2'");

                    if ($sql) {
                ?>
                        <script type="text/javascript">
                            alert("Data Berhasil Diubah !");
                            window.location.href = "?page=pelanggan";
                        </script>

                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>