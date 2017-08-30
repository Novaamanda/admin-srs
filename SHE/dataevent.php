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
if (isset($_POST['delete_event'])&&($_POST['names'])){
	$id=$_POST['names'];
	$N = count($id);
	for($i=0; $i < $N; $i++){
	$query = "SELECT * FROM event_report WHERE id_event='$id[$i]'";
$sql = mysql_query($query);
$tampil = mysql_fetch_array($sql);
$filename_lama = $tampil['foto_video'];
$abspath=$_SERVER['DOCUMENT_ROOT'];
$dir = $abspath.'/administrator/SHE/gambarevent/';
unlink($dir."".$filename_lama);
		$result = mysql_query("DELETE FROM event_report where id_event='$id[$i]'");
		$result2 = mysql_query("DELETE FROM tabel_ygterlibat where id_event='$id[$i]'");
		$result3 = mysql_query("DELETE FROM tabel_kerugian where id_event='$id[$i]'");
	}
	echo"<h4 class='alert_success'>Sucsess Delete</h4>";
}
else if (isset($_GET['id'])){
$kode=$_GET['id'];
$query = "SELECT * FROM event_report WHERE id_event='$kode'";
$sql = mysql_query($query);
$tampil = mysql_fetch_array($sql);
$filename_lama = $tampil['foto_video'];
$abspath=$_SERVER['DOCUMENT_ROOT'];
$dir = $abspath.'/administrator/SHE/gambarevent/';
unlink($dir."".$filename_lama);
$query = "DELETE FROM event_report WHERE id_event='$kode'";
$sql = mysql_query($query);
$query2 = "DELETE FROM tabel_ygterlibat WHERE id_event='$kode'";
$sql2 = mysql_query($query2);
$query3 = "DELETE FROM tabel_kerugian WHERE id_event='$kode'";
$sql3 = mysql_query($query3);
	if($sql or $sql2 or $sql3) {
		echo"<h4 class='alert_success'>Sucess Delete</h4>";
	} else{
		echo"<h4 class='alert_success'>Gagal Delete</h4>";
	}
}
else if (isset($_POST['deleteall_event'])){
	// Empty table
$query = mysql_query("TRUNCATE TABLE event_report");
$query2 = mysql_query("TRUNCATE TABLE tabel_ygterlibat");
$query3 = mysql_query("TRUNCATE TABLE tabel_kerugian");
echo"<h4 class='alert_success'>Sucsess Delete</h4>";
}

?>

<form method="post" action="" name="myform">
<table width="100%" border="0" background="images/table_sorter_header.png">
  <tr>
    <td>
<input type="button" onClick="javascript:setCheckboxes3(1);" value="Check All">
<input type="button" onClick="javascript:setCheckboxes3(0);" value="Uncheck All">
<input name="delete_event" type="submit" onClick="return confirm('Apakah Anda Yakin Akan Menghapus Data Terpilih?')" value="Delete Selected">
<!-- <input type="submit" value="Empty Table" name="deleteall_event" onClick="return confirm('Apakah Anda Yakin Akan Mengosongkan Data ?')"> -->
</td>
<td>&nbsp;</td>
    <td align="right">
<!-- <input type="button" onClick="window.location.href='#'" value="Add Event Report"> -->
</td>
  </tr>
