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
$query = "SELECT * FROM penyebab_hazard WHERE id_penyebabhazard='$kode'";
$sql = mysql_query($query);
$tampil = mysql_fetch_array($sql);

	$nama_penyebabhazard = $tampil['nama_penyebabhazard'];
	

if (isset($_POST['Edit'])){
	$nama_penyebabhazard = $_POST['nama_penyebabhazard'];

	
	$query = "UPDATE penyebab_hazard SET nama_penyebabhazard='$nama_penyebabhazard' WHERE id_penyebabhazard='$kode'	";
	
	$sqk = mysql_query($query);
	
	if($sql){
		echo"<h4 class='alert_success'>Success Edit Data</h4>";
	} else {
		echo"<h4 class='alert_success'>Gagal Edit Data</h4>";
	}
	//echo "<meta http-equiv='refresh' content='0;URL=?page= '";
}
?>
<form action="" method="POST" name="Edit">

<table width="100%" border="0">
  <tr>
    <td width="49%" valign="top">
	<table width="100%" border="0" align="center">
	
	<tr valign="top">
    <td width="11%" height="24">Nama Penyebab</td>
	<td width="1%">&nbsp;</td>
   <td width="88%"><input type="text" name="nama_penyebabhazard" size="30" value="<?php echo $nama_penyebabhazard ?>" required></td>
    </tr>
	
	<tr valign="top">
    <td width="11%" height="89">&nbsp;</td>
    <td width="1%">&nbsp;</td>
	<td width="88%">
	<input type="submit" name="Edit" value="Edit"> 
	<input type="submit" name="Reset" value="Cancel"></td>
  </tr>
	</table>
	</td>
  </tr>
</table>
</form>
</div>
</article>