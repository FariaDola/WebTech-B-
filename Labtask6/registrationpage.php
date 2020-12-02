<?php
	
	require_once 'controller/functions.php';
	$firstname=$lastname=$username=$email=$pass=$repeatpass="";
	$firstnameE=$lastnameE=$usernameE=$emailE=$passwordE=$repeatpasswordE=$typeE=$imageE="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST["register"]))
	{
		$user=fetchbyusername($_POST["username"]);
		if($user['id']=='0')
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
			if(empty($_POST["password"]))
			{ 
				$passwordE="Password Required!";
			}
			elseif(!preg_match("/[a-zA-Z0-9][^ #!:$^&]{5,}$/", $_POST["password"]))
			{
				$passwordE="Password Must be of Length:6 and must contain lowercase, uppercase,number. Cannot contain '#!:$^&' ";
			}
			elseif($_POST["password"]==$_POST["repeatpassword"])
			{
				$data['password']=$_POST["password"];
			}
			if(empty($_POST["repeatpassword"]))
			{ 
				$repeatpasswordE="Repeat password required!";
			}
			elseif($_POST["password"]!=$_POST["repeatpassword"])
			{
				$repeatpasswordE="Password doesn't match!";
			}
			if(!isset($_POST["type"]))
			{ 
				$typeE="Must select one!";
			}
			else
			{
				$data['type']=$_POST["type"];
			}

			$target_dir = "uploads/";
			$target_file = $target_dir.basename($_FILES["image"]["name"]);

			if(isset($data['firstname'])&&isset($data['lastname'])&&isset($data['username'])&&isset($data['email'])&&isset($data['password'])&&isset($data['type'])&&move_uploaded_file($_FILES["image"]["tmp_name"] , $target_file))
			{
				$data['image'] = basename($_FILES["image"]["name"]);
				insertuser($data);
			}
			else
			{
				$imageE="Must upload Image!";
			}
		}
		elseif($user['username']===$_POST["username"]&&$user['email']===$_POST["email"])
		{
			$usernameE="Username already exists!";
			$emailE="Email already exists!";
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
	<title> Registration Page</title>
	<style >
		.error
		{
			color: red;
		}

	</style>
</head>
<body>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
		 <fieldset style="width: 35%">
		  <legend> <b> REGISTER HERE </b> </legend>
			  <label for="firstname">First name:</label>
			  <input type="text" id="firstname" name="firstname">
			  <span class="error">* <?php echo $firstnameE?></span><br><br>
			  <label for="lastname">Last name:</label>
			  <input type="text" id="lastname" name="lastname">
			  <span class="error">* <?php echo $lastnameE?></span><br><br>
			  <label for="image">Image:</label>
			  <input type="file" name="image" id="image">
			  <span class="error">* <?php echo $imageE?></span><br><br>
			  <label for="username">Username:</label>
			  <input type="text" id="username" name="username">
			  <span class="error">* <?php echo $usernameE?></span><br><br>
			  <label for="email">Email:</label>
			  <input type="email" id="email" name="email">
			  <span class="error">* <?php echo $emailE?></span><br><br>
			  <label for="password">Password:</label>
			  <input type="password" id="password" name="password">
			  <span class="error">* <?php echo $passwordE?></span><br><br>
			  <label for="rpassword"> Repeat Password:</label>
			  <input type="password" id="repeatpassword" name="repeatpassword">
			  <span class="error">* <?php echo $repeatpasswordE?></span><br><br>
			  <label>Type:</label>
			  <input type="radio" name="type" id="admin" value="admin">
			  <label for="admin">ADMIN</label>
			  <input type="radio" name="type" id="farmer" value="farmer">
			  <label for="farmer">FARMER</label>
			  <input type="radio" name="type" id="client" value="client">
			  <label for="client">CLIENT</label>
			  <span class="error">* <?php echo $typeE?></span><br><br>
			  <input type="submit" name="register" value="Register">
			  <input type="submit" name="back" value="Back">
		 </fieldset>
	</form>
</body>
</html>