</table>
               <table cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse" bordercolor="#EEEEEE" class="display" id="example" width="100%" bgcolor="#FFFFFF">		
                <thead>		
                <tr>
				<th width="2%"> <font color="#333333">No.</font> </th>
					<th width="2%"></th>
                    <th width="39%"> <font color="#333333">KEJADIAN</font> </th>
					<th width="23%"> <font color="#333333">YANG TERLIBAT</font> </th>
					<th width="23%"> <font color="#333333">KERUGIAN</font> </th>
					<th width="23%"> <font color="#333333">LOKASI</font> </th>
					<th width="1%"></th>
					<th width="1%"></th>
					<th width="1%"></th>
                </tr>
                </thead>
				
				<tbody >
					<?php 
					$no=1;
						$query=mysql_query("select * from event_report, jenis_kejadian,user where jenis_kejadian.id_jeniskejadian = event_report.id_jeniskejadian and event_report.id_user = user.id_user and event_report.kode_bandara = '".$_SESSION['kode_bandara']."' ORDER BY date_event DESC")or die(mysql_error());
						while($row=mysql_fetch_array($query)){
						$id=$row['id_event'];
					?>
					<tr valign="top">
					<td><?php echo $no ?>.</td>
						<td>
							<input name="names[]" type="checkbox" value="<?php echo $id; ?>">
					  </td>
					  <td valign="top">
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
								echo "<a href='SHE/gambarevent/$data' target='_blank'><img src='SHE/gambarevent/$data' width='100px' height='100px'></a> <br>";
							}
							elseif($namafile == 'JPG')
							{
								echo "<a href='SHE/gambarevent/$data' target='_blank'><img src='SHE/gambarevent/$data' width='100px' height='100px'></a> <br>";
							}
							elseif($namafile == 'JPEG')
							{
								echo "<a href='SHE/gambarevent/$data' target='_blank'><img src='SHE/gambarevent/$data' width='100px' height='100px'></a> <br>";
							}
							elseif($namafile == 'jpeg')
							{
								echo "<a href='SHE/gambarevent/$data' target='_blank'><img src='SHE/gambarevent/$data' width='100px' height='100px'></a> <br>";
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
  							<source src='SHE/gambarevent/$data' type='video/mp4'>
							</video>
							<br>
							";
							}
							elseif($namafile == 'MP4')
							{
							 echo "
							 <video width='240' height='120' controls>
  							<source src='SHE/gambarevent/$data' type='video/mp4'>
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
						<a href="SHE/gambarevent/<?php echo $data1 ?>" target='_blank'>Lihat Foto 2</a>						
						</td>
						<td width="70%">
						<b>JENIS KEJADIAN : </b> <?php echo $row['nama_kejadian'] ?> 
					  <HR>
					  <b>DESKRIPSI</b> : <br>
					  <i><?php echo $row['deskripsi_singkat'] ?></i>
					  <BR>
					  <b>PELAPOR</b> : <br>
					  <?php echo $row['nama'] ?> 
					  <BR>
					  <b>POSTING DATE</b> : <br>
					  
					  <i><?php echo date("d/m/Y H:i:s", strtotime($row['date_event'])); ?></i>
						</td>
					  </tr>
					</table>
					  </td>
					  	<td>
						 <?php
					  $querytipe=mysql_query("select * from tabel_ygterlibat,yg_terlibat,jenis_yg_terlibat,optional_yg_terlibat where tabel_ygterlibat.id_event = '$id' and tabel_ygterlibat.id_ygterlibat=yg_terlibat.id_ygterlibat and tabel_ygterlibat.id_optional_yg_terlibat=optional_yg_terlibat.id_optional_yg_terlibat and yg_terlibat.id_jenis_ygterlibat=jenis_yg_terlibat.id_jenis_ygterlibat and jenis_yg_terlibat.id_jenis_ygterlibat=optional_yg_terlibat.id_jenis_ygterlibat")or die(mysql_error());
						while($rowtipe=mysql_fetch_array($querytipe)){
						echo"<li>";
						echo "<b>" . $rowtipe['nama_ygterlibat'] ."</b>";
						echo "<font color=green>(";
						echo $rowtipe['optional_jenis_ygterlibat'];
						echo ")</font>";
						echo"</li>";
						}
						?>
						<br>
						<a href="?page=<?php echo base64_encode('Edit Tabel Yang Terlibat'); ?><?php echo"&&id=$id";?>"><img src="images/icn_edit.png"></a>
						</td>
						<td>
						<?php
					  $querypenyebab=mysql_query("select * from tabel_kerugian,kerugian where tabel_kerugian.id_event = '$id' and tabel_kerugian.id_kerugian=kerugian.id_kerugian")or die(mysql_error());
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
						<br>
						<a href="?page=<?php echo base64_encode('Edit Tabel Kerugian'); ?><?php echo"&&id=$id";?>"><img src="images/icn_edit.png"></a>
						</td>
						<td>
					  <a href="SHE/map.php?latitude=<?php echo $row['latitude'] ?>&&longitude=<?php echo $row['longitude'] ?>" target="_blank">View Location</a>
					  </td>
						<td>
						<a href="SHE/report_event.php<?php echo"?id=$id";?>" target="_blank">PDF</a>
						</td>
						<td><a href="?page=<?php echo base64_encode('Edit Event'); ?><?php echo"&&id=$id";?>"><img src="images/icn_edit.png"></a></td>
						<td><a href="?page=<?php echo base64_encode('Data Event'); ?><?php echo"&&id=$id";?>" onClick="return confirm('Apakah Anda Yakin Akan Menghapus Data Terpilih?')"><img src="images/icn_trash.png"></a></td>
						
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