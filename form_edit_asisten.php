<?php 
session_start();
if ($_SESSION['username'] == "ipo"){
include "koneksi.php";
$id = $_GET['cut'];
$query = "select * from asisten where id_asisten = $id";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

 ?>
<center><div id="judul_menu">EDIT</div></center>
 <form method="post" action="edit_asisten.php" enctype="multipart/form-data">
            <input type="text" name="id_asisten" value="<?php echo $row[id_asisten]?>" style="visibility:hidden">
            <table align="center">
                <tr>
                    <td>Nama Asisten</td>
                    <td>: <input type="text" name="nama" value="<?php echo $row['nama']?>"></td>
                </tr>
                <tr>
                    <td>Angkatan</td>
                    <td>: <input type="text" name="angkatan" value="<?php echo $row['angkatan']?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: <input type="text" name="email" value="<?php echo $row['email']?>"/></td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>: <input type="text" name="telepon" value="<?php echo $row['telepon']?>"></td>
                </tr>  
                
            </table>
        
<h6>Last Photo :</h6>
<img src="images/fotoasisten/<?php echo $row['foto']?>">
<p style="font-size:15px">Upload new Foto  (image/JPEG)<a style="color:red">(optional)</a> : <input type="file" name="foto"></p>
<center>
</br><input class="btn" type="reset" value="Reset"><input class="btn" type="submit" value="Simpan"></center>
</form>
<?php 

}else {
    echo "ANDA HARUS LOGIN";
}
 ?>