<?php

	require_once 'controller/functions.php';

	session_start();
	$user=fetchbyid($_SESSION["id"]);

	$passwordE=$repeatpasswordE=$previouspasswordE=$updatemessage="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST["update"]))
	{
		if(empty($_POST["password"]))
		{ 
			$passwordE="Password Required!";
		}
		elseif(!preg_match("/[a-zA-Z0-9][^ #!:$^&]{5,}$/", $_POST["password"]))
		{
			$passwordE="Must be of Length:6 and must contain lowercase, uppercase,number. Cannot contain '#!:$^&' ";
		}
		elseif($_POST["password"]==$_POST["repeatpassword"])
		{
			$data['password']=$_POST["password"];
		}
		if(empty($_POST["repeatpassword"]))
		{ 
			$repeatpasswordE="Password Required!";
		}
		elseif($_POST["password"]!=$_POST["repeatpassword"])
		{
			$repeatpasswordE="Must match with password!";
		}
		if($user['password']==$_POST["previouspassword"] && isset($data['password']))
		{
			$data['id']=$user['id'];
			updatepassword($data);
			$updatemessage="Successfully Updated";
		}
		else
		{
			$previouspassE="Doesn't match with password!";
		}
	}
	if(isset($_POST["back"]))
	{
		header("Location: dashboardpage.php");
	}
	if(isset($_POST["reset"]))
	{
		header("Location: passwordchangepage.php");
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Passowrd change</title>
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
		<legend> <b> CHANGE PASSWORD</b> </legend>
		<label for="previouspassword">Previous Password:</label>
		<input type="password" name="previouspassword" id="previouspassword" value="">
		<span class="error">* <?php echo $previouspasswordE?></span><br><br>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" value="">
		<span class="error">* <?php echo $passwordE?></span><br><br>
		<label for="repeatpassword">Repeat Password:</label>
		<input type="password" name="repeatpassword" id="repeatpassword" value="">
		<span class="error">* <?php echo $repeatpasswordE?></span><br><br>
		<input type="submit" name="update" value="Update">
		<input type="submit" name="back" value="BACK">
		<input type="submit" name="reset" value="RESET">
		<span class="error">* <?php echo $updatemessage?></span>
	</fieldset>
</form>


</body>
</html>