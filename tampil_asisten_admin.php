<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSS Pagination Style Template</title>
<style type="text/css">
<!--

#tnt_pagination {
	display:block;
	text-align:center;
	height:22px;
	line-height:21px;
	clear:both;
	padding-top:3px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	font-weight:normal;
	margin-bottom: 10px;
}

#tnt_pagination span{
	padding:7px;
	padding-top:2px;
	padding-bottom:2px;
	border:1px solid #BBDDFF;
	margin-left:10px;
	text-decoration:none;
	background-color:#DDEEFF;
	color:#0072BC;
	cursor:default;
}
#tnt_pagination a:link, #tnt_pagination a:visited{
	padding:7px;
	padding-top:2px;
	padding-bottom:2px;
	border:1px solid #EBEBEB;
	margin-left:10px;
	text-decoration:none;
	background-color:#F5F5F5;
	color:#0072bc;
	width:22px;
	font-weight:normal;
}

#tnt_pagination a:hover {
	background-color:#DDEEFF;
	border:1px solid #BBDDFF;
	color:#0072BC;	
}

#tnt_pagination .active_tnt_link {
	padding:7px;
	padding-top:2px;
	padding-bottom:2px;
	border:1px solid #BBDDFF;
	margin-left:10px;
	text-decoration:none;
	background-color:#DDEEFF;
	color:#0072BC;
	cursor:default;
}

#tnt_pagination .disabled_tnt_pagination {
	padding:7px;
	padding-top:2px;
	padding-bottom:2px;
	border:1px solid #EBEBEB;
	margin-left:10px;
	text-decoration:none;
	background-color:#F5F5F5;
	color:#D7D7D7;
	cursor:default;
}
-->
</style>

</head>

<body>

<?php
	/*
		Place code to connect to your DB here.
	*/
	include('koneksi.php');	// include your code to connect to DB.

	$tbl_name="asisten";		//your table name #######EDIT#######
	// How many adjacent pages should be shown on each side?
	$adjacents = 8;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "admin.php"; 	//your file name  (the name of this file)
	$limit = 5; 								//how many items to show per page
	$page = $_GET['page1'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name order by angkatan LIMIT $start, $limit"; //######EDIT######
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div>";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page1=$prev\">previous</a>";
		else
			$pagination.= "<span>previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span>$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page1=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span>$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page1=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page1=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page1=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page1=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page1=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span>$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page1=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page1=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page1=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page1=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page1=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span>$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page1=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page1=$next\">next</a>";
		else
			$pagination.= "<span>next</span>";
		$pagination.= "</div>\n";		
	}
?>
<center>
<div id="judul_menu">ASISTEN</div>
</center>
	<?php
		while($row = mysql_fetch_array($result))
		{ $tahun = $row['tahun']+2000;
	?>
<center>
<img src="images/fotoasisten/<?php echo $row['foto']?>" id="fotoasisten">
<table id="profile">
	<tr>
		<td>Nama </td>
		<td>:</td>
		<td><?php echo $row['nama']?></td>
	</tr>
	<tr>
		<td>Angkatan</td>
		<td>:</td>
		<td><?php echo $row['angkatan']?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo $row['email']?></td>
	</tr>
	<tr>
		<td>CP</td>
		<td>:</td>
		<td><?php echo $row['telepon']?></td>
	</tr>
</table>
		<?php echo "<a href=delete_asisten.php?cat=$row[id_asisten]>Delete</a> || <a href=admin.php?cut=$row[id_asisten]>Edit</a>";

			?>
				
			<hr>
		</center>
	<?php
		}
	?>
</br>
	<div id="tnt_pagination">
<?=$pagination?>


</div>	

</body>
</html>
