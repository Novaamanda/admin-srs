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
$jumMhs = $_POST['n'];	
if (isset($_POST['Edit']) and $jumMhs !='')
{
	$query = "DELETE FROM tabel_penyebabhazard WHERE id_hazard='$kode'";
	$sql = mysql_query($query);
	
	for($i=1; $i<=$jumMhs; $i++)
	{
		 $id_penyebabhazard = $_POST['id_penyebabhazard'.$i];
			if($id_penyebabhazard != '')
				{
				 mysql_query("insert into tabel_penyebabhazard values('$kode','$id_penyebabhazard')");
				 }
			else {}
	}
echo"<h4 class='alert_success'>Sucsess Edit Data</h4>";			
}
else {}
?>
<form action="" method="POST" name="Edit">
<table width="100%" border="0">
  <tr>
    <td width="56%" height="171" valign="top">
	<table width="101%" border="0" align="center">
	<tr valign="top">
    <td width="81%" height="24">
<div> 
<table width="100%" border="0" bgcolor="#F6F6F6">
  <tr>
    <td><font color="#003366">TIPE HAZARD</font></td>
  </tr>
</table>
<div class="separator-fields"></div>
<table width="100%" border="0" bgcolor="#FFCC99">
  <tr>
    <td>
	Last Tipe Hazard
<?php
					  $querytipe=mysql_query("select * from tabel_penyebabhazard,penyebab_hazard where tabel_penyebabhazard.id_hazard = '$kode' and tabel_penyebabhazard.id_penyebabhazard=penyebab_hazard.id_penyebabhazard")or die(mysql_error());
						while($rowtipe=mysql_fetch_array($querytipe)){
						echo"<li>";
						echo "<b>" . $rowtipe['nama_penyebabhazard'] ."</b>";
						echo"</li>";
						}
						?>
	</td>
  </tr>
</table>
<br>
Pilih Untuk Update Data
<?php
 $hasil_db = mysql_query("SELECT * FROM penyebab_hazard");
$i = 1;
 while ($data = mysql_fetch_array($hasil_db))
 {
 ?> 
<div class="separator-fields"></div>
<input type="checkbox" name="id_penyebabhazard<?php echo"$i"; ?>" id="<?php echo $data['nama_penyebabhazard']; ?>" value="<?php echo $data['id_penyebabhazard']; ?>"> <?php echo $data['nama_penyebabhazard']; ?>
<?php
$ido = $data['id_penyebabhazard'];
?>
<?php
$i++;
}
$jumMhs = $i-1;
?>
<input type="hidden" name="n" value="<?php echo $jumMhs ?>" />
</td>
	</tr>
	<tr valign="top">
    <td width="81%" height="26">
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