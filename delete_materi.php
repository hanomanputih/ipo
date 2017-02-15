<?php 
session_start();
include "koneksi.php";
// @session_start();
if ($_SESSION['username'] == "ipo") {
$id = $_GET['cat'];

$query = "select * from materi";
$result = mysql_query($query);
$data = mysql_fetch_array($result);


$query1 = "delete from materi where id_materi = '$id'";
$result1 = mysql_query($query1);

$file_name = $data['nama_file'];
$direktori = "materi/$file_name";
@$hapus = unlink($direktori);

echo "<meta http-equiv=refresh content=0;url=admin.php?cat=materi>";
}else{
	echo "ANDA HARUS LOGIN";
}
 ?>