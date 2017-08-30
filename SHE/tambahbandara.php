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
		$kode_bandara = $_POST['kode_bandara'];
		$nama_bandara = $_POST['nama_bandara'];
		$titik_point = $_POST['titik_point'];
		
		$query = "INSERT INTO bandara (`kode_bandara`,`bandara`,`lokasi_point`) 
		VALUES ('$kode_bandara','$nama_bandara','titik_point')";
		$sql = mysql_query($query);
		
		if($sql) {
			echo"<h4 class='alert_success'>Data Berhasil Di Tambahkan</h4>";
		} else {
			echo"<h4 class='alert_success'><font color='red'>Data Gagal Di Tambahkan</font></h4>";
		}
	}
	
?>

<?php
//ambil nilai variabel error
if (isset($_GET['des']))
{
   $error=$_GET['des'];
}
else
{
   $error="";
}

?>
		
		
<body>

	<form action="" method="POST" name="INPUT" enctype="multipart/form-data">
	
	<table width="100%" border="0">
  <tr>
    <td width="49%" valign="top">
	<table width="100%" border="0" align="center">
	
	
   <tr valign="top">
    <td width="12%" height="24">Kode Bandara</td>
	<td width="2%">&nbsp;</td>
    <td width="86%"><input type="text" name="kode_bandara" size="30" required></td>
    </tr>
	<tr valign="top">
    <td width="12%" height="24">Nama Bandara</td>
	<td width="2%">&nbsp;</td>
    <td width="86%"><input type="text" name="nama_bandara" size="30" required></td>
    </tr>
	<tr valign="top">
    <td width="12%" height="24">Titik Point</td>
	<td width="2%">&nbsp;</td>
    <td width="86%"><input type="text" name="titik_point" size="30" placeholder="Harap Diisi" required><?php echo "$error"; ?></td>
    </tr>
	<tr valign="top">
     <td width="12%"></td>
	 <td width="2%">&nbsp;</td>
    <td width="86%" height="24"><input type="submit" name="Simpan" value="Simpan"> <input type="submit" name="Reset" value="Cancel"></td>
  </tr>

</table>

</form>
</body>
</div>
</article>