<!-- table -->
<?php 
include "scriptjs_table.php";
?>

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
if (isset($_POST['delete_penyebabhazard'])&&($_POST['names'])){
	$id=$_POST['names'];
	$N = count($id);
	for($i=0; $i < $N; $i++){
		$result = mysql_query("DELETE FROM penyebab_hazard where id_penyebabhazard='$id[$i]'");
	}
	echo"<h4 class='alert_success'>Sucsess Delete</h4>";
}
else if (isset($_GET['id'])){
$kode=$_GET['id'];
$query = "DELETE FROM penyebab_hazard WHERE id_penyebabhazard='$kode'";
	$sql = mysql_query($query);
	if($sql) {
		echo"<h4 class='alert_success'>Sucess Delete</h4>";
	} else{
		echo"<h4 class='alert_success'>Gagal Delete</h4>";
	}
}
else if (isset($_POST['deleteall_penyebabhazard'])){
	// Empty table
$query = "TRUNCATE TABLE penyebab_hazard";
mysql_query($query);
echo"<h4 class='alert_success'>Sucsess Delete</h4>";
}

?>

<form method="post" action="" name="myform">
<table width="100%" border="0" background="images/table_sorter_header.png">
  <tr>
    <td>
<input type="button" onClick="javascript:setCheckboxes3(1);" value="Check All">
<input type="button" onClick="javascript:setCheckboxes3(0);" value="Uncheck All">
<!-- <input type="button" onClick="javascript:setCheckboxes3(2);" value="Invert"> -->
<input name="delete_penyebabhazard" type="submit" onClick="return confirm('Apakah Anda Yakin Akan Menghapus Data Terpilih?')" value="Delete Selected">
<!-- <input type="submit" value="Empty Table" name="deleteall_penyebabhazard" onClick="return confirm('Apakah Anda Yakin Akan Mengosongkan Data ?')"> -->
</td>
<td>&nbsp;</td>
    <td align="right">
<input type="button" onClick="window.location.href='?page=<?php echo base64_encode('Tambah Penyebab Hazard'); ?>'" value="Add Penyebab Hazard"> 
</td>
  </tr>
</table>
                <table cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse" bordercolor="#EEEEEE" class="display" id="example" width="100%" bgcolor="#FFFFFF">		
                <thead>		
                <tr bgcolor="#006699">
				<th width="1%"> <font color="#fff">No.</font> </th>
					<th width="1%"></th>
                    <th width="20%"> <font color="#fff">PENYEBAB HAZARD</font> </th>
					<th></th>
					<th></th>
                </tr>
                </thead>
				
				<tbody >
					<?php 
					$no=1;
						$query=mysql_query("select * from penyebab_hazard ORDER BY id_penyebabhazard ASC")or die(mysql_error());
						while($row=mysql_fetch_array($query)){
						$id=$row['id_penyebabhazard'];
					?>
					<tr>
					<td><?php echo $no ?>.</td>
						<td>
							<input name="names[]" type="checkbox" value="<?php echo $id; ?>">
					  </td>
                        <td><?php echo $row['nama_penyebabhazard'] ?></td>
						<td width="2%"><a href="?page=<?php echo base64_encode('Edit Penyebab Hazard'); ?><?php echo"&&id=$id";?>"><img src="images/icn_edit.png"></a></td>
						<td width="2%"><a href="?page=<?php echo base64_encode('Data Penyebab Hazard'); ?><?php echo"&&id=$id";?>" onClick="return confirm('Apakah Anda Yakin Akan Menghapus Data Terpilih?')"><img src="images/icn_trash.png"></a></td>
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