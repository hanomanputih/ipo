<?php

@session_start();
include 'koneksi.php';
$username = $_SESSION['username'];
if($username=="ipo"){
	include "header_admin.php";
?>

</br>
    <div id="col1">
<?php
$pagecom = $_GET['pagecom'];
$search = $_POST['search'];
$pagesrc = $_GET['pagesrc'];
$id_berita = null;
$id_asisten = null;
$id_materi = null;
// $beritalengkap = null;
$id_berita = $_GET['cit'];
$id_asisten = $_GET['cut'];
$id_materi = $_GET['cot'];
$page1 = $_GET['page1'];
$pagem = $_GET['pagem'];
$pagepro = $_GET['pagepro'];
$lengkap = $_GET['lengkap'];
$idpro = $_GET['editpro'];
$prolengkap = $_GET['prolengkap'];
if (($id_asisten != null) && (!isset($_GET["cat"]))) {
    include "form_edit_asisten.php";
}else if ($pagesrc != null || $search != null) {
    include "search.php";
}else if (($id_berita != null) && (!isset($_GET["cat"]))) {
    include "edit_berita.php";
}else if (($id_materi != null) && (!isset($_GET["cat"]))) {
    include "form_edit_materi.php";
} else if (($page1 != null) || ($_GET["cat"] == "tampil_asisten")) {
    include "tampil_asisten_admin.php";
}else if (($pagem!= null)||($_GET["cat"] == "materi")) {
    include "materi_admin.php";
}else if ($pagepro!= null) {
    include "tampil_profile_admin.php";
}else if (($idpro!= null)) {
    include "edit_profile.php";
}else if($lengkap != null){
    include "beritaselengkapnya_admin.php";
}else if($prolengkap != null){
    include "profile_lengkap_admin.php";
}else if($pagecom != null){
    include "tampil_comment.php";
}


else if (($_GET["cat"] == "tampil_berita") or (!isset($_GET["cat"]))) {
    include "tampilberita_admin.php";
} else if ($_GET["cat"] == "input_berita") {
    include "beranda.php";
}  else if($_GET["cat"] == "input_asisten"){
    include "form_input_asisten.php";
}else if ($_GET["cat"] == "edit_asisten") {
    include "editasisten.php";
}else if ($_GET["cat"] == "input_profile") {
    include "form_input_profile.php";
}else if ($_GET["cat"] == "tampil_profile") {
    include "tampil_profile_admin.php";
}else if ($_GET["cat"] == "contact") {
    include "form_contact.php";
}else if ($_GET["cat"] == "comment") {
    include "tampil_comment.php";
}


else if($_GET["cat"] == "logout"){
	include "logout.php";
}
?>
    </div>

<?php 
include "rightbox.php";
include "footer_admin.php";
} else {
    echo "<meta http-equiv=refresh content=0;url=index.php>";
}
?>