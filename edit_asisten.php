<?php
session_start();
if ($_SESSION['username'] == "ipo"){
include 'koneksi.php';
include "imgresize.php";
$id = $_POST['id_asisten'];
$nama = $_POST['nama'];
$angkatan = $_POST['angkatan'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];

$query = "UPDATE asisten SET nama = '$nama', angkatan='$angkatan' , email='$email' , telepon='$telepon' WHERE  id_asisten ='$id'";
$sql = mysql_query($query);
$lokasi_file = $_FILES['foto']['tmp_name'];
$tipe_file = $_FILES['foto']['type'];

if ((!empty($lokasi_file))&&($tipe_file == "image/jpeg")) {

$firstname = "ipo_";
$lokasi_file = $_FILES['foto']['tmp_name'];

$nama_file = $_FILES['foto']['name'];
$direktori = "images/fotoasisten/$nama_file";
$newdirektori = "images/fotoasisten/$firstname$nama_file";
$size = '150';
move_uploaded_file($lokasi_file, $direktori);
resize($direktori,$newdirektori,$size);
    // $tipe_file = $_FILES['foto']['type'];
    // $nama_file = $_FILES['foto']['name'];
    // $direktori = "images/fotoasisten/$nama_file";

    // move_uploaded_file($lokasi_file, $direktori);

    $query2 = "SELECT * FROM asisten WHERE id_asisten ='$id'";

    $sql2 = mysql_query($query2);
    while ($data1 = mysql_fetch_array($sql2)) {
        $fotolama = $data1['foto'];
        $hapus = "images/fotoasisten/$fotolama";
        @$hapusfoto = unlink($hapus);

        $query1 = "UPDATE  asisten SET foto = '$firstname$nama_file' WHERE  id_asisten ='$id'";

        $sql1 = mysql_query($query1);
        echo "<meta http-equiv=refresh content=0;url=admin.php?cat=tampil_asisten>";
    }
} else if((!empty($lokasi_file))&&($tipe_file != "image/jpeg")){
    echo "<center><h2>Invalid File Type</h2></center>";
        echo "<center><h4><a href=admin.php?cat=materi>Back</h4></center>";
}
// echo "$newdirektori";
}else{
    echo "ANDA HARUS LOGIN";
}
?>
