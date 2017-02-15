<?php 
session_start();
include 'koneksi.php';
$id = $_POST['id'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];
// echo $email;
// echo $id;
$alamat = $_POST['alamat'];

$query = "UPDATE contact SET telepon = '$telepon', alamat='$alamat' , email = '$email' WHERE  id_contact ='$id'";
$sql = mysql_query($query);

 echo "<meta http-equiv=refresh content=0;url=admin.php?cat=contact>";
 ?>