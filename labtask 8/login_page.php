<?php
 	
 	if(isset($_POST['login_user']))
 	{
 		$user=$_POST['login_user'];
 		switch ($user) {
 			case 'user':
 				header('Location: login_page.php');
 				break;
 			case 'farmer':
 				header('Location: FarmerLoginPage.php');
 				break;
 			case 'admin':
 				header('Location: login_page.php');
 				break;
 			default:
 				header('Location: login_page.php');
 				break;
 		}	

 	}
 	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<style>
	
</style>
<body >

	<?php  include('view/outlay.php'); ?>
	<form action=login_page.php method="post">
	<?php session_start(); session_unset(); session_destroy(); ?>
	<fieldset class="fieldset">
		<br>
		<legend class="legend"><b>LOGIN AS</b></legend>
		<div style="margin-left: 20%;">
			<input type="radio" name="login_user" value="user">
			<label for="login"><b>User</b></label>
			<input type="radio" name="login_user" value="farmer">
			<label for="login"><b>Farmer</b></label>
			<input type="radio" name="login_user" value="admin">
			<label for="login"><b>Admin</b></label>
			<input type="radio" name="login_user" value="guest">
			<label for="login"><b>Guest</b></label>
			<br>
			<br>
			<span style="margin-left:20%"><input class="button" type="submit" name="login" value="login" style="padding: 5px 20px; font-size: 20px; width: 10%; position: fixed; "></span>
			<br>
		</div>
	</fieldset>
	
</body>
</html>