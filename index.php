<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
include "Login.php";
	}
	else
	{
	?>
<?php 
include('koneksi.php'); 
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<?php
if ( substr_count( $_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip' ) ) {
    ob_start( "ob_gzhandler" );
}
else {
    ob_start();
}
?>
	<?php include"meta.php"; ?>

	<?php include"csslayout.php"; ?>
	
	<?php include"scriptjs.php"; ?>
</head>

<body>

	<?php include"headerlayout.php"; ?>
	
	<?php include"mapprofile.php"; ?>
	
	<?php 
	include"sideleft.php"; 
	?>	
	<section id="main" class="column">
	<?php include"switchcase.php"; ?>	
	
		<div class="spacer"></div>

	</section>
</body>
</html>
<?php
}
?>