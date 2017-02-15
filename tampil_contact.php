<?php 
include "koneksi.php";
$query = "select * from contact where id_contact = 1";
$sql = mysql_query($query);
$data = mysql_fetch_array($sql);
 ?>

<center><hr><h2>CONTACT</h2><hr></center>
<table id="profile">
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo $data['email'];?></td>
	</tr>
	<tr>
		<td>Phone</td>
		<td>:</td>
		<td><?php echo $data['telepon'];?></td>
	</tr>
	<tr>
		<td>Address</td>
		<td>:</td>
		<td rowspan="2"><?php echo $data['alamat'];?></td>
	</tr>
</table>
<hr>
<center><h2>COMMENT</h2></center>
<hr>
<?php 

include 'tampil_comment_nonadmin.php';
 ?>

