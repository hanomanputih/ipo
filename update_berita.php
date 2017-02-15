<?php 
session_start();
include 'koneksi.php';
$id = $_POST['id'];
$judul = $_POST['judul_berita'];
$isi = $_POST['isi_berita'];

$query = "UPDATE berita SET judul = '$judul', isi='$isi' WHERE  id_berita ='$id'";
$sql = mysql_query($query);

 echo "<meta http-equiv=refresh content=0;url=admin.php>";
 ?>