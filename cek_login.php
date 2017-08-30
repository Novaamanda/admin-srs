<?php
session_start();
include "koneksi.php";
$pass=md5($_POST['password']);

$sql=mysql_query("SELECT * FROM user WHERE id_user='$_POST[username]' AND password='$pass'");
$level=mysql_num_rows($sql);
$r=mysql_fetch_array($sql);

if ($level > 0){


	$_SESSION['namauser'] = $r['id_user'];
	$_SESSION['passuser'] = $r['password'];
	$_SESSION['leveluser']= $r['level'];
 	$_SESSION['unit'] = $r['unit'];
	$_SESSION['kode_bandara'] = $r['kode_bandara'];
	header('location:index.php');
	}

	else{
	header('location:index.php');
	}
?>
