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
$query = "SELECT * FROM jenis_yg_terlibat WHERE id_jenis_ygterlibat='$kode'";
$sql = mysql_query($query);
$tampil = mysql_fetch_array($sql);

	$jenis_terlibat = $tampil['jenis_terlibat'];
	

if (isset($_POST['Edit'])){

	$jenis_terlibat = $_POST['jenis_terlibat'];

	
	$query = "UPDATE jenis_yg_terlibat SET jenis_terlibat='$jenis_terlibat' WHERE id_jenis_ygterlibat='$kode'	";
	
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

<table width="100%" border="0">
  <tr>
    <td width="49%" valign="top">
	<table width="100%" border="0" align="center">
	
	<tr valign="top">
    <td width="13%" height="24">JENIS YG TERLIBAT</td>
	<td width="1%">&nbsp;</td>
    <td width="86%"><input type="text" name="jenis_terlibat" size="30" value="<?php echo $jenis_terlibat ?>" required></td>
    </tr>
	
	<tr valign="top">
    <td width="13%" height="89">&nbsp;</td>
    <td width="1%">&nbsp;</td>
	<td width="86%">
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