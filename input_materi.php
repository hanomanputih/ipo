<?php 
session_start();
include "koneksi.php";

// $id = $_POST['id_materi'];

$judul_materi = $_POST['judul_materi'];


$lokasi_file = $_FILES['file_materi']['tmp_name'];
$tipe_file = $_FILES['file_materi']['type'];
$nama_file = $_FILES['file_materi']['name'];

if($tipe_file == "text/html" || 
	$tipe_file == "application/x-javascript" ||
	$tipe_file == "application/octet-stream" ||
	$tipe_file == "text/css"
	 ){
	echo "<center><h2>Invalid File Type</h2></center>";
	echo "<center><h4><a href=admin.php?cat=materi>Back</h4></center>";

}else {
$query ="SELECT * FROM counter where id_counter = 2";
$result = mysql_query($query);
$data_counter = mysql_fetch_array($result);
$counter = $data_counter['angka']+1;
$direktori = "materi/$counter$nama_file";
// echo $counter;
move_uploaded_file($lokasi_file, $direktori);
$query2 = "UPDATE counter set angka = '$counter' where id_counter = 2";
$result= mysql_query($query2);

$query1 = "INSERT INTO `materi` (
`id_materi` ,
`judul_materi` ,
`nama_file` 
)
VALUES (
NULL ,  '$judul_materi',  '$counter$nama_file'
)";
$result1 = mysql_query($query1);
// echo "$judul_materi , $nama_file , $tipe_file";
 echo "<meta http-equiv=refresh content=0;url=admin.php?cat=materi>";
// echo $tipe_file;
}
 ?>