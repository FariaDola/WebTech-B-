<?php

	require_once 'controller/functions.php';
	session_start();
	$user=fetchbyid($_SESSION["id"]);
	$id=$user['id'];
	$firstname=$user['firstname'];
	$lastname=$user['lastname'];
	$username=$user['username'];
	$password=$user['password'];
	$email=$user['email'];
	$image=$user['image'];
	$firstnameE=$lastnameE=$usernameE=$emailE=$imageE=$updatemessage="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST["update"]))
	{
		if(empty($_POST["firstname"])||empty($_POST["lastname"]))
		{ 
			$firstnameE="First Name required!";
			$lastnameE="Last Name required!";
		}
		else
		{
			$data['firstname']=$_POST["firstname"];
			$data['lastname']=$_POST["lastname"];
		}
		if(empty($_POST["username"]))
		{
			$usernameE="Username required!";
		}
		elseif(!preg_match("/[a-z][^ #!:$^&]{7,15}$/",$_POST["username"]))
		{
			$usernameE="Must be of Length:8-16 and cannot contain '#!:$^&' ";
		}
		else
		{
			$data['username']=$_POST['username'];
		}
		if(empty($_POST["email"]))
		{
			$emailE="Email required!";
		}
		elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
		{
			 $emailE = "Invalid email format. Example: something@domain.com";
		}
		else
		{
			$data['email']=$_POST['email'];
		}
		$target_dir = "uploads/";
		$target_file = $target_dir.basename($_FILES["image"]["name"]);

		if(isset($data['firstname'])&&isset($data['lastname'])&&isset($data['username'])&&isset($data['email'])&&move_uploaded_file($_FILES["image"]["tmp_name"] , $target_file))
		{
			$data['id']=$_SESSION['id'];
			$data['image'] = basename($_FILES["image"]["name"]);
			updateuserwithimage($data);
			$user=fetchbyid($_SESSION["id"]);
			$id=$user['id'];
			$firstname=$user['firstname'];
			$lastname=$user['lastname'];
			$username=$user['username'];
			$password=$user['password'];
			$email=$user['email'];
			$image=$user['image'];
			$updatemessage="Successfully Updated";
		}
		elseif(isset($data['firstname'])&&isset($data['lastname'])&&isset($data['username'])&&isset($data['email']))
		{
			$data['id']=$_SESSION['id'];
			updateuser($data);
			$user=fetchbyid($_SESSION["id"]);
			$id=$user['id'];
			$firstname=$user['firstname'];
			$lastname=$user['lastname'];
			$username=$user['username'];
			$password=$user['password'];
			$email=$user['email'];
			$image=$user['image'];
			$updatemessage="Successfully Updated";
		}
	}
	if(isset($_POST["back"]))
	{
		header("Location: dashboardpage.php");
	}
	if(isset($_POST["reset"]))
	{
		header("Location: editprofilepage.php");
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
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
		<legend> <b> EDIT PROFILE </b> </legend>
		<label for="firstname">First Name:</label>
		<input type="text" name="firstname" id="firstname" value="<?php echo $firstname?>">
		<span class="error">* <?php echo $firstnameE?></span><br><br>
		<label for="lastname">Last Name:</label>
		<input type="text" name="lastname" id="lastname" value="<?php echo $lastname?>">
		<span class="error">* <?php echo $lastnameE?></span><br><br>
		<label for="image">Image:</label>
		<input type="file" name="image" id="image" >
		<span class="error">* <?php echo $imageE?></span><br><br>
		<label for="username">Username:</label>
		<input type="text" name="username" id="username" value="<?php echo $username?>">
		<span class="error">* <?php echo $usernameE?></span><br><br>
		<label for="email">Email:</label>
		<input  type="text" name="email" id="email" value="<?php echo $email?>">
		<span class="error">* <?php echo $emailE?></span><br><br>
		<input type="hidden" name="image" id="image" value="<?php echo $lastname?>">
		<input type="submit" name="update" value="Update">
		<input type="submit" name="back" value="BACK">
		<input type="submit" name="reset" value="RESET">
		<span class="error">* <?php echo $updatemessage?></span>
	</fieldset>
</form>


</body>
</html>