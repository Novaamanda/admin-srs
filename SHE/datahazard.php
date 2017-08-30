<!-- table -->
 
<?php 
include "scriptjs_table.php";
// Turn off all error reporting
error_reporting(0);
?>

<article class="module width_full">
<h3><?php
			 
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
<div class="module_content">
<?php
if (isset($_POST['delete_hazard'])&&($_POST['names'])){
	$id=$_POST['names'];
	$N = count($id);
	for($i=0; $i < $N; $i++){
	$query = "SELECT * FROM hazard_report WHERE id_hazard='$id[$i]'";
$sql = mysql_query($query);
$tampil = mysql_fetch_array($sql);
$filename_lama = $tampil['foto_video'];
$abspath=$_SERVER['DOCUMENT_ROOT'];
$dir = $abspath.'/administrator/SHE/gambarhazard/';
unlink($dir."".$filename_lama);
		$result = mysql_query("DELETE FROM hazard_report where id_hazard='$id[$i]'");
		$result2 = mysql_query("DELETE FROM tabel_tipehazard where id_hazard='$id[$i]'");
		$result3 = mysql_query("DELETE FROM tabel_penyebabhazard where id_hazard='$id[$i]'");
	}
	echo"<h4 class='alert_success'>Sucsess Delete</h4>";
}
else if (isset($_GET['id'])){
$kode=$_GET['id'];
$query = "SELECT * FROM hazard_report WHERE id_hazard='$kode'";
$sql = mysql_query($query);
$tampil = mysql_fetch_array($sql);
$filename_lama = $tampil['foto_video'];
$abspath=$_SERVER['DOCUMENT_ROOT'];
$dir = $abspath.'/administrator/SHE/gambarhazard/';
unlink($dir."".$filename_lama);
$query = "DELETE FROM hazard_report WHERE id_hazard='$kode'";
$sql = mysql_query($query);
$query2 = "DELETE FROM tabel_tipehazard WHERE id_hazard='$kode'";
$sql2 = mysql_query($query2);
$query3 = "DELETE FROM tabel_penyebabhazard WHERE id_hazard='$kode'";
$sql3 = mysql_query($query3);
	if($sql or $sql2 or $sql3) {
		echo"<h4 class='alert_success'>Sucess Delete</h4>";
	} else{
		echo"<h4 class='alert_success'>Gagal Delete</h4>";
	}
}

else if (isset($_POST['deleteall_hazard'])){
	// Empty table
$query = mysql_query("TRUNCATE TABLE event_report");
$query2 = mysql_query("TRUNCATE TABLE tabel_ygterlibat");
$query3 = mysql_query("TRUNCATE TABLE tabel_kerugian");
echo"<h4 class='alert_success'>Sucsess Delete</h4>";}

?>

<form method="post" action="" name="myform">
<table width="100%" border="0" background="images/table_sorter_header.png">
  <tr>
    <td>
<input type="button" onClick="javascript:setCheckboxes3(1);" value="Check All">
<input type="button" onClick="javascript:setCheckboxes3(0);" value="Uncheck All">
<input name="delete_hazard" type="submit" onClick="return confirm('Apakah Anda Yakin Akan Menghapus Data Terpilih?')" value="Delete Selected">
<!-- <input type="submit" value="Empty Table" name="deleteall_hazard" onClick="return confirm('Apakah Anda Yakin Akan Mengosongkan Data ?')"> -->
</td>
<td>&nbsp;</td>
    <td align="right">
<!-- <input type="button" onClick="window.location.href='?page=<?php echo base64_encode('Tambah Hazard'); ?>'" value="Add Hazard Report"> -->
</td>
  </tr>
