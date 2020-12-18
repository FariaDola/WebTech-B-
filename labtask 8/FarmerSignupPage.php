<?php
	
	session_start();

	require_once 'controller/functions.php';

	$firstname=$lastname=$username=$email=$password=$repeatpassword="";
	$firstnameE=$lastnameE=$usernameE=$emailE=$passwordE=$repeatpasswordE=$typeE=$imageE="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
		$user=fetch_user_byusername($_POST["username"]);

		if($user['id']=='0')
		{
			if(!empty($_POST["firstname"])&&!empty($_POST["lastname"]))
				{
					$data["firstname"]=$_POST["firstname"];
					$data["lastname"]=$_POST["lastname"];
				}
			if(!preg_match("/[a-z][^ #!:$^&]{7,15}$/",$_POST["username"]))
			{
				$usernameE="Min Length:8 Max Length:16 and cannot have '#!:$^&' ";
			}
			else
			{
				$data["username"]=$_POST["username"];
			}
			if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
			{
			  $emailE = "Invalid email format. Example:abcd@abcd.com";
			}
			else
			{
				$data["email"]=$_POST["email"];
			}
			if(!preg_match("/[a-zA-Z0-9][^ #!:$^&]{5,}$/", $_POST["password"]))
			{
				$passwordE="Must Length:6 and must have lowercase, uppercase,number. Cannot contain '#!:$^&' ";
			}
			elseif($_POST["password"]==$_POST["repeatpassword"])
			{
				$data["password"]=$_POST["password"];
			}
			if($_POST["password"]!=$_POST["repeatpassword"])
			{
				$repeatpasswordE="Must match with password!";
			}

			$data["type"]=$_POST["type"];
			$target_dir = "uploads/";
			$target_file = $target_dir.basename($_FILES["image"]["name"]);
			$imagename=basename($_FILES["image"]["name"]);

			if(isset($data["firstname"])&&isset($data["lastname"])&&isset($data["username"])&&isset($data["email"])&&isset($data["password"])&&isset($data["type"])&&move_uploaded_file($_FILES["image"]["tmp_name"] , $target_file))
			{
				$data['image'] = basename($_FILES["image"]["name"]);
				add_user($data);
			}
		}
		elseif($user['username']===$_POST["username"]&&$user['email']===$_POST["email"])
		{
			$usernameE="Username already exists!";
			$emailE="Email already exists!";
		}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>FARMER Login Page</title>
	<style>
		.fieldset label
		{
			font-size: 18px;
			display: inline-block;
			width: 20%;
			margin-left: 10%;
			text-align: left;
			padding: 1px;

		}
		input
		{
			font-size: 20px;
			display: inline;
			width: 60%; 
		}
		.error
		{
			color: red;
			margin-left: 35%;
		}
	</style>
</head>
<body >

	<form name="signupform" action="<?php echo $_SERVER["PHP_SELF"];?>" onsubmit="return validateSignupForm()" method="POST" enctype="multipart/form-data">
		<?php  include_once('view/outlay.php'); ?>
		<?php if (!isset($_SESSION["username"])) : ?>
			<fieldset class="fieldset">
				<br>
				<legend class="legend"><b>FARMER SIGNUP</b></legend>
				<label for="firstname"><b>First Name:</b></label>
				<input type="text" id="firstname" name="firstname"><span id="firstnameE" class="error"><?php echo $firstnameE;?></span><br>
				<label for="firstname"><b>Last Name:</b></label>
				<input type="text" id="lastname" name="lastname"><span id="lastnameE" class="error"><?php echo $lastnameE;?></span><br>
				<label for="image"><b>Profile Image:</b></label>
				<input type="file" id="image" name="image"><span id="imageE" class="error"><?php echo $imageE;?></span><br>
				<label for="username"><b>User Name:</b></label>
				<input type="text" id="username" name="username"><span id="usernameE" class="error"><?php echo $usernameE;?></span><br>
				<input type="hidden" name="type" value="farmer">
				<label for="email"><b>Email:</b></label>
				<input type="text" id="email" name="email"><span id="emailE" class="error"><?php echo $emailE;?></span><br>
				<label for="password"><b>Password:</b></label>
				<input type="Password" id="password" name="password"><span id="passwordE" class="error"><?php echo $passwordE;?></span><br>
				<label for="password"><b>Repeat Password:</b></label>
				<input type="Password" id="repeatpassword" name="repeatpassword"><span id="repeatpasswordE" class="error"><?php echo $repeatpasswordE;?></span><br>
				<span style="margin-left:30%"><input class="button" type="submit" name="login" value="Sign up" style="padding: 5px 30px;"></span>
			</fieldset>
		<?php elseif(isset($_SESSION["userName"])):?>
			<?php header('Location: FarmerPage.php?message=welcome');?>
		<?php else:?>
			<?php header('Location: FarmerLoginPage.php');?>
		<?php endif; ?>
		<script type="text/javascript" src="farmerRegistrationscript.js"></script>
</body>
</html>