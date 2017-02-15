<?php
session_start();
$_SESSION['isLoggedIn'] = true;
if ($_SESSION['username'] != false) {
?>
<html>
<head>
<!-- Load TinyMCE -->
<script type="text/javascript" src="tinybox2/tinybox.js"></script>
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
        <h2 id="judul_menu">UPDATE NEWS</h2>
<form method="POST" action="input_berita.php">
<h2>Judul : <input class="judul" type="text" name="judul_berita" ></h2></br>
<h6>Isi Berita</h6>
<textarea class='tinymce' name='isi_berita' style="height:40px"></textarea>
</br>
<input type="reset" name="reset" value="Reset" class="btn"/>
<input type="submit" name="save" value="Submit" class="btn" onclick="TINY.box.show({html:'The entry has successfully!',animate:false,close:false,mask:false,boxid:'success',autohide:5,top:45,left:400})"/>

</form>
<!-- <a >coba</a> -->
</body>
</html>

<?php
}
else {
	echo "ANDA HARUS LOGIN";
}
?>