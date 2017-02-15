<?php

session_start();
include "koneksi.php";
$judul = $_POST['judul_profile'];
$isi = $_POST['isi_profile'];
$tanggal = date(d);
$bulan = date(M);
$tahun = date(y);

$query = "insert into profile(judul,isi,tanggal,bulan,tahun)value('$judul','$isi','$tanggal','$bulan','$tahun')";
$sql = mysql_query($query);
echo "<meta http-equiv=refresh content=0;url=admin.php?cat=input_profile>";
?>