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
		$nama_tipehazard = $_POST['nama_tipehazard'];
		
		$query = "INSERT INTO tipe_hazard (`id_tipehazard`,`nama_tipehazard`) 
		VALUES ('','$nama_tipehazard')";
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
    <td width="9%" height="24">Tipe Hazard</td>
	<td width="1%">&nbsp;</td>
    <td width="90%"><input type="text" name="nama_tipehazard" size="30" required></td>
    </tr>
	<tr valign="top">
     <td width="9%"></td>
	 <td width="1%">&nbsp;</td>
    <td width="90%" height="24"><input type="submit" name="Simpan" value="Simpan"> <input type="submit" name="Reset" value="Cancel"></td>
  </tr>

</table>

</form>
</body>
</div>
</article>