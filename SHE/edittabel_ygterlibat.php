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
$jumMhs = $_POST['n'];	
if (isset($_POST['Edit']) and $jumMhs !='')
{
	$query = "DELETE FROM tabel_ygterlibat WHERE id_event='$kode'";
	$sql = mysql_query($query);
	
	for($i=1; $i<=$jumMhs; $i++)
	{
		 $ygterlibat = $_POST['ygterlibat'.$i];
		 $id_optional_yg_terlibatkan = $_POST['id_optional_yg_terlibatkan'.$i];
			if($ygterlibat != '' and $id_optional_yg_terlibatkan != 0)
				{
				 mysql_query("insert into tabel_ygterlibat values('$kode','$ygterlibat','$id_optional_yg_terlibatkan')");
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
					  $querytipe=mysql_query("select * from tabel_ygterlibat,yg_terlibat,jenis_yg_terlibat,optional_yg_terlibat where tabel_ygterlibat.id_event = '$kode' and tabel_ygterlibat.id_ygterlibat=yg_terlibat.id_ygterlibat and tabel_ygterlibat.id_optional_yg_terlibat=optional_yg_terlibat.id_optional_yg_terlibat and yg_terlibat.id_jenis_ygterlibat=jenis_yg_terlibat.id_jenis_ygterlibat and jenis_yg_terlibat.id_jenis_ygterlibat=optional_yg_terlibat.id_jenis_ygterlibat")or die(mysql_error());
						while($rowtipe=mysql_fetch_array($querytipe)){
						echo"<li>";
						echo "<b>" . $rowtipe['nama_ygterlibat'] ."</b>";
						echo "<font color=green>(";
						echo $rowtipe['optional_jenis_ygterlibat'];
						echo ")</font>";
						echo"</li>";
						}
						?>
	</td>
  </tr>
</table>
<br>
Pilih Untuk Update Data
<?php
 $hasil_db = mysql_query("SELECT * FROM yg_terlibat");
$i = 1;
 while ($data = mysql_fetch_array($hasil_db))
 {
 ?> 
<div class="separator-fields"></div>
<div class="select-wrapper">
<input type="checkbox" name="ygterlibat<?php echo"$i"; ?>" id="<?php echo $data['nama_ygterlibat']; ?>" value="<?php echo $data['id_ygterlibat']; ?>"> <?php echo $data['nama_ygterlibat']; ?>
<?php
$ido = $data['id_jenis_ygterlibat'];
?>
<select name="id_optional_yg_terlibatkan<?php echo"$i"; ?>" class="select"> 
<option value="">Pilih <?php echo $data['nama_ygterlibat']; ?></option>
<?php
$hasil_dbw = mysql_query("SELECT * FROM optional_yg_terlibat where id_jenis_ygterlibat = '$ido'");
 while ($dataww = mysql_fetch_array($hasil_dbw))
 {
 ?>
 <option value="<?php echo $dataww['id_optional_yg_terlibat']; ?>"><?php echo $dataww['optional_jenis_ygterlibat']; ?></option>
<?php
}
?>
</select>

<span class="select-icon entypo-arrow-combo"></span></div>
<script>
$('[type="checkbox"][name^="ygterlibat"]').change(function(){
  $(this).nextAll('select').first().toggle(this.checked);
});
</script>	
<?php
$i++;
}
$jumMhs = $i-1;
?>
<input type="hidden" name="n" value="<?php echo $jumMhs ?>" />
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