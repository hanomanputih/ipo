<?php 
session_start();
if ($_SESSION['username'] == "ipo"){
include "koneksi.php";
$id = $_GET['cat'];

$query = "delete from coment where id_coment= $id";
$sql = mysql_query($query);
// echo "$id";
echo "<meta http-equiv=refresh content=0;url=admin.php?cat=comment>";
}else {
	echo "ANDA HARUS LOGIN";
}
 ?>