<?php 
include 'koneksi.php';
@session_start();

$username = $_SESSION['username'];
?>

<?php if($username == 'ipo'){ ?>

<!-- <center><div id="judul_menu">Comment</div></center> -->

<?php } ?>

 <form method="post" action="input_comment.php" enctype="multipart/form-data">
            <table align="center" >

                <?php if($username != 'ipo'){ ?>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td> <input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td> <input type="text" name="email"></td>
                </tr>
                <?php } ?>
                <tr>
                    <td>Comment</td>
                    <td>:</td>
                    <td> <textarea name='comment' style="height:40px"></textarea></td>
                </tr>
                <tr>
                    <td></br><input type="reset" value="Reset" class="btn"> <input type="submit" value="Send" class="btn"></td>
                </tr>
            </table>
        </form>