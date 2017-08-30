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

<script>
            function tampilkanPreview(gambar,idpreview){
//                membuat objek gambar
                var gb = gambar.files;
                
//                loop untuk merender gambar
                for (var i = 0; i < gb.length; i++){
//                    bikin variabel
                    var gbPreview = gb[i];
                    var imageType = /image.*/;
                    var preview=document.getElementById(idpreview);            
                    var reader = new FileReader();
                    
                    if (gbPreview.type.match(imageType)) {
//                        jika tipe data sesuai
                        preview.file = gbPreview;
                        reader.onload = (function(element) { 
                            return function(e) { 
                                element.src = e.target.result; 
                            }; 
                        })(preview);

    //                    membaca data URL gambar
                        reader.readAsDataURL(gbPreview);
                    }else{
//                        jika tipe data tidak sesuai
                        alert("Type file tidak sesuai. Khusus image.");
                    }
                   
                }    
            }
        </script>
		
<div class="module_content">
<?php
	if (isset($_POST['Simpan']))
	{
		$url_folder_gambar = "gambarhazard/";
		$foto_videox = $_FILES['userfilex']['name'];
		$lokasi_file = $_FILES['userfilex']['tmp_name'];
		$tipe_file = $_FILES['userfilex']['type'];
		$ukuran_file = $_FILES['userfilex']['size'];
		$uploadfile = $url_folder_gambar . $foto_videox;
	    $cookihazard = $_POST['cookieshazard'];
		$typehazard   = $_POST['typehazard'];
		$banyak_typehazard	= count($typehazard);
		$penyebabhazard   = $_POST['penyebabhazard'];
		$banyak_penyebabhazard	= count($penyebabhazard);

		 if ((isset($foto_videox)) && ($foto_videox != "")) 
		 { 		
					move_uploaded_file($_FILES['userfilex']['tmp_name'], $uploadfile);
					$query = "insert into hazard_report values('$cookihazard','USER','$_POST[deskripsi_singkat]','$foto_videox')";
					
										$sql = mysql_query($query);
										if($sql) 
										{
										
												for($i=0; $i<$banyak_typehazard; $i++)
												 {
													mysql_query("insert into tabel_tipehazard values('$cookihazard','$typehazard[$i]')");
													}
			 
													 for($k=0; $k<$banyak_penyebabhazard; $k++)
												{
													mysql_query("insert into tabel_penyebabhazard values('$cookihazard','$penyebabhazard[$k]')");
													 }
											 
											echo"<h4 class='alert_success'>Data Berhasil Di Tambahkan</h4>";
											echo "<br>";
										} 
										
										else 
										{
											echo"<h4 class='alert_success'><font color='red'>Data Gagal Di Tambahkan</font></h4>";
										}
				}
}
?>

		
		
<body>

<?php
$length = 20;
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
$cookie = $randomString;
?>
	<form action="" method="POST" name="INPUT" enctype="multipart/form-data">
	 <input name="cookieshazard" type="hidden" value="<?php echo $cookie ;?>">
	
	<table width="100%" border="0">
  <tr>
    <td width="49%" valign="top">
	<table width="100%" border="0" align="center">
	
	
   <tr valign="top">
    <td width="11%" height="24" for="select-choice-1" class="select">Tipe Hazard</td>
	<td width="1%">&nbsp;</td>
	<?php include 'koneksi.php';
 $hasil_db = mysql_query("SELECT * FROM tipe_hazard");
 ?>
 	<td width="35%" height="24"><select name="id_tipehazard">   
	<option value="">Silahkan Pilih</option>
	<?php
 while ($data = mysql_fetch_array($hasil_db))
 {
 ?>
        <option value="<?php echo $data['id_tipehazard']; ?>"><?php echo $data['nama_tipehazard']; ?></option>
<?php
		}
?>
</td>
</select>
   </tr>
   
  <tr valign="top">
     <td width="11%" height="24">Penyebab Hazard</td>
	  <td width="1%">&nbsp;</td>
	  <?php include 'koneksi.php';
 		$hasil_db = mysql_query("SELECT * FROM penyebab_hazard");
 		?>
		<td width="35%" height="24"><select name="id_penyebabhazard">   
		<option value="">Silahkan Pilih</option>
		<?php
 	while ($data = mysql_fetch_array($hasil_db))
 	{
	 ?>
        <option value="<?php echo $data['id_penyebabhazard']; ?>"><?php echo $data['nama_penyebabhazard']; ?></option>
	<?php
		}
	?>
	</td>
	</select>
  </tr>
	
	
	<tr valign="top">
     <td width="11%">Deskripsi Singkat</td>
	     <td width="1%">&nbsp;</td>
    <td width="47%"><font>
      <textarea name="deskripsi_singkat" cols="30" rows="5" required></textarea>
    </font></td>
  </tr>
  <tr valign="top">
     <td width="11%" height="244">Foto/Video</td>
	 <td width="1%">&nbsp;</td>
	 <td width="47%" rowspan="7" valign="top">
	   <p><img id="preview" src="gambarhazard/default.jpg" width="209" height="226" />File Max 10MB <br>
	      <input name="userfilex" type="file"  onChange="tampilkanPreview(this,'preview')" />
	     </p>	   </td>
	</tr>
	<tr valign="top">
     <td width="11%"></td>
	 <td width="1%">&nbsp;</td>
    <td width="41%" height="26"><input type="submit" name="Simpan" value="Simpan"> <input type="submit" name="Reset" value="Cancel"></td>
  </tr>
</table>

</form>
</body>
</div>
</article>