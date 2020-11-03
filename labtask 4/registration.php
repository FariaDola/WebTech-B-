<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<style>
		.error{
			color: red;
		}
	</style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr =$UserNameErr= $emailErr = $passwordErr= $ConfirmPassword= $dobErr = $genderErr = $websiteErr = "";
$name = $email =$UserName= $password= $ConfirmPassword= $dob = $gender = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Can not be empty";
  } 
  else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-?!-. ]{2,}$/",$name)) {
      $nameErr = "contains atlest two words, must start with a letter";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Can not be empty";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "must be valid";
    }
  }

   if (empty($_POST["UserName"])) {
    $UserNameErr = "Can not be empty";
  } 
  else {
    $name = test_input($_POST["UserName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]{8,}$/",$UserName)) {
      $UserNameErr = "contains atleast 8 characters. Can contain digit";
    }
  }

  if (empty($_POST["password"])) {
    $UserNameErr = "Can not be empty";
  } 
  else {
    $name = test_input($_POST["password"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9]+{8,}$/",$password)) {
      $passwordErr = "contains atlest two words, must start with a letter";
    }
  }

  if (empty($_POST["ConfirmPassword"])) {
    $UserNameErr = "Can not be empty";
  } 
  else {
    $name = test_input($_POST["ConfirmPassword"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9]+{8,}$/",$ConfirmPassword)) {
      $ConfirmPasswordErr = "contains atlest two words, must start with a letter";
    }
  }




}

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<?php include('header1.php');?>
<?php include('footer.php');?>

<form style="margin-left: 100px" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<fieldset style="width: 300px">
		 <legend> <b> REGISTRATION </b> </legend> 

		<label for="name">Name</label>
		<input type="text" name="name" value="<?php echo $name;?>" > <span class="error"> <?php echo $nameErr;?></span> <br><br>
		<hr>

		<label for="email">Email</label>
		<input type="text" name="email" value="<?php echo $email;?>" > <span class="error"> <?php echo $emailErr;?></span> <br><br>
		<hr>

		<label for="username">UserName</label>
		<input type="text" name="UserName" value="<?php echo $UserName;?>" > <span class="error"> <?php echo $UserNameErr;?></span> <br><br>
		<hr>

		<label for="password">password</label>
		<input type="text" name="password" value="<?php echo $password;?>" > <span class="error"> <?php echo $password;?></span> <br><br>
		<hr>

		<label for="ConfirmPassword">ConfirmPassword</label>
		<input type="text" name="ConfirmPassword" value="<?php echo $ConfirmPassword;?>" > <span class="error"> <?php echo $ConfirmPassword;?></span> <br><br>
		<hr>

		<fieldset style="width: 300px">
		 <legend> <b> Gender </b> </legend>

		 <input type="radio" id="male" name="gender" value="male">
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label>
  <input type="radio" id="other" name="gender" value="other">
  <label for="other">Other</label><br>
  <span class="error"> <?php echo $genderErr;?></span>

        <hr>

        <fieldset style="width: 300px">
		 <legend> <b> Date Of Birth </b> </legend> 

		<input type="Date" id="" name=""
		value=""
       min="1995-01-01" max="2020-12-31">
       <span class="error"> <?php echo $dobErr;?></span>
		<br><br>

      <hr>


<input type="submit">
<input type="reset">

</fieldset><br><br>

</form>


</body>
</html>