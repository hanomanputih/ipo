<?php

include "../koneksi.php";
$username = $_POST["username"];
$password = $_POST["password"];
$query = "select * from user where username='$username' and pass='$password'";
$tampil = mysql_query($query);
$jumlah = mysql_num_rows($tampil);

if ($jumlah > 0) {
    session_start();
    $_SESSION ["username"] = $username;
    echo "<meta http-equiv=refresh content=0;url=../admin.php>";
} 

else{
	echo "<br><center><h1><u>Username and Password is not Match</u></h1></center>";
}
?>