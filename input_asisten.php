<?php

session_start();
include "koneksi.php";

include "imgresize.php";

$nama = $_POST['nama'];
$angkatan = $_POST['angkatan'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
// $id = $_POST['id_asisten'];
// $jabatan = $_POST['jabatan'];
// $gaji = $_POST['gaji'];
//========================================
$tipe_file = $_FILES['foto']['type'];
if ($tipe_file == "image/jpeg"){

$firstname = "ipo_";
$lokasi_file = $_FILES['foto']['tmp_name'];

$nama_file = $_FILES['foto']['name'];
$direktori = "images/fotoasisten/$nama_file";
$newdirektori = "images/fotoasisten/$firstname$nama_file";
$size = '150';
move_uploaded_file($lokasi_file, $direktori);
resize($direktori,$newdirektori,$size);


//========================================
if($nama==null||$angkatan==null||$email==null||$telepon==null){
    echo "<h1 align=\"center\">Inputan Tidak Valid</h1><br/><center><a href=\"admin.php?cat=pegawai\">ULANGI INPUTAN</a></center>";
}else {

$que =  "INSERT INTO `asisten` (
`id_asisten` ,
`nama` ,
`angkatan` ,
`email` ,
`telepon` ,
`foto`
)
VALUES (
NULL ,  '$nama',  '$angkatan',  '$email',  '$telepon',  '$firstname$nama_file'
)";
$sql = mysql_query($que);
// echo "$tipe_file";
// echo "$nama , $angkatan , $email , $telepon, $nama_file";
echo "<meta http-equiv=refresh content=0;url=admin.php?cat=tampil_asisten>";
}
}else {
	echo "<center><h2>Photo is Not JPEG Format<h2></ceter>";
	echo "<center><h7><a href='admin.php?cat=input_asisten'>BACK</a></h7></center>";

}
?>
