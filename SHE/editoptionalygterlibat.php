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
$query = "SELECT * FROM optional_yg_terlibat WHERE id_optional_yg_terlibat='$kode'";
$sql = mysql_query($query);
$tampil = mysql_fetch_array($sql);

if (isset($_POST['Edit'])){
	$query = "UPDATE optional_yg_terlibat SET id_jenis_ygterlibat ='".$_POST['id_jenis_ygterlibat']."',optional_jenis_ygterlibat ='".$_POST['optional_jenis_ygterlibat']."' WHERE id_optional_yg_terlibat='$kode'";
	
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
    <td width="9%" height="24">id_jenis_ygterlibat</td>
	<td width="1%">&nbsp;</td>
   <td width="90%">
<select name="id_jenis_ygterlibat"> 
<?php
$hasil_dbwx = mysql_query("SELECT * FROM jenis_yg_terlibat where id_jenis_ygterlibat = '".$tampil['id_jenis_ygterlibat']."'");
$datawwx = mysql_fetch_array($hasil_dbwx)
?>
<option value="<?php echo $datawwx['id_jenis_ygterlibat']; ?>">Terpilih - <?php echo $datawwx['jenis_terlibat']; ?> [klik to edit]</option>
<?php
$hasil_dbw = mysql_query("SELECT * FROM jenis_yg_terlibat");
 while ($dataww = mysql_fetch_array($hasil_dbw))
 {
 ?>
 <option value="<?php echo $dataww['id_jenis_ygterlibat']; ?>"><?php echo $dataww['jenis_terlibat']; ?></option>
<?php
}
?>
</select>
   </td>
    </tr>
	<tr valign="top">
    <td width="9%" height="24">optional_jenis_ygterlibat</td>
	<td width="1%">&nbsp;</td>
   <td width="90%"><input type="text" name="optional_jenis_ygterlibat" size="30" value="<?php echo $tampil['optional_jenis_ygterlibat'] ?>"></td>
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