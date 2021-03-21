<div class="row clearfix">
    <div class="col-xs-12 col-sm-5">
        <div class="card profile-card">
            <div class="profile-header">&nbsp;</div>
            <div class="profile-body">
                <div class="image-area">
                    <img src="images/<?php echo $data['photo']; ?>" width="100" height="100" alt="User" />
                </div>
                <div class="content-area">
                    <h3><?php echo $data['nama']; ?></h3>
                    <p>Toko Azam Grosir "Bukan Terbesar Tapi Terpercaya"</p>
                    <p><span style="text-transform:uppercase;"> <?php echo $data['level']; ?></span></p>
                </div>
            </div>
            <div class="profile-footer">
                <ul>
                    <li>
                        <span></span>
                        <span></span>
                    </li>
                </ul>
                <button class="btn bg-blue btn-lg waves-effect btn-block">
                    <i class="material-icons">verified_user</i>
                    <span>VERIFIED USER</span>
                </button>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-7">
        <div class="card">
            <div class="body">
                <div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="change_password_settings">
                            <form class="form-horizontal" method="POST">
                                <div class="form-group">
                                    <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                    <div class="col-sm-9">
                                        <div class="form-line">
                                            <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                    <div class="col-sm-9">
                                        <div class="form-line">
                                            <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                    <div class="col-sm-9">
                                        <div class="form-line">
                                            <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="New Password (Confirm)" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" name="change" class="btn btn-danger">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['change'])) {
        $old = $_POST['OldPassword'];
        $new = $_POST['NewPassword'];
        $confirm = $_POST['NewPasswordConfirm'];

        $cek = $koneksi->query("SELECT password FROM tb_pengguna WHERE password='$old'");

        if ($cek->num_rows) {
            if ($new == $confirm) {
                $update = $koneksi->query("UPDATE tb_pengguna SET password='$new' WHERE id='$user'");
                if ($update) {
    ?>
                    <script type="text/javascript">
                        alert("Password Berhasil Diubah !");
                        window.location.href = "?page=profile"
                    </script>
                <?php
                } else {
                ?>
                    <script type="text/javascript">
                        alert("Password Gagal Diubah !");
                        window.location.href = "?page=profile"
                    </script>
                <?php
                }
            } else {
                ?>
                <script type="text/javascript">
                    alert("Konfirmasi Password Tidak Cocok !");
                    window.location.href = "?page=profile"
                </script>
            <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                alert("Password Lama Tidak Cocok !");
                window.location.href = "?page=profile"
            </script>
    <?php
        }
    }

    ?>