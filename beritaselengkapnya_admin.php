<?php 

include "koneksi.php";
@session_start();
$id = $_GET["lengkap"];
$username = $_SESSION['username'];
if($username == "ipo"){



$query= "select * from berita where id_berita = $id";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

$tahun = $row["tahun"]+2000;
	echo "<h2>".$row['judul']."</h2><i>".$row['tanggal']." ".$row['bulan']." ".$tahun."</i>";
			echo "<p>".$row['isi']."</p>";
					
		
?>

<a href="admin.php"><-- Back</a>

<?php }
else {
	echo "<meta http-equiv=refresh content=0;url=index.php?lengkap=$id>";
}
 ?>