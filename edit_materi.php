<?php
session_start();
if ($_SESSION['username'] == "ipo"){
include 'koneksi.php';
$id = $_POST['id_materi'];
$judul_materi = $_POST['judul_materi'];

$query = "UPDATE materi SET judul_materi = '$judul_materi' WHERE  id_materi ='$id'";
// echo $judul_materi;
$tipe_file = $_FILES['file_materi']['type'];
$sql = mysql_query($query);
$lokasi_file = $_FILES['file_materi']['tmp_name'];


if ($tipe_file == "text/html" || 
        $tipe_file == "application/x-javascript" ||
        $tipe_file == "application/octet-stream" ||
        $tipe_file == "text/css"){
        echo "<center><h2>Invalid File Type</h2></center>";
        echo "<center><h4><a href=admin.php?cot=$id>Back</h4></center>";


    }else if((!empty($lokasi_file))&&($tipe_file != "text/html" || 
        $tipe_file != "application/x-javascript" ||
        $tipe_file != "application/octet-stream" ||
        $tipe_file != "text/css")){
        $tipe_file = $_FILES['file_materi']['type'];
        $nama_file = $_FILES['file_materi']['name'];
        $query ="SELECT * FROM counter where id_counter = 2";
        $result = mysql_query($query);
        $data_counter = mysql_fetch_array($result);
        $counter = $data_counter['angka']+1;
        $direktori = "materi/$counter$nama_file";
// echo $counter;
        move_uploaded_file($lokasi_file, $direktori);

        $query3 = "SELECT * from materi where id_materi = '$id'";
        $result3 = mysql_query($query3);
        $data3 = mysql_fetch_array($result3);
        $materi3 = $data3['nama_file'];
        $file_materi1 = "materi/$materi3";
        @$hapus = unlink($file_materi1);


$query2 = "UPDATE counter set angka = '$counter' where id_counter = 2";
$result= mysql_query($query2);

$query1 = "update materi set nama_file = '$counter$nama_file'";
$result1 = mysql_query($query1);
// echo "$judul_materi , $nama_file , $tipe_file";
 echo "<meta http-equiv=refresh content=0;url=admin.php?cat=materi>";
}else {
    echo "<meta http-equiv=refresh content=0;url=admin.php?cat=materi>";
}
// echo "$newdirektori";
} else{
    echo "ANDA HARUS LOGIN";
}
?>
