<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA PENGGUNA
                </h2>
                <h3><a href="?page=pengguna&aksi=tambah" class="btn btn-primary"><i class="material-icons">add</i> Tambah</a></h3>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Nama</th>
                                <th>Level</th>
                                <th>Photo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Nama</th>
                                <th>Level</th>
                                <th>Photo</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $koneksi->query("SELECT * FROM tb_pengguna");

                            while ($data = $sql->fetch_assoc()) {

                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['password']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['level']; ?></td>
                                    <td> <img src="images/<?php echo $data['photo']; ?>" alt="Pengguna" width="50" height="50">
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <a href="?page=pengguna&aksi=ubah&id=<?php echo $data['id']; ?>" class="btn btn-success"><i class="material-icons">edit</i> Ubah</a>
                                        <a href="?page=pengguna&aksi=hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini ...???')"><i class="material-icons">delete</i> Hapus</a>
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