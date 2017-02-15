<?php 
include 'koneksi.php';
session_start();

$username = $_SESSION['username'];

$user='user';
if($username == 'ipo'){
	$user = 'admin';
}

$nama = $_POST['nama'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$tanggal = date(d);
$bulan = date(M);
$tahun = date(y);

if($username == 'ipo'){
	$nama = 'ipo_admin';
	$email = 'ipo_admin';
}

$query = "insert into coment(nama,email,isi,tanggal,bulan,tahun)value('$nama','$email','$comment','$tanggal','$bulan','$tahun')";
$sql = mysql_query($query);
if($username=='ipo'){
echo "<meta http-equiv=refresh content=0;url=admin.php?cat=comment>";
}else{
	echo "<meta http-equiv=refresh content=0;url=index.php?cat=contact>";
}
 ?>