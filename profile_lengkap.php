<?php 
include "koneksi.php";

$prolengkap = $_GET["prolengkap"];

$query= "select * from profile where id_profile = $prolengkap";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

$tahun = $row["tahun"]+2000;
	echo "<h2>".$row['judul']."</h2><i>".$row['tanggal']." ".$row['bulan']." ".$tahun."</i>";
			echo "<p>".$row['isi']."</p>";
					
		
?>

<a href="index.php?cat=pro_lab"><-- Back</a>