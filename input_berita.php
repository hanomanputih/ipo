<?php

session_start();
include "koneksi.php";
$judul = $_POST['judul_berita'];
$isi = $_POST['isi_berita'];
$tanggal = date(d);
$bulan = date(M);
$tahun = date(y);

$query = "insert into berita(judul,isi,tanggal,bulan,tahun)value('$judul','$isi','$tanggal','$bulan','$tahun')";
$sql = mysql_query($query);
echo "<meta http-equiv=refresh content=0;url=admin.php?cat=input_berita>";
?>