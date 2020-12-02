<?php
	
	session_start();

	require_once 'controller/functions.php';
	$username=$password="";
	$usernameE=$passwordE="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST["login"]))
	{
		$user=fetchbyusername($_POST["username"]);

		if(empty($_POST['username'])&&empty($_POST['username']))
		{
			$usernameE="Username can not be empty!";
			$passwordE="Password can not be empty!";
		}
		if($user['id']=='0')
		{
			$usernameE="Username does not exist!";
		}
		else
		{
			if($user['username']==$_POST['username']&&$user['password']==$_POST['password'])
			{	
				$_SESSION['id'] = $user['id'];

				if(isset($_POST['remember']))
				{
					setcookie('user', $user['firstname'].$user['lastname'], time()+900);
				}

				header("Location: dashboardpage.php");
			}
			elseif($user['username']==$_POST['username']&&$user['password']!=$_POST['password'])
			{
				$usernameE="Invalid Username!";
				$passwordE="Invalid Passoword!";
			}
		}

	}
	if(isset($_POST["back"]))
	{
		header("Location: publichome.php");
	}
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<style>
		.error
		{
			color: red;
		}
	</style>
</head>
<body>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
	<fieldset style="width: 35%">
		  	<legend> <b> LOGIN </b> </legend>
			<label for="username">Username:</label></td>
			<input type="text" name="username" id="username" value="<?php echo $username?>">
			<span class="error">* <?php echo $usernameE?></span><br><br>
			<label for="password">Password:</label>
			<input type="password" name="password" id="pasword" value="<?php echo $password?>">
			<span class="error">* <?php echo $passwordE?></span><br><br>
			<input type="checkbox" name="remember" id="remember" value="">
			<label for="remember">Remember me</label><br><br>
			<input type="submit" name="login" value="LOGIN">
			<input type="submit" name="back" value="BACK">
	</fieldset>
</form>


</body>
</html>