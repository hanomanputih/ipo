<?php 
session_start();
include "koneksi.php";

$id =	$_GET['cot'];
// echo $id;

$query = "select * from materi where id_materi = '$id'";
$result = mysql_query($query);
$data = mysql_fetch_array($result);

// echo $data['nama_file'];

$nama_file = $data['nama_file'];

$file = "materi/$nama_file";

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
} else {
	echo "<center><h3>File not Found</h3></center>";
	echo "<h4><center><a href=admin.php?cat=materi>BACK</a></center></h4>";
}

//===========================================

// $file = 'materi/$nama_file';
// $download_name = basename($file);
// if (file_exists($file)) {
//     header('Content-Type: application/octet-stream');
//     header('Content-Disposition: attachment; filename='.$download_name);
//     header('X-Sendfile: '.$file);
//     exit;
// } else {
// 	echo "GAGAL";
// }



// header('Content-Disposition: attachment; filename=$direktori');
 ?>