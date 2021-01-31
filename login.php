<?php 
session_start();
if(isset($_SESSION["login"])){
	header("location: index.php");
}
require 'connect.php';

if( isset ($_POST["login"])){
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = query("SELECT * FROM user WHERE username = '$username' and password = '$password'")[0];
	
	$user = $result["id_user"];

	if ($user == 1) {
		$_SESSION["login"] = true;

		header("location:index.php");
		exit;
	}
	if ($user == 2) {
		$_SESSION["login"] = true;

		header("location:list.php");
		exit;
	}

	$error = true;
}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
	   <center>
		<h2>LOGIN</h2>
		  <form action="" method="post">

			<p>Username</p>
			<input type="text" name="username" autocomplete="off">

			<p>Password</p>
			<input type="password" name="password">

			<?php if (isset($error)) : ?>
				<p style="color: red; font-style: italic;">Username / password salah</p>
			<?php endif; ?>

			<button type="submit" name="login">LOG IN</button>
		  </form>
	   </center>
	</div>
</body>
</html>