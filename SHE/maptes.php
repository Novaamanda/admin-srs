<article class="module width_full">
<header>
<h3> <?php
			 
			if (! isset($_GET['page']))
			{
			$page2 = 'Dashboard'; 
			echo"$page2";
			}
			else
			 $page1 = $_GET['page']; 
             $page2=base64_decode($page1);
			  echo"$page2"; 
			 ?>
</h3>
</header>
<div class="module_content">
<?php
if (isset($_GET['id'])) {
	$kode = $_GET['id'];
} else {
	die ("Error! Tidak ada ID yang dipilih.");
}
$query = "SELECT * FROM hazard_report where id_hazard='$kode'";
$sql = mysql_query($query);
$tampil = mysql_fetch_array($sql);
//id_event 	id_user 	id_jeniskejadian 	deskripsi_singkat 	foto_video 	date_event 

if (isset($_POST['Edit'])){
	$deskripsi_singkat = $_POST['deskripsi_singkat'];
	
	$query = "UPDATE hazard_report SET deskripsi_singkat='$deskripsi_singkat' WHERE id_hazard='$kode'";
	
	$sqk = mysql_query($query);
	
	if($sql){
		echo"<h4 class='alert_success'>Sucsess Edit Data</h4>";
	} else {
		echo"<h4 class='alert_success'>Gagal Edit Data</h4>";
	}
	//echo "<meta http-equiv='refresh' content='0;URL=?page= '";
}
?>
<form action="" method="POST" name="Edit">
</form>
</div>
</article>