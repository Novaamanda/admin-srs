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
$query = "SELECT * FROM jenis_kejadian WHERE id_jeniskejadian='$kode'";
$sql = mysql_query($query);
$tampil = mysql_fetch_array($sql);

	$nama_kejadian = $tampil['nama_kejadian'];
	

if (isset($_POST['Edit'])){
	$nama_kejadian = $_POST['nama_kejadian'];

	
	$query = "UPDATE jenis_kejadian SET nama_kejadian='$nama_kejadian' WHERE id_jeniskejadian='$kode'	";
	
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
    <td width="9%" height="24">Jenis Kejadian</td>
	<td width="1%">&nbsp;</td>
   <td width="90%"><input type="text" name="nama_kejadian" size="30" value="<?php echo $nama_kejadian ?>" required></td>
    </tr>
	
	<tr valign="top">
    <td width="9%" height="89">&nbsp;</td>
    <td width="1%">&nbsp;</td>
	<td width="90%">
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