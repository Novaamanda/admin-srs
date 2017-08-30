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
$query = "SELECT * FROM yg_terlibat WHERE id_ygterlibat='$kode'";
$sql = mysql_query($query);
$tampil = mysql_fetch_array($sql);
if (isset($_POST['Edit'])){
	$nama_ygterlibat = $_POST['nama_ygterlibat'];
		$id_jenis_ygterlibat = $_POST['id_jenis_ygterlibat'];
	$query = "UPDATE yg_terlibat SET nama_ygterlibat='$nama_ygterlibat',id_jenis_ygterlibat='$id_jenis_ygterlibat' WHERE id_ygterlibat='$kode'";
	
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
    <td width="13%" height="24">Yang Terlibat</td>
	<td width="0%">&nbsp;</td>
   <td width="87%"><input type="text" name="nama_ygterlibat" size="30" value="<?php echo $tampil['nama_ygterlibat']; ?>" required></td>
    </tr>
	<tr valign="top">
    <td width="13%" height="24">Jenis Yang Terlibat</td>
	<td width="0%">&nbsp;</td>
   <td width="87%">
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
    <td width="13%" height="89">&nbsp;</td>
    <td width="0%">&nbsp;</td>
	<td width="87%">
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