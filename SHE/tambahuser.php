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
		$query = "INSERT INTO user VALUES ('','".$_POST['nama']."','".$_POST['email']."','".$_POST['no_tlpn']."','".$_POST['id_optional_yg_terlibat']."','".$_POST['username']."','".base64_encode($_POST['password'])."','".$_POST['kode_bandara']."','".$_POST['level']."','".$_POST['status']."',now())";
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
    <td width="9%" height="24">NAMA</td>
	<td width="1%">&nbsp;</td>
   <td width="90%"><input type="text" name="nama" size="30" value=""></td>
    </tr>
	<tr valign="top">
    <td width="9%" height="24">EMAIL</td>
	<td width="1%">&nbsp;</td>
   <td width="90%"><input type="text" name="email" size="30" value=""></td>
    </tr>
	<tr valign="top">
    <td width="9%" height="24">NO TLPN</td>
	<td width="1%">&nbsp;</td>
   <td width="90%"><input type="text" name="no_tlpn" size="30" value=""></td>
    </tr>
	<tr valign="top">
    <td width="9%" height="24">USERNAME</td>
	<td width="1%">&nbsp;</td>
   <td width="90%"><input type="text" name="username" size="30" value=""></td>
    </tr>
	<tr valign="top">
    <td width="9%" height="24">PASSWORD</td>
	<td width="1%">&nbsp;</td>
   <td width="90%"><input type="text" name="password" size="30" value=""></td>
    </tr>
	<tr valign="top">
    <td width="9%" height="24">PERUSAHAAN</td>
	<td width="1%">&nbsp;</td>
   <td width="90%">
<select name="id_optional_yg_terlibat"> 
<?php
$hasil_dbw = mysql_query("SELECT * FROM optional_yg_terlibat where id_jenis_ygterlibat = '3'");
 while ($dataww = mysql_fetch_array($hasil_dbw))
 {
 ?>
 <option value="<?php echo $dataww['id_optional_yg_terlibat']; ?>"><?php echo $dataww['optional_jenis_ygterlibat']; ?></option>
<?php
}
?>
</select>
   </td>
    </tr>
<tr valign="top">
    <td width="9%" height="24">BANDARA</td>
	<td width="1%">&nbsp;</td>
   <td width="90%">
<select name="kode_bandara"> 
<?php
$hasil_dbw = mysql_query("SELECT * FROM bandara");
 while ($dataww = mysql_fetch_array($hasil_dbw))
 {
 ?>
 <option value="<?php echo $dataww['kode_bandara']; ?>">(<?php echo $dataww['kode_bandara']; ?>) <?php echo $dataww['bandara']; ?></option>
<?php
}
?>
</select>
   </td>
    </tr>	
<tr valign="top">
    <td width="9%" height="24">LEVEL USER</td>
	<td width="1%">&nbsp;</td>
   <td width="90%">
<select name="level"> 
<option value="1">Pelapor</option>
<option value="0">Super Admin</option>
</select>
   </td>
    </tr>	
<tr valign="top">
    <td width="9%" height="24">STATUS USER</td>
	<td width="1%">&nbsp;</td>
   <td width="90%">
<select name="status"> 
<option value="1">Verified</option>
<option value="0">Unverified</option>
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