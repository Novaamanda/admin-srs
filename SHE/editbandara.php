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
$query = "SELECT * FROM bandara WHERE kode_bandara='$kode'";
$sql = mysql_query($query);
$tampil = mysql_fetch_array($sql);

	$kode_bandara = $tampil['kode_bandara'];
	$nama_bandara = $tampil['bandara'];
	$titik_point = $tampil['lokasi_point'];
	

if (isset($_POST['Edit'])){
	$kode_bandara = $_POST['kode_bandara'];
	$nama_bandara = $_POST['nama_bandara'];
	$titik_point = $_POST['titik_point'];

	
	$query = "UPDATE bandara SET kode_bandara='$kode_bandara',bandara='$nama_bandara',lokasi_point='$titik_point' WHERE kode_bandara='$kode'	";
	
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
    <td width="10%" height="24">Kode Bandara</td>
	<td width="2%">&nbsp;</td>
   <td width="88%"><input type="text" name="kode_bandara" size="30" value="<?php echo $kode_bandara ?>" required></td>
    </tr>
	
	<tr valign="top">
    <td width="10%" height="24">Nama Bandara</td>
	<td width="2%">&nbsp;</td>
   <td width="88%"><input type="text" name="nama_bandara" size="30" value="<?php echo $nama_bandara ?>" required></td>
    </tr>
	
	<tr valign="top">
    <td width="10%" height="24">Titik Point</td>
	<td width="2%">&nbsp;</td>
   <td width="88%"><input type="text" name="titik_point" size="30" value="<?php echo $titik_point ?>" placeholder="Harap Diisi"required></td>
    </tr>
	
	<tr valign="top">
    <td width="10%" height="89">&nbsp;</td>
    <td width="2%">&nbsp;</td>
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