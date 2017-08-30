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
$query = "SELECT * FROM user WHERE id_user='$kode'";
$sql = mysql_query($query);
$tampil = mysql_fetch_array($sql);

if (isset($_POST['Edit'])){
	$query = "UPDATE user SET nama ='".$_POST['nama']."',email ='".$_POST['email']."' ,no_tlpn ='".$_POST['no_tlpn']."' ,id_optional_yg_terlibat ='".$_POST['id_optional_yg_terlibat']."',username ='".$_POST['username']."',password ='".base64_encode($_POST['password'])."' ,kode_bandara ='".$_POST['kode_bandara']."' ,level ='".$_POST['level']."',status ='".$_POST['status']."' WHERE id_user='$kode'";
	
	$sqk = mysql_query($query);
	
	if($sql){
		echo"<h4 class='alert_success'>Sucsess Edit Data</h4>";
	} else {
		echo"<h4 class='alert_success'>Gagal Edit Data</h4>";
	}
	//echo "<meta http-equiv='refresh' content='0;URL=?page= '";
}
elseif (isset($_POST['Reset'])){
	$res = 'Qwerty321';
	$query = "UPDATE user SET password ='".base64_encode($res)."' WHERE id_user='$kode'";
	
	$sqk = mysql_query($query);
	
	if($sql){
		echo"<h4 class='alert_success'>Sucsess Edit Data</h4>";
	} else {
		echo"<h4 class='alert_success'>Gagal Edit Data</h4>";
	}
}
?>
<form action="" method="POST" name="Edit">
<table width="100%" border="0">
  <tr>
    <td width="49%" valign="top">
	<table width="100%" border="0" align="center">
	
	<tr valign="top">
    <td width="9%" height="24">NAMA</td>
	<td width="1%">&nbsp;</td>
   <td width="90%"><input type="text" name="nama" size="30" value="<?php echo $tampil['nama'] ?>"></td>
    </tr>
	<tr valign="top">
    <td width="9%" height="24">EMAIL</td>
	<td width="1%">&nbsp;</td>
   <td width="90%"><input type="text" name="email" size="30" value="<?php echo $tampil['email'] ?>"></td>
    </tr>
	<tr valign="top">
    <td width="9%" height="24">NO TLPN</td>
	<td width="1%">&nbsp;</td>
   <td width="90%"><input type="text" name="no_tlpn" size="30" value="<?php echo $tampil['no_tlpn'] ?>"></td>
    </tr>
	<tr valign="top">
    <td width="9%" height="24">USERNAME</td>
	<td width="1%">&nbsp;</td>
   <td width="90%"><input type="text" name="username" size="30" value="<?php echo $tampil['username'] ?>"></td>
    </tr>
	<tr valign="top">
    <td width="9%" height="24">PASSWORD</td>
	<td width="1%">&nbsp;</td>
   <td width="90%"><input type="password" name="password" size="30" value="<?php echo base64_decode($tampil['password']) ?>"></td>
    </tr>
	<tr valign="top">
    <td width="9%" height="24">PERUSAHAAN</td>
	<td width="1%">&nbsp;</td>
   <td width="90%">
<select name="id_optional_yg_terlibat"> 
<?php
$hasil_dbwx = mysql_query("SELECT * FROM optional_yg_terlibat where id_optional_yg_terlibat = '".$tampil['id_optional_yg_terlibat']."'");
$datawwx = mysql_fetch_array($hasil_dbwx)
?>
<option value="<?php echo $datawwx['id_optional_yg_terlibat']; ?>">Terpilih - <?php echo $datawwx['optional_jenis_ygterlibat']; ?> [klik to edit]</option>
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
$hasil_dbwx = mysql_query("SELECT * FROM bandara where kode_bandara = '".$tampil['kode_bandara']."'");
$datawwx = mysql_fetch_array($hasil_dbwx)
?>
<option value="<?php echo $datawwx['kode_bandara']; ?>">Terpilih - <?php echo $datawwx['kode_bandara']; ?> <?php echo $datawwx['bandara']; ?> [klik to edit]</option>
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
<?php
if ($tampil['level'] =='1')
{
	$tampilsekarang = 'Pelapor';
}
else
{
	$tampilsekarang = 'Super Admin';
}
?>
<option value="<?php echo $tampil['level']; ?>">Terpilih - <?php echo $tampilsekarang; ?> [klik to edit]</option>
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
<?php
if ($tampil['status'] =='1')
{
	$statussekarang = 'Verified';
}
else
{
	$statussekarang = 'Unverified';
}
?>
<option value="<?php echo $tampil['status']; ?>">Terpilih - <?php echo $statussekarang; ?> [klik to edit]</option>
<option value="1">Verified</option>
<option value="0">Unverified</option>
</select>
   </td>
    </tr>		
	<tr valign="top">
    <td width="9%" height="89">&nbsp;</td>
    <td width="1%">&nbsp;</td>
	<td width="90%">
	<input type="submit" name="Edit" value="Edit"> 
	<input type="submit" name="Reset" value="Cancel">
	 <input type="submit" name="Reset" value="Reset Password"> 
	</td>
  </tr>
 
	</table>
	</td>
  </tr>
</table>
</form>
</div>
</article>