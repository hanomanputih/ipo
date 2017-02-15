<?php
session_start();
include "koneksi.php";
if ($_SESSION['username'] == "ipo"){ ?>
<center><div id="judul_menu">INPUT ASSISTANT</div></center>

 <form method="post" action="input_asisten.php" enctype="multipart/form-data">
            <table align="center" >
                <tr>
                    <td>Nama Asisten</td>
                    <td>: <input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Angkatan</td>
                    <td>: <input type="text" name="angkatan"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: <input type="text" name="email"/></td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>: <input type="text" name="telepon"></td>
                </tr>
                 <tr>
            <td>Foto (image/JPEG)</td>
            <td>: <input type="file" name="foto"></td>
        </tr>
                <tr>
                    <td></br><input type="reset" value="Reset" class="btn"> <input type="submit" value="Simpan" class="btn"></td>
                </tr>
            </table>
        </form>
        <?php }else{
            echo "ANDA HARUS LOGIN";
        } ?>