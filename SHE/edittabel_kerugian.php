<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<style type="text/css">
.select-wrapper {
    background-color: #fff;
    border-bottom: 1px solid #e6e6e6;
    color: #666;
    cursor: pointer;
    float: left;
    overflow: hidden;
    position: relative;
    width: 100%;
	margin-bottom:20px;
	
}

.select {
display:none;
    -webkit-appearance: none;
    background-color: #fff;
    border-width: 0;
    box-sizing: border-box;
    cursor: pointer;
    float: left;
    font-size: 1em;
    line-height: 2em;
    padding: 0.1em 0.1em;
    width: 100%;
}

.select-icon {
    position: absolute;
    top: .8em;
    right: 1em;
}


#selectx {
display:none;
}

.select-wrapper2 {
    background-color: #fff;
    border-bottom: 1px solid #e6e6e6;
    color: #666;
    cursor: pointer;
    float: left;
    overflow: hidden;
    position: relative;
    width: 100%;
	margin-bottom:20px;
	
}

.select2 {
    -webkit-appearance: none;
    background-color: #fff;
    border-width: 0;
    box-sizing: border-box;
    cursor: pointer;
    float: left;
    font-size: 0.8em;
    line-height: 2em;
    padding: 0.1em 0.1em;
    width: 100%;
}

.select2-icon {
    position: absolute;
    top: .8em;
    right: 1em;
}
</style>
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
$jumMhs2 = $_POST['n2'];
if (isset($_POST['Edit']) and $jumMhs2 !='')
{
	$query = "DELETE FROM tabel_kerugian WHERE id_event='$kode'";
	$sql = mysql_query($query);
	
	for($k=1; $k<=$jumMhs2; $k++) // perulangan untuk array kerugian dan dropdown keterangan kerugian
		{
			$kerugian = $_POST['kerugian'.$k];
			$keterangan_kerugian = $_POST['keterangan_kerugian'.$k];
			if($kerugian != '')
			 {
				mysql_query("insert into tabel_kerugian values('$kode','$kerugian','$keterangan_kerugian')");
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
    <td><font color="#003366">YANG TERLIBAT</font></td>
  </tr>
</table>
<div class="separator-fields"></div>
<table width="100%" border="0" bgcolor="#FFCC99">
  <tr>
    <td>
	Last Yang Terlibat
<?php
					  $querypenyebab=mysql_query("select * from tabel_kerugian,kerugian where tabel_kerugian.id_event = '$kode' and tabel_kerugian.id_kerugian=kerugian.id_kerugian")or die(mysql_error());
						while($rowpenyebab=mysql_fetch_array($querypenyebab)){
						echo"<li>";
						echo "<b>".$rowpenyebab['nama_kerugian']."</b>";
						$isian = $rowpenyebab['keterangan'];
						$keterangan_kerugian = $rowpenyebab['keterangan_kerugian'];
						if($isian)
						{
							$isian_baru = " :<font color=red>" . $rowpenyebab['keterangan'] . " ". $keterangan_kerugian."</font>";
						}
						else
						{
							$isian_baru = "";
						}
						echo $isian_baru;
						echo"</li>";
						}
						?>
	</td>
  </tr>
</table>
<br>
Pilih Untuk Update Data
<?php
 $hasil_dbu = mysql_query("SELECT * FROM kerugian");
$k = 1;
 while ($datau = mysql_fetch_array($hasil_dbu))
 {
		 if ($datau['textfieldbaru'] == '1')
		 {
		 $adanihr = $datau['typetextfield'];
		 }
		 else
		 {
		 $adanihr = 'hidden';
		 }
 ?>
<br>
        <input type="checkbox" name="kerugian<?php echo"$k"; ?>" id="<?php echo $datau['nama_kerugian']; ?>" value="<?php echo $datau['id_kerugian']; ?>"> <?php echo $datau['nama_kerugian']; ?>
		<input name="keterangan_kerugian<?php echo"$k"; ?>" value="" type="<?php echo "$adanihr"; ?>" placeholder="Jumlah <?php echo $datau['nama_kerugian']; ?>" class="w-input input-form" id="selectx">
		<br>
<script>
$('[type="checkbox"][name^="kerugian"]').change(function(){
  $(this).nextAll('#selectx').first().toggle(this.checked);
});
</script>
<?php
$k++;
}
$jumMhs2 = $k-1;
?>
<input type="hidden" name="n2" value="<?php echo $jumMhs2 ?>" />
</div></td>
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