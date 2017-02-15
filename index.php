<?php
include "header.php";
?>
</br>
    <div id="col1">
<?php
$search = $_POST['search'];
$page1=$_GET['page1'];
$id = $_GET['lengkap'];
$pagem = $_GET['pagem'];
$prolengkap = $_GET['prolengkap'];
$pagepro = $_GET['pagepro'];
$pagesrc = $_GET['pagesrc'];
$pagecom = $_GET['pagecom'];

include 'koneksi.php';
@session_start();
$username = $_SESSION['username'];
// echo $username;
// echo $search;

if (($_GET["cat"] == "pro_ass") || ($page1 != null)) {
    include "tampil_asisten.php";
}else if ($pagesrc != null || $search != null) {
    include "search.php";
}else if (($_GET["cat"] == "prak_mat") || ($pagem != null)) {
    include "tampil_materi_nonadmin.php";
}else if (($_GET["cat"] == "pro_lab")|| ($pagepro != null)) {
    include "lab_profile.php";
}else if ($id != null) {
    include "beritaselengkapnya.php";
}else if ($prolengkap != null) {
    include "profile_lengkap.php";
}else if (($_GET["cat"] == "contact")||($pagecom != null)) {
    include "tampil_contact.php";
}else if (($_GET["cat"] == "home") or (!isset($_GET["cat"]))) {
    include "tampilberita.php";
}  
?>
    </div>

    <?php
include "rightbox.php";
include "footer.php";    
?>