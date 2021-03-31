<?php
date_default_timezone_set('Asia/Jakarta');
?>

..
<script type="text/javascript">
    function tampilkanwaktu() { //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik    
        var waktu = new Date(); //membuat object date berdasarkan waktu saat 
        var sh = waktu.getHours() + ""; //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
        var sm = waktu.getMinutes() + ""; //memunculkan nilai detik    
        var ss = waktu.getSeconds() + ""; //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
    }
</script>

<?php
$hari = date('l');
/*$new = date('l, F d, Y', strtotime($Today));*/
if ($hari == "Sunday") {
    $day = "Minggu";
} elseif ($hari == "Monday") {
    $day = "Senin";
} elseif ($hari == "Tuesday") {
    $day = "Selasa";
} elseif ($hari == "Wednesday") {
    $day = "Rabu";
} elseif ($hari == "Thursday") {
    $day = ("Kamis");
} elseif ($hari == "Friday") {
    $day = "Jum'at";
} elseif ($hari == "Saturday") {
    $day = "Sabtu";
}
$tgl = date('d');
$bulan = date('F');
if ($bulan == "January") {
    $month = " Januari ";
} elseif ($bulan == "February") {
    $month = " Februari ";
} elseif ($bulan == "March") {
    $month = " Maret ";
} elseif ($bulan == "April") {
    $month = " April ";
} elseif ($bulan == "May") {
    $month = " Mei ";
} elseif ($bulan == "June") {
    $month = " Juni ";
} elseif ($bulan == "July") {
    $month = " Juli ";
} elseif ($bulan == "August") {
    $month = " Agustus ";
} elseif ($bulan == "September") {
    $month = " September ";
} elseif ($bulan == "October") {
    $month = " Oktober ";
} elseif ($bulan == "November") {
    $month = " November ";
} elseif ($bulan == "December") {
    $month = " Desember ";
}
$tahun = date('Y');
?>