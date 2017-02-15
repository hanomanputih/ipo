<?php 
include "koneksi.php";

$id = $_GET["lengkap"];

$query= "select * from berita where id_berita = $id";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

$tahun = $row["tahun"]+2000;
	echo "<h2>".$row['judul']."</h2><i>".$row['tanggal']." ".$row['bulan']." ".$tahun."</i>";
			echo "<p>".$row['isi']."</p>";
					
		
?>

<a href="index.php"><-- Back</a>