<article class="module width_full">
<header>
<h3> <?php 
			if (! isset($_GET['page']))
			{
			$page2 = 'Dashboard'; 
			echo"$page2";
			}
			else {
			 $page1 = $_GET['page']; 
             $page2=base64_decode($page1);
			  echo"$page2";
			  } 
			 ?>
</h3>
</header>
<div class="module_content">
<?php
	if (isset($_POST['Simpan'])){
		$query = "INSERT INTO optional_yg_terlibat VALUES ('','".$_POST['id_jenis_ygterlibat']."','".$_POST['optional_jenis_ygterlibat']."')";
		$sql = mysql_query($query);
		
		if($sql) {
			echo"<h4 class='alert_success'>Data Berhasil Di Tambahkan</h4>";
		} else {
			echo"<h4 class='alert_success'><font color='red'>Data Gagal Di Tambahkan</font></h4>";
		}
	}
	
?>
		
		
<body>

	<form action="" method="POST" name="INPUT" enctype="multipart/form-data">
<table width="100%" border="0">
  <tr>
    <td width="49%" valign="top">
	<table width="100%" border="0" align="center">
	<tr valign="top">
    <td width="9%" height="24">optional_jenis_ygterlibat</td>
	<td width="1%">&nbsp;</td>
   <td width="90%"><input type="text" name="optional_jenis_ygterlibat" size="30" value="" required></td>
    </tr>
	<tr valign="top">
    <td width="9%" height="24">id_jenis_ygterlibat</td>
	<td width="1%">&nbsp;</td>
   <td width="90%">
<select name="id_jenis_ygterlibat" required> 
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
    <td width="9%" height="89">&nbsp;</td>
    <td width="1%">&nbsp;</td>
	<td width="90%">
	<input type="submit" name="Simpan" value="Simpan"> 
	<input type="submit" name="Reset" value="Cancel"></td>
  </tr>
	</table>
	</td>
  </tr>
</table>
</form>
</body>
</div>
</article>