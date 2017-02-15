<center><div id="judul_menu">MATERI</div></center>

<hr><center><h5>Input Materi</h5></center><hr>
 <form method="post" action="input_materi.php" enctype="multipart/form-data">
           <!-- <input type="text" name="id_materi" visibility="hidden"> -->
           <table align="center" >
                <tr>
                    <td>Judul Materi</td>
                    <td>: <input type="text" name="judul_materi"></td>
                </tr>
                 <tr>
            <td>File Materi (not html/php/css)</td>
            <td>: <input type="file" name="file_materi"></td>
        </tr>
                <tr>
                    <td></br><center><input class="btn" type="reset" value="Reset"><input class="btn" type="submit" value="Simpan"><center></td>
                </tr>
            </table>
        </form>

<?php 
include "tampil_materi.php";
 ?>