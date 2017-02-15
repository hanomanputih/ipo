<?php 
@session_start();
include "koneksi.php";
// $_SESSION['isLoggedIn'] = true;
if ($_SESSION['username'] == "ipo") {
$id = $_GET['cat'];

$query1 = "SELECT * FROM asisten WHERE id_asisten ='$id'";
$sql1 = mysql_query($query1);
$row = mysql_fetch_array($sql1);

$filename = $row['foto'];
$direktori = "images/fotoasisten/$filename";
@$delete = unlink($direktori);

$query = "delete from asisten where id_asisten= $id";
$sql = mysql_query($query);
// echo "$direktori";
echo "<meta http-equiv=refresh content=0;url=admin.php?cat=tampil_asisten>";
} else{
	echo "ANDA HARUS LOGIN";
}
 ?>