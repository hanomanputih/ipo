<?php 
include "koneksi.php";
@session_start();
$username = $_SESSION['username'];
// echo $username;
// echo "</br>";
$query = "select * from berita order by id_berita desc";
$result = mysql_query($query);

       ?>
<div id="col2">
  <div id="logo"><center><img src="images/logo1.png" alt="IPO Laboratory"/></br></br>
<?php 
if ($username=="ipo"){
  ?>
<form method="POST" action="admin.php">
  <?php
}else{
 ?>
<form method="POST" action="index.php">
  <?php } ?>

<input type="text" name="search" id="search" placeholder="Search"><input type="submit" name="submit" value="Search" />
</form>
    </center></div>
   <div class="box2">
    <div id="cssmenu">
        <h2>News Update</h2>
    <ul>
        <?php 
        // echo $username;
$index = 1;
while (($data = mysql_fetch_array($result))&&($index<6)) {
  # code...
if($username == 'ipo'){
?>

<li><a href="admin.php?lengkap=<?php echo $data['id_berita']?>"><?php echo $data['judul']?></a></li>
  <?php
}else{
  ?>
<li><a href="index.php?lengkap=<?php echo $data['id_berita']?>"><?php echo $data['judul']?></a></li>
  <?php
}
  $index = $index+1;
}

         ?>
        </div>
        <hr>
        <hr>
    </ul>

        <h2>Site Link</h2>
        <center>
        <div id='cssmenu'>
    <ul>
        <li><a href='http://industrial.uii.ac.id/en/'><span>Industrial Engineering</span></a></li>
        <li><a href="http://fit.uii.ac.id"><span>Faculty Industrial Technology</span></a></li>
        <li><a href='http://uii.ac.id'><span>Islamic University of Indonesia</span></a></li>
    </ul>
    </div>
         
      </div>
      <div class="box1">
        <h2>Twitter</h2>
      <a class="twitter-timeline" href="https://twitter.com/Lab_IPO" data-widget-id="309934439482408960">Tweets by @Lab_IPO</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

      </div>
    </br>
      <div>
<iframe src="https://docs.google.com/forms/d/1voHqhEEu_oLs62rPU4mpTBx-QrPC2fzW75jRcO0M6vs/viewform?embedded=true" width="300" height="500" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
      </div>
     
    </div>
  </div>
</div>
