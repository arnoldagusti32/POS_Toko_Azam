<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "kodepj.php";
include "kodebl.php";
$koneksi = new mysqli("localhost", "root", "", "db_pos");
if ($_SESSION['admin'] || $_SESSION['kasir']) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>POS - Toko Azam Grosir</title>
        <!-- Favicon-->
        <link rel="shortcut icon" href="images/favicon.ico">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- JQuery DataTable Css -->
        <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

        <!-- Animation Css -->
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Bootstrap Select Css -->
        <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-blue-grey">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        <!-- Search Bar -->
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="index.php">TOKO AZAM GROSIR</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
        if ($_SESSION['admin']) {
            $user = $_SESSION['admin'];
        } elseif ($_SESSION['kasir']) {
            $user = $_SESSION['kasir'];
        }

        $sql = $koneksi->query("SELECT * FROM tb_pengguna WHERE id='$user'");
        $data = $sql->fetch_assoc();

        ?>

        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">
                <!-- User Info -->
                <div class="user-info">
                    <div class="image">
                        <img src="images/<?php echo $data['photo']; ?>" width="50" height="50" alt="User" />
                    </div>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-transform:uppercase;"><?php echo $data['nama']; ?></div>
                        <div class="email">Anda Login Sebagai : <span style="text-transform:uppercase;"> <?php echo $data['level']; ?></span></div>
                        <div class="btn-group user-helper-dropdown">
                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="?page=profile"><i class="material-icons">person</i>Profile</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #User Info -->
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active">
                            <a href="index.php">
                                <i class="material-icons">home</i>
                                <span>Home</span>
                            </a>
                        </li>
                        <?php
                        if ($_SESSION['admin']) {
                        ?>
                            <li class="active">
                                <a href="?page=supplier">
                                    <i class="material-icons">local_shipping</i>
                                    <span>Supplier</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="?page=barang">
                                    <i class="material-icons">view_module</i>
                                    <span>Barang</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="?page=pelanggan">
                                    <i class="material-icons">face</i>
                                    <span>Pelanggan</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="?page=pengguna">
                                    <i class="material-icons">supervisor_account</i>
                                    <span>Pengguna</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="active">
                            <a href="?page=penjualan&kodepj=<?php echo $kode; ?>">
                                <i class="material-icons">shopping_basket</i>
                                <span>Penjualan</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="?page=pembelian&kodebl=<?php echo $kodebl; ?>">
                                <i class="material-icons">local_atm</i>
                                <span>Pembelian</span>
                            </a>
                        </li>
                        <li class="active">
                            <a data-toggle="modal" data-target="#smallModal">
                                <i class="material-icons">insert_drive_file</i>
                                <span>Laporan Penjualan</span>
                            </a>
                        </li>
                        <li>
                            <ul class="ml-menu">
                            </ul>
                        </li>
                        <li>
                            <ul class="ml-menu">
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- #Menu -->
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
                        &copy; <script>
                            document.write(new Date().getFullYear());
                        </script> <a href="#">Azam Grosir</a>.
                    </div>
                    <div class="version">
                        <b>Version: </b> 1.0.0
                    </div>
                </div>
                <!-- #Footer -->
            </aside>
            <!-- #END# Left Sidebar -->
            <!-- Right Sidebar -->
            <aside id="rightsidebar" class="right-sidebar">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                        <ul class="demo-choose-skin">
                            <li data-theme="red">
                                <div class="red"></div>
                                <span>Red</span>
                            </li>
                            <li data-theme="pink">
                                <div class="pink"></div>
                                <span>Pink</span>
                            </li>
                            <li data-theme="purple">
                                <div class="purple"></div>
                                <span>Purple</span>
                            </li>
                            <li data-theme="deep-purple">
                                <div class="deep-purple"></div>
                                <span>Deep Purple</span>
                            </li>
                            <li data-theme="indigo">
                                <div class="indigo"></div>
                                <span>Indigo</span>
                            </li>
                            <li data-theme="blue">
                                <div class="blue"></div>
                                <span>Blue</span>
                            </li>
                            <li data-theme="light-blue">
                                <div class="light-blue"></div>
                                <span>Light Blue</span>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                                <span>Cyan</span>
                            </li>
                            <li data-theme="teal">
                                <div class="teal"></div>
                                <span>Teal</span>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                                <span>Green</span>
                            </li>
                            <li data-theme="light-green">
                                <div class="light-green"></div>
                                <span>Light Green</span>
                            </li>
                            <li data-theme="lime">
                                <div class="lime"></div>
                                <span>Lime</span>
                            </li>
                            <li data-theme="yellow">
                                <div class="yellow"></div>
                                <span>Yellow</span>
                            </li>
                            <li data-theme="amber">
                                <div class="amber"></div>
                                <span>Amber</span>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                                <span>Orange</span>
                            </li>
                            <li data-theme="deep-orange">
                                <div class="deep-orange"></div>
                                <span>Deep Orange</span>
                            </li>
                            <li data-theme="brown">
                                <div class="brown"></div>
                                <span>Brown</span>
                            </li>
                            <li data-theme="grey">
                                <div class="grey"></div>
                                <span>Grey</span>
                            </li>
                            <li data-theme="blue-grey" class="active">
                                <div class="blue-grey"></div>
                                <span>Blue Grey</span>
                            </li>
                            <li data-theme="black">
                                <div class="black"></div>
                                <span>Black</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
            <!-- #END# Right Sidebar -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <?php

                    $page = $_GET['page'];
                    $aksi = $_GET['aksi'];

                    if ($page == "barang") {
                        if ($aksi == "") {
                            include "page/barang/barang.php";
                        } elseif ($aksi == "tambah") {
                            include "page/barang/tambah.php";
                        } elseif ($aksi == "ubah") {
                            include "page/barang/ubah.php";
                        } elseif ($aksi == "hapus") {
                            include "page/barang/hapus.php";
                        }
                    } elseif ($page == "pelanggan") {
                        if ($aksi == "") {
                            include "page/pelanggan/pelanggan.php";
                        } elseif ($aksi == "tambah") {
                            include "page/pelanggan/tambah.php";
                        } elseif ($aksi == "ubah") {
                            include "page/pelanggan/ubah.php";
                        } elseif ($aksi == "hapus") {
                            include "page/pelanggan/hapus.php";
                        }
                    } elseif ($page == "pengguna") {
                        if ($aksi == "") {
                            include "page/pengguna/pengguna.php";
                        } elseif ($aksi == "tambah") {
                            include "page/pengguna/tambah.php";
                        } elseif ($aksi == "ubah") {
                            include "page/pengguna/ubah.php";
                        } elseif ($aksi == "hapus") {
                            include "page/pengguna/hapus.php";
                        }
                    } elseif ($page == "penjualan") {
                        if ($aksi == "") {
                            include "page/penjualan/penjualan.php";
                        } elseif ($aksi == "tambah") {
                            include "page/penjualan/tambah.php";
                        } elseif ($aksi == "kurang") {
                            include "page/penjualan/kurang.php";
                        } elseif ($aksi == "hapus") {
                            include "page/penjualan/hapus.php";
                        }
                    } elseif ($page == "supplier") {
                        if ($aksi == "") {
                            include "page/supplier/supplier.php";
                        } elseif ($aksi == "tambah") {
                            include "page/supplier/tambah.php";
                        } elseif ($aksi == "ubah") {
                            include "page/supplier/ubah.php";
                        } elseif ($aksi == "hapus") {
                            include "page/supplier/hapus.php";
                        }
                    } elseif ($page == "pembelian") {
                        if ($aksi == "") {
                            include "page/pembelian/pembelian.php";
                        } elseif ($aksi == "tambah") {
                            include "page/pembelian/tambah.php";
                        } elseif ($aksi == "kurang") {
                            include "page/pembelian/kurang.php";
                        } elseif ($aksi == "hapus") {
                            include "page/pembelian/hapus.php";
                        }
                    } elseif ($page == "profile") {
                        include "page/profile.php";
                    } else {
                        include "home.php";
                    }

                    ?>
                </div>
            </div>
        </section>

        <!-- Small Size -->
        <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">Laporan Penjualan</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="page/penjualan/laporan.php" target="_blank">
                            <label for="">Tanggal Awal</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="tgl_awal" required />
                                </div>
                            </div>
                            <label for="">Tanggal Akhir</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="tgl_akhir" required />
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn bg-indigo waves-effect"><i class="material-icons">print</i> Cetak</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i class="material-icons">clear</i> CLOSE</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Jquery Core Js -->
        <script src="plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
        <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="plugins/node-waves/waves.js"></script>

        <!-- Jquery DataTable Plugin Js -->
        <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

        <!-- Jquery CountTo Plugin Js -->
        <script src="plugins/jquery-countto/jquery.countTo.js"></script>

        <!-- Sparkline Chart Plugin Js -->
        <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

        <!-- Custom Js -->
        <script src="js/admin.js"></script>
        <script src="js/pages/tables/jquery-datatable.js"></script>
        <script src="js/pages/widgets/infobox/infobox-2.js"></script>

        <!-- Demo Js -->
        <script src="js/demo.js"></script>
    </body>

    </html>
<?php
} else {
    header("location:login.php");
}
?>