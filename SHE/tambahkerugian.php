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
		$query = "INSERT INTO kerugian VALUES ('','".$_POST['nama_kerugian']."','".$_POST['textfieldbaru']."','".$_POST['typetextfield']."','".$_POST['keterangan_kerugian']."')";
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
    <td width="6%" height="24">Kerugian</td>
	<td width="1%">&nbsp;</td>
    <td width="93%"><input type="text" name="nama_kerugian" size="30" required></td>
    </tr>
	<tr valign="top">
    <td width="12%" height="24">Textfield Baru</td>
	<td width="0%">&nbsp;</td>
   <td width="88%"><input type="text" name="textfieldbaru" size="5" value=""> isikan numerik 0 jika ingin mengosongkan. atau isikan numerik 1 untuk membuat textfiel baru</td>
    </tr>
	<tr valign="top">
    <td width="12%" height="24">Type Textfield Baru</td>
	<td width="0%">&nbsp;</td>
   <td width="88%"><input type="text" name="typetextfield" size="5" value=""> isikan dengan type telp,text atau kosongkan saja</td>
    </tr>
	<tr valign="top">
    <td width="12%" height="24">Keterangan</td>
	<td width="0%">&nbsp;</td>
   <td width="88%"><input type="text" name="keterangan_kerugian" size="5" value=""> Example : Jiwa,unit,dll</td>
    </tr>
	<tr valign="top">
     <td width="6%"></td>
	 <td width="1%">&nbsp;</td>
    <td width="93%" height="24"><input type="submit" name="Simpan" value="Simpan"> <input type="submit" name="Reset" value="Cancel"></td>
  </tr>

</table>

</form>
</body>
</div>
</article>