<?php
	
	require_once 'controller/functions.php';
	session_start();
	$src="";
	$user=fetchbyid($_SESSION["id"]);

	if(isset($_POST["back"]))
	{
		header("Location: dashboardpage.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile of  <?php echo $user['username'] ?></title>
</head>
<body>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
	<fieldset style="width: 35%">
		<legend> <b>Profile of  <?php echo $user['username'] ?></b> </legend>
		<?php $src='uploads/'.$user['image'] ?>
		<img src="<?php echo $src ?>" alt="<?php echo $_SESSION['image']?>" style="width:150px;height:150px;"><br><br>
		<label>ID: <?php echo $user['id'] ?></label><br><br>
		<label>First Name: <?php echo $user['firstname'] ?></label><br><br>
		<label>Last Name: <?php echo $user['lastname'] ?></label><br><br>
		<label>Username: <?php echo $user['username'] ?></label><br><br>
		<label>Email: <?php echo $user['email'] ?></label><br><br>
		<label>Account Type: <?php echo $user['type'] ?></label><br><br>
		<input type="submit" name="back" value="BACK">
		
	</fieldset>
</form>


</body>
</html>