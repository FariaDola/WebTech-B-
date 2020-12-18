<?php
	
	session_start();

	require_once 'controller/functions.php';
	$loginUserName=$loginPassword="";
	$loginUserNameError=$loginPasswordError="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
		$user=fetch_user_byusername($_POST["loginUserName"]);

		if($user['id']=='0')
		{
			$loginUserNameError="Username does not exist!";
		}
		else
		{
			if($user['username']==$_POST['loginUserName']&&$user['password']==$_POST['loginPassword'])
			{	
				$_SESSION['id'] = $user['id'];

				if(isset($_POST['rememberme']))
				{
					setcookie('user', $user['firstname'].$user['lastname'], time()+900);
				}

				header("Location: FarmerPage.php");
			}
			elseif($user['username']==$_POST['loginUserName']&&$user['password']!=$_POST['loginPassword'])
			{
				$loginUserNameError="Invalid Username!";
				$loginPasswordError="Invalid Password!";
			}
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
	<script type="text/javascript" src="farmerloginscript.js"></script>
</head>
<body >

	<form name="loginform" action="<?php echo $_SERVER["PHP_SELF"];?>" onsubmit="return validateForm()" method="POST">
		<?php  include_once('view/outlay.php'); ?>
		<?php if (!isset($_SESSION["userName"])) : ?>
			<fieldset class="fieldset">
				<br>
				<legend class="legend"><b>FARMER LOGIN</b></legend>
				<label for="loginUserName"><b>User Name:</b></label>
				<input type="text" id="loginUserName" name="loginUserName"><span id="loginUserNameError" class="error"><?php echo $loginUserNameError;?></span><br>
				<label for="loginPassword"><b>Password:</b></label>
				<input type="Password" id="loginPassword" name="loginPassword"><span id="loginPasswordError" class="error"><?php echo $loginPasswordError;?></span><br>
				<span style="margin-left:30%"><input class="button" type="submit" name="login" value="login" style="padding: 5px 30px;"></span>
			</fieldset>
		<?php elseif(isset($_SESSION["userName"])):?>
			<?php header('Location: FarmerPage.php?message=welcome');?>
		<?php else:?>
			<?php header('Location: FarmerLoginPage.php');?>
		<?php endif; ?>
		<script type="text/javascript" src="farmerloginscript.js"></script>
</body>
</html>