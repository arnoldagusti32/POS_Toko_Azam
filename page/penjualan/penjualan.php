<?php
$kode = $_GET['kodepj'];

?>

<div class="row clearfix">
    <div class="body">
        <form method="POST">
            <div class="col-md-2">
                <input type="text" class="form-control" value="<?php echo $kode ?>" name="kode" readonly />
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="kode_barcode" autofocus />
            </div>
            <div class="col-md-2">
                <input type="submit" name="simpan" value="Tambahkan" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>