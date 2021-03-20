<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA SUPPLIER
                </h2>
                <h3><a href="?page=supplier&aksi=tambah" class="btn btn-primary"><i class="material-icons">add</i> Tambah</a></h3>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $koneksi->query("SELECT * FROM tb_supplier");

                            while ($data = $sql->fetch_assoc()) {

                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data["nama"]; ?></td>
                                    <td><?php echo $data["alamat"]; ?></td>
                                    <td><?php echo $data["telepon"]; ?></td>
                                    <td><?php echo $data["email"]; ?></td>
                                    <td class="d-flex justify-content-center">
                                        <a href="?page=supplier&aksi=ubah&id=<?php echo $data['kode_supplier']; ?>" class="btn btn-success"><i class="material-icons">edit</i> Ubah</a>
                                        <a href="?page=supplier&aksi=hapus&id=<?php echo $data['kode_supplier']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini ...???')"><i class="material-icons">delete</i> Hapus</a>
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