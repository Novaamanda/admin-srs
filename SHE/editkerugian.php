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
$query = "SELECT * FROM kerugian WHERE id_kerugian='$kode'";
$sql = mysql_query($query);
$tampil = mysql_fetch_array($sql);

	$nama_kerugian = $tampil['nama_kerugian'];
	$textfieldbaru = $tampil['textfieldbaru'];
	$typetextfield = $tampil['typetextfield'];
	$keterangan_kerugian = $tampil['keterangan_kerugian'];

if (isset($_POST['Edit'])){
	$query = "UPDATE kerugian SET nama_kerugian='".$_POST['nama_kerugian']."',textfieldbaru='".$_POST['textfieldbaru']."',typetextfield='".$_POST['typetextfield']."',keterangan_kerugian='".$_POST['keterangan_kerugian']."' WHERE id_kerugian='$kode'	";
	
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
    <td width="12%" height="24">Kerugian</td>
	<td width="0%">&nbsp;</td>
   <td width="88%"><input type="text" name="nama_kerugian" size="30" value="<?php echo $nama_kerugian ?>" required></td>
    </tr>
	<tr valign="top">
    <td width="12%" height="24">Textfield Baru</td>
	<td width="0%">&nbsp;</td>
   <td width="88%"><input type="text" name="textfieldbaru" size="5" value="<?php echo $textfieldbaru ?>"> isikan numerik 0 jika ingin mengosongkan. atau isikan numerik 1 untuk membuat textfiel baru</td>
    </tr>
	<tr valign="top">
    <td width="12%" height="24">Type Textfield Baru</td>
	<td width="0%">&nbsp;</td>
   <td width="88%"><input type="text" name="typetextfield" size="5" value="<?php echo $typetextfield ?>"> isikan dengan type telp,text atau kosongkan saja</td>
    </tr>
	<tr valign="top">
    <td width="12%" height="24">Keterangan</td>
	<td width="0%">&nbsp;</td>
   <td width="88%"><input type="text" name="keterangan_kerugian" size="5" value="<?php echo $keterangan_kerugian ?>"> Example : Jiwa,unit,dll</td>
    </tr>
	<tr valign="top">
    <td width="12%" height="89">&nbsp;</td>
    <td width="0%">&nbsp;</td>
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