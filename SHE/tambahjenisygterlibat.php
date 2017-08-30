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
		
		$jenis_terlibat = $_POST['jenis_terlibat'];
		
		$query = "INSERT INTO jenis_yg_terlibat (`jenis_terlibat`) 
		VALUES ('$jenis_terlibat')";
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
    <td width="12%" height="24">JENIS YG TERLIBAT</td>
	<td width="1%">&nbsp;</td>
    <td width="87%"><input type="text" name="jenis_terlibat" size="30" required></td>
    </tr>
	<tr valign="top">
     <td width="12%"></td>
	 <td width="1%">&nbsp;</td>
    <td width="87%" height="24"><input type="submit" name="Simpan" value="Simpan"> <input type="submit" name="Reset" value="Cancel"></td>
  </tr>

</table>

</form>
</body>
</div>
</article>