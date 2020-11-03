<!DOCTYPE html>
<html>
<head>
	<title>Public Home</title>
</head>
<body>
<?php include('header1.php');?>
<?php include('footer.php');?>

<form style="margin-left: 100px" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<fieldset style="width: 300px">
		 <legend> <b> LOGIN </b> </legend> 

		<label for="name">Name</label>
		<input type="text" name="name" value="<?php echo $name;?>" > <span class="error"> <?php echo $nameErr;?></span> <br><br>
		<hr>
		<fieldset style="width: 300px">
		 <legend> <b> Gender </b> </legend>


	</fieldset>
</form>


</body>
</html>