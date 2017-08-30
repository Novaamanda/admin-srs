<!doctype html>

<head>

	<!-- Basics -->
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Login Administrator</title>

	<!-- CSS -->
	
	<link rel="stylesheet" href="csslogin/reset.css">
	<link rel="stylesheet" href="csslogin/animate.css">
	<link rel="stylesheet" href="csslogin/styles.css">
	
</head>

	<!-- Main HTML -->
	
<body>
		
	<!-- Begin Page Content -->
	<div id="container">
		<table width="100%" border="1" align="center">
  <tr align="center">
    <td valign="middle">
	<br>
	<img src="images/logo2.png" alt="yourlogo" width="170" height="63" class="logo" />	</td>
  </tr>
</table>
		<form method="POST" action="cek_login.php">
		
		<label for="name">Username:</label>
		
		<input type="name" name="username" onClick="this.value='';" onFocus="this.select()" onBlur="this.value=!this.value?'Username':this.value;" value="Username" />
		
		<label for="username">Password:</label>
		
		<p><a href="#">Forgot your password?</a>
		
		<input type="password" name="password" onClick="this.value='';" onFocus="this.select()" onBlur="this.value=!this.value?'Password':this.value;" value="Password">
		<table width="100%" border="1" align="center">
  <tr align="center">
    <td valign="middle">
      <span class="check">Bandara International Ahmad Yani Semarang</span> <br>
      <span class="check">Information Technology</span></td>
  </tr>
</table>
		<div id="lower">
		
		<input type="checkbox"><label class="check" for="checkbox">Keep me logged in</label>
		
		<input type="submit" value="Login">
		
		</div>
		
		</form>
		
	</div>	
	<!-- End Page Content -->
	
</body>

</html>