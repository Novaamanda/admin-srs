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
		$url_folder_gambar = "gambarevent/";
		$foto_videox = $_FILES['userfilex']['name'];
		$lokasi_file = $_FILES['userfilex']['tmp_name'];
		$tipe_file = $_FILES['userfilex']['type'];
		$ukuran_file = $_FILES['userfilex']['size'];
		$uploadfile = $url_folder_gambar . $foto_videox;
	   	$cookievent = $_POST['cookiesevent'];
		$ygterlibat   = $_POST['ygterlibat'];
		$banyak_ygterlibat	= count($ygterlibat);
		$kerugian   = $_POST['kerugian'];
		$banyak_kerugian	= count($kerugian);
		 if ((isset($foto_videox)) && ($foto_videox != "")) 
		 { 		
					move_uploaded_file($_FILES['userfilex']['tmp_name'], $uploadfile);
					$query = "insert into event_report values('$cookievent','USER','$_POST[id_jeniskejadian]', '$_POST[deskripsi_singkat]','$foto_videox')";
					
										$sql = mysql_query($query);
										if($sql) 
										{
										
												for($i=0; $i<$banyak_ygterlibat; $i++)
												 {
												 $keterangan_ygterlibat   = $_POST['keterangan_ygterlibat'];
													mysql_query("insert into tabel_ygterlibat values('$cookievent','$ygterlibat[$i]','$keterangan_ygterlibat[$i]')");
													}
			 
													 for($k=0; $k<$banyak_kerugian; $k++)
												{
													mysql_query("insert into tabel_kerugian values('$cookievent','$kerugian[$k]','')");
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
	<input name="cookiesevent" type="hidden" value="<?php echo $cookie ;?>">
	<table width="100%" border="0">
  <tr>
    <td width="49%" valign="top">
	<table width="100%" border="0" align="center">
	
	
   <tr valign="top">
    <td width="14%" height="24" for="select-choice-1" class="select">Jenis Kejadian</td>
	<td width="1%">&nbsp;</td>
	<?php include 'koneksi.php';
 $hasil_db = mysql_query("SELECT * FROM jenis_kejadian");
 ?>
 	<td width="35%" height="24"><select name="id_jeniskejadian">   
	<option value="">Silahkan Pilih</option>
	<?php
 while ($data = mysql_fetch_array($hasil_db))
 {
 ?>
        <option value="<?php echo $data['id_jeniskejadian']; ?>"><?php echo $data['nama_kejadian']; ?></option>
<?php
		}
?>
</td>
</select>
   </tr>
   
  <tr valign="top">
     <td width="14%" height="24">Yang Terlibat</td>
	  <td width="1%">&nbsp;</td>
	  <?php include 'koneksi.php';
 		$hasil_db = mysql_query("SELECT * FROM yg_terlibat");
 		?>
		<td width="35%" height="24"><select name="id_ygterlibat">   
		<option value="">Silahkan Pilih</option>
		<?php
 	while ($data = mysql_fetch_array($hasil_db))
 	{
	 ?>
        <option value="<?php echo $data['id_ygterlibat']; ?>"><?php echo $data['nama_ygterlibat']; ?></option>
	<?php
		}
	?>
	</td>
	</select>
  </tr>
  
  <tr valign="top">
     <td width="14%" height="24">Kerugian</td>
	  <td width="1%">&nbsp;</td>
	  <?php include 'koneksi.php';
 		$hasil_db = mysql_query("SELECT * FROM kerugian");
 		?>
		<td width="35%" height="24"><select name="id_kerugian">   
		<option value="">Silahkan Pilih</option>
		<?php
 	while ($data = mysql_fetch_array($hasil_db))
 	{
	 ?>
        <option value="<?php echo $data['id_kerugian']; ?>"><?php echo $data['nama_kerugian']; ?></option>
	<?php
		}
	?>
	</td>
	</select>
  </tr>
	
	
	<tr valign="top">
     <td width="14%">Deskripsi Singkat</td>
	     <td width="1%">&nbsp;</td>
    <td width="43%"><font>
      <textarea name="deskripsi_singkat" cols="30" rows="5" required></textarea>
    </font></td>
  </tr>
  <tr valign="top">
     <td width="14%" height="244">Foto/Video</td>
	 <td width="1%">&nbsp;</td>
	 <td width="43%" rowspan="7" valign="top">
	   <p><img id="preview" src="gambarevent/default.jpg" width="209" height="226" />File Max 10MB <br>
	      <input name="userfilex" type="file"  accept="image/*" onChange="tampilkanPreview(this,'preview')" />
	     </p>	   </td>
	</tr>
	<tr width="2%">&nbsp;</tr>
	<tr valign="top">
    <td width="14%" height="29">&nbsp;</td>
    <td width="1%">&nbsp;</td>
	<td width="42%"><input type="submit" name="Simpan" value="Simpan"> <input type="submit" name="Reset" value="Cancel"></td>
  </tr>

</table>

</form>
</body>
</div>
</article>