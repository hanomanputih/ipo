<?php 
session_start();
include "koneksi.php";
if ($_SESSION['username'] == "ipo"){
$id = $_GET['cot'];
$query = "select * from materi where id_materi = $id";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

 ?>
<center><div id="edit_materi">EDIT MATERI</div></center>
 <form method="post" action="edit_materi.php" enctype="multipart/form-data">
            <input type="text" name="id_materi" value="<?php echo $row[id_materi]?>" style="visibility:hidden">
            <table align="center">
                <tr>
                    <td>Judul Materi</td>
                    <td>: <input type="text" name="judul_materi" value="<?php echo $row['judul_materi']?>"></td>
                </tr>
            </table>
        
<h6>Last File :</h6>
<h7><?php echo $row['nama_file']?></h7>
<p style="font-size:15px">Upload new File (not html/php/css) : <a style="color:red">(optional)</a> : <input type="file" name="file_materi"></p>
<center></br><input class="btn" type="reset" value="Reset"><input class="btn" type="submit" value="Simpan"></center>
</form>
<?php 

}else{
	echo "ANDA HARUS LOGIN";
} ?>