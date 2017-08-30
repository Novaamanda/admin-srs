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
$query = "SELECT * FROM message_center WHERE id_message='$kode'";
$sql = mysql_query($query);
$tampil = mysql_fetch_array($sql);
	$message = $tampil['message'];
	$body_message = $tampil['body_message'];
if (isset($_POST['Edit'])){
	$query = "UPDATE message_center SET message='".$_POST['message']."',body_message='".$_POST['body_message']."' WHERE id_message='$kode'";
	$sqk = mysql_query($query);
	if($sql){
		echo"<h4 class='alert_success'>Sucsess Edit Data</h4>";
	} else {
		echo"<h4 class='alert_success'>Gagal Edit Data</h4>";
	}
	//echo "<meta http-equiv='refresh' content='0;URL=?page= '";
}
?>
<form action="" method="POST" name="Edit">

<table width="100%" border="0">
  <tr>
    <td width="49%" valign="top">
	<table width="100%" border="0" align="center">
	
	<tr valign="top">
    <td width="10%" height="24">Message</td>
	<td width="2%">&nbsp;</td>
   <td width="88%"><input type="text" name="message" size="70" value="<?php echo $message ?>"></td>
    </tr>
	
	<tr valign="top">
    <td width="10%" height="24">Body Message</td>
	<td width="2%">&nbsp;</td>
   <td width="88%">
   <textarea name="body_message" cols="100" rows="10"> <?php echo $body_message ?> </textarea>
    </tr>
	
	<tr valign="top">
    <td width="10%" height="89">&nbsp;</td>
    <td width="2%">&nbsp;</td>
	<td width="88%">
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