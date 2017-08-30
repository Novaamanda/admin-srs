<section id="secondary_bar">
		<div class="user">
			<p><?php
			$sql=mysql_query("SELECT * FROM user");
		$level=mysql_num_rows($sql);
		$r=mysql_fetch_array($sql);
			 echo $r[nama_lengkap] 
			 ?> 
			 (<a href="#">Profile</a>)
			 </p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.php">Home</a> <div class="breadcrumb_divider"></div> <a class="current">
			 <?php
			 
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
			 </a></article>
		</div>
	</section><!-- end of secondary bar -->