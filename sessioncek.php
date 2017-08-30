<?php
session_start();
if (empty($_SESSION[namauser]) AND empty($_SESSION[passuser])){
	echo "<center>Untuk mengakses halaman ini, Anda harus login terlebih dahulu<br>";
	echo "<a href=index.php><b>Halaman Login</b></a></center>";
	}
else{
	include "koneksi.php";

	if ($_SESSION['leveluser']=='admin'){
		$sql=mysql_query("SELECT * FROM user WHERE level='admin'");
		$level=mysql_num_rows($sql);
		$r=mysql_fetch_array($sql);
	
			echo "Hi <b>$r[nama_lengkap]</b><br><br>";
			echo "Andamasuk sebagai <b>Administrator</b><br>";
			echo "<a href=logout.php><b>Logout</b></a></center>";
		}
		
		elseif ($_SESSION['leveluser']=='user'){
				$sql=mysql_query("SELECT * FROM user WHERE level='user'");
				$level=mysql_num_rows($sql);
				$r=mysql_fetch_array($sql);
	
			echo "Hi <b>$r[nama_lengkap]</b><br><br>";
			echo "Andamasuk sebagai <b>User Biasa</b><br>";
			echo "<a href=logout.php><b>Logout</b></a></center>";
		}
	}
?>
