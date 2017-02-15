<?php 
session_start();
include 'koneksi.php';
$id = $_POST['id'];
$judul = $_POST['judul_profile'];
$isi = $_POST['isi_profile'];

$query = "UPDATE profile SET judul = '$judul', isi='$isi' WHERE  id_profile ='$id'";
$sql = mysql_query($query);

 echo "<meta http-equiv=refresh content=0;url=admin.php?cat=tampil_profile>";
 ?>