</table>
                <table cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse" bordercolor="#EEEEEE" class="display" id="example" width="100%" bgcolor="#FFFFFF">		
                <thead>		
                <tr>
					<th width="2%"> <font color="#333333">No.</font> </th>
					<th width="2%"></th>
                    <th width="39%"> <font color="#333333">HAZARD</font> </th>
					<th width="23%"> <font color="#333333">TIPE HAZARD</font> </th>
					<th width="23%"> <font color="#333333">PENYEBAB HAZARD</font> </th>
					<th width="23%"><font color="#333333">LOKASI</font></th>
					<th width="1%"></th>
					<th width="1%"></th>
					<th width="1%"></th>
					
                </tr>
                </thead>
				
				<tbody>
					<?php 
					$no=1;
						$query=mysql_query("select * from hazard_report,user where hazard_report.id_user = user.id_user AND hazard_report.kode_bandara = '".$_SESSION['kode_bandara']."' ORDER BY date_hazard DESC")or die(mysql_error());
						while($row=mysql_fetch_array($query)){
						$id=$row['id_hazard'];
					?>
					<tr valign="top">
					<td><?php echo $no ?>.</td>
						<td>
							<input name="names[]" type="checkbox" value="<?php echo $id; ?>">
					  </td>
						<td>
						<table width="100%" border="0">
					  <tr valign="top">
						<td width="30%" valign="top">
						<?php
							$data= $row['foto_video'];
							$data1= $row['foto_video1'];
							$namafile= substr($data,-3);
							$namafile1= substr($data1,-3);
							if($data!='')
							{
							if($namafile == 'jpg')
							{
								echo "<a href='SHE/gambarhazard/$data' target='_blank'><img src='SHE/gambarhazard/$data' width='100px' height='100px'></a> <br>";
							}
							elseif($namafile == 'JPG')
							{
								echo "<a href='SHE/gambarhazard/$data' target='_blank'><img src='SHE/gambarhazard/$data' width='100px' height='100px'></a> <br>";
							}
							elseif($namafile == 'JPEG')
							{
								echo "<a href='SHE/gambarhazard/$data' target='_blank'><img src='SHE/gambarhazard/$data' width='100px' height='100px'></a> <br>";
							}
							elseif($namafile == 'jpeg')
							{
								echo "<a href='SHE/gambarhazard/$data' target='_blank'><img src='SHE/gambarhazard/$data' width='100px' height='100px'></a> <br>";
							}
							elseif($namafile == 'png')
							{
								echo "<a href='SHE/gambarhazard/$data' target='_blank'><img src='SHE/gambarhazard/$data' width='100px' height='100px'></a> <br>";
							}
							elseif($namafile == 'gif')
							{
								echo "<a href='SHE/gambarhazard/$data' target='_blank'><img src='SHE/gambarhazard/$data' width='100px' height='100px'></a> <br>";
							}
							elseif($namafile == 'mp4')
							{
							 echo "
							 <video width='240' height='120' controls>
  							<source src='SHE/gambarhazard/$data' type='video/mp4'>
							</video>
							<br>
							";
							}
							elseif($namafile == 'MP4')
							{
							 echo "
							 <video width='240' height='120' controls>
  							<source src='SHE/gambarhazard/$data' type='video/mp4'>
							</video>
							<br>
							";
							}
							}
							else
							{
							echo "<a href='SHE/gambarhazard/noimage.jpg' target='_blank'><img src='SHE/gambarhazard/noimage.jpg' width='100px' height='100px'></a> <br>";
							}
						?>	
						<a href="SHE/gambarhazard/<?php echo $data1 ?>" target='_blank'>Lihat Foto 2</a>
						</td>
						<td width="70%">					  
					  
					  
					  <b>DESKRIPSI</b> : <br>
					  <i><?php echo $row['deskripsi_singkat'] ?></i>
					  <BR>
					  <b>PELAPOR</b> : <br>
					  <?php echo $row['nama'] ?> 
					  <BR>
					  <b>POSTING DATE</b> : <br>
					   <i><?php echo date("d/m/Y H:i:s", strtotime($row['date_hazard'])); ?></i>
						</td>
					  </tr>
					</table>
						</td>
						 <td>
					  <?php
					  $querytipe=mysql_query("select * from tabel_tipehazard,tipe_hazard where tabel_tipehazard.id_hazard = '$id' and tabel_tipehazard.id_tipehazard=tipe_hazard.id_tipehazard")or die(mysql_error());
						while($rowtipe=mysql_fetch_array($querytipe)){
						echo"<li>";
						echo $rowtipe['nama_tipehazard'];
						echo"</li>";
						}
						?>
						<br>
						<a href="?page=<?php echo base64_encode('Edit Tabel Tipe Hazard'); ?><?php echo"&&id=$id";?>"><img src="images/icn_edit.png"></a>
						</td>
					  <td>
					  <?php
					  $querypenyebab=mysql_query("select * from tabel_penyebabhazard,penyebab_hazard where tabel_penyebabhazard.id_hazard = '$id' and tabel_penyebabhazard.id_penyebabhazard=penyebab_hazard.id_penyebabhazard")or die(mysql_error());
						while($rowpenyebab=mysql_fetch_array($querypenyebab)){
						echo"<li>";
						echo $rowpenyebab['nama_penyebabhazard'];
						echo"</li>";
						}
						?>
						<br>
						<a href="?page=<?php echo base64_encode('Edit Tabel Penyebab Hazard'); ?><?php echo"&&id=$id";?>"><img src="images/icn_edit.png"></a>
					  </td>
					  <td>
					  <a href="SHE/map.php?latitude=<?php echo $row['latitude'] ?>&&longitude=<?php echo $row['longitude'] ?>" target="_blank">View Location</a>
					  </td>
					  <td>
						<a href="SHE/report_hazard.php<?php echo"?id=$id";?>" target="_blank">PDF</a>
						</td>
						<td><a href="?page=<?php echo base64_encode('Edit Hazard'); ?><?php echo"&&id=$id";?>"><img src="images/icn_edit.png"></a></td>
						<td><a href="?page=<?php echo base64_encode('Data Hazard'); ?><?php echo"&&id=$id";?>" onClick="return confirm('Apakah Anda Yakin Akan Menghapus Data Terpilih?')"><img src="images/icn_trash.png"></a></td>
						
					</tr>
                    <?php 
					$no++;
					} 
					?>
                </tbody>
				</table>
				
</form>


</div>
</articel>