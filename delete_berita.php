<?php 
session_start();
include "koneksi.php";
// @session_start();
if ($_SESSION['username'] == "ipo") {
$id = $_GET['cat'];

$query = "delete from berita where id_berita= $id";
$sql = mysql_query($query);
// echo "$id";
echo "<meta http-equiv=refresh content=0;url=admin.php>";
}else{
	echo "ANDA HARUS LOGIN";
}
 ?>