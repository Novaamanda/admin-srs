	<aside id="sidebar" class="column">
	
	<?php
		if($_SESSION['leveluser']=='admin')
	{
	include"include_sideleftga.php";
	echo "<hr>";
	include"include_sideleftshe.php";
	//echo "<hr>";
	//include"include_sideleftadmin.php"; 
	}
	elseif($_SESSION['leveluser']=='GA')
	{
	include"include_sideleftga.php";  
	}
	elseif($_SESSION['leveluser']=='SHE')
	{
	include"include_sideleftshe.php"; 
	}
	?>	
	<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_jump_back"><a href="logout.php">Logout</a></li>
		</ul>
		<footer>
			<p><strong>Copyright &copy; 2014 PT.Angkasa Pura I (Persero)</strong></p>
		</footer>
	</aside><!-- end of sidebar -->
