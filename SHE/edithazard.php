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
<table width="100%" border="0">
  <tr>
    <td width="56%" height="171" valign="top">
	<table width="101%" border="0" align="center">
	<tr valign="top">
    <td width="18%" height="24">Nama Pelapor</td>
	<td width="1%">&nbsp;</td>
	 <td width="81%">
<?php
$hasil_dbwx = mysql_query("SELECT * FROM user where id_user = '".$tampil['id_user']."'");
$datawwx = mysql_fetch_array($hasil_dbwx)
?>
<input type="text" name="id_user" size="30" value="<?php echo $datawwx['nama'] ?>"  disabled/>
</td>
	</tr>
	<tr valign="top">
     <td width="18%" height="37">Deskripsi Singkat</td>
	 <td width="1%">&nbsp;</td>
    <td width="81%"><font>
      <textarea name="deskripsi_singkat" cols="50" rows="5" required><?php echo $tampil['deskripsi_singkat'] ?></textarea>
    </font></td>
	</tr>
	
	<tr valign="top">
    <td width="18%" height="24">Latitude</td>
	<td width="1%">&nbsp;</td>
	 <td width="81%">
<?php
$hasil_dbwx = mysql_query("SELECT * FROM hazard_report where latitude = '".$tampil['latitude']."'");
$datawwx = mysql_fetch_array($hasil_dbwx)
?>
<input type="text" name="latitude" size="30" value="<?php echo $datawwx['latitude'] ?>"  disabled/>
</td>
	</tr>
	
	<tr valign="top">
    <td width="18%" height="24">Longitude</td>
	<td width="1%">&nbsp;</td>
	 <td width="81%">
<?php
$hasil_dbwx = mysql_query("SELECT * FROM hazard_report where longitude = '".$tampil['longitude']."'");
$datawwx = mysql_fetch_array($hasil_dbwx)
?>
<input type="text" name="longitude" size="30" value="<?php echo $datawwx['longitude'] ?>"  disabled/>
</td>
	</tr>
  
  
	<tr valign="top">
    <td width="18%" height="26">&nbsp;</td>
    <td width="1%">&nbsp;</td>
	<td width="81%">
	<input type="submit" name="Edit" value="Edit"> 
	<input type="submit" name="Reset" value="Cancel"></td>
  </tr>
	</table>
	</td>
	<td width="38%" valign="top" bgcolor="#ccc">
	<b>PREVIEW GAMBAR</b>
	<br>
	<img src="SHE/gambarhazard/<?php echo $tampil['foto_video'] ?>" />
	</td>
	
	<tr>
    <td width="6%" valign="top">	</td>
	<td width="38%" valign="top" bgcolor="#ccc">
	<b>PREVIEW GAMBAR</b>
	<br>
	<img src="SHE/gambarhazard/<?php echo $tampil['foto_video1'] ?>" />
	</td>
    </tr>
  </tr>
</table>
</form>
</div>
</article>