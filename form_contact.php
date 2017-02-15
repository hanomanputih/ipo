<?php
session_start();
include "koneksi.php";
$_SESSION['isLoggedIn'] = true;
// $id = $_GET['cit'];
$query = "select * from contact where id_contact = 1";
$sql = mysql_query($query);
$data = mysql_fetch_array($sql);

if ($_SESSION['username'] != false) {
?>
<html>
<head>
<!-- Load TinyMCE -->
<script type="text/javascript" src="jquery-1.7.min.js"></script>
<script type="text/javascript" src="tinymce/jquery.tinymce.js"></script>
<script type="text/javascript">
        $().ready(function() {
                $('textarea.tinymce').tinymce({
                        // Location of TinyMCE script
                        script_url : 'tinymce/tiny_mce.js',

                        // General options
                        theme : "advanced",
                        plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist,imagemanager",

                        // Theme options
                        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,|,insertimage",
                        theme_advanced_toolbar_location : "top",
                        theme_advanced_toolbar_align : "left",
                        theme_advanced_statusbar_location : "bottom",
                        theme_advanced_resizing : true,

                        
                });
        });

</script>
<!-- /TinyMCE -->
</head>
<body>
        <h2>UPDATE CONTACT</h2><hr></br>
<form  method="POST" action="update_contact.php">
<input type="text" name="id" value="<?php echo $data['id_contact']?>" style="visibility:hidden">

<table>
	<tr>
		<td>Telepon</td>
		<td>:</td>
		<td><input type="text" name="telepon" value="<?php echo $data['telepon']?>"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><input type="text" name="email" value="<?php echo $data['email']?>"></td>
	</tr>
</table>
<p style="font-size:15px">Alamat : </p>
<textarea class='tinymce' name='alamat' style="height:40px"><?php echo $data['alamat']?></textarea>
</br>
<input class="btn" type="reset" name="reset" value="Reset" />
<input class="btn" type="submit" name="save" value="Submit" onclick="TINY.box.show({html:'The Update has successfully!',animate:false,close:false,mask:false,boxid:'success',autohide:5,top:45,left:400})"/>

</form>
</body>
</html>

<?php
}
else {
	echo "ANDA HARUS LOGIN";
}
?>