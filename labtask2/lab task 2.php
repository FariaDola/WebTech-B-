<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $dobErr = $genderErr = $websiteErr = "";
$name = $email = $dob = $gender = $website = "";

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

  if (empty($_POST["dob"])) {
    $dobErr = "Can not be empty";
  } else {
    $dob = test_input($_POST["dob"]);
  
    if (!filter_var($dob, FILTER_VALIDATE_dob)) {
      $dobErr = "must be valid numbers";
    }
  }

  if (!isset($_POST["gender"])) {
    $genderErr = "one option must be selected";
 
}


if (!isset($_POST["degree"])) {
    $degreeErr = "atleast two options must be selected";
}

    
  }

  
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form style="margin-left: 100px" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">


	<fieldset style="width: 300px">
		 <legend> <b> Name </b> </legend> 
		<input type="text" name="name" value="<?php echo $name;?>" > <span class="error">* <?php echo $nameErr;?></span> <br><br>
		<hr>

<input type="submit">

</fieldset><br><br>



<form style="margin-left: 100px" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">


	<fieldset style="width: 300px">
		 <legend> <b> EMAIL </b> </legend> 
		<input type="text" name="email" value="<?php echo $email;?>" > <span class="error">* <?php echo $emailErr;?></span> <br><br>
		<hr>

<input type="submit">

</fieldset><br><br>


<fieldset style="width: 300px">
		 <legend> <b> Date Of Birth </b> </legend> 

		<input type="Date" id="" name=""
		value=""
       min="1995-01-01" max="2020-12-31">
       <span class="error">* <?php echo $dobErr;?></span>
		<br><br>

      
		<hr>
		<input type="submit">
	</fieldset><br><br>


	<fieldset style="width: 300px">
		 <legend> <b> Gender </b> </legend>

		 <input type="radio" id="male" name="gender" value="male">
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label>
  <input type="radio" id="other" name="gender" value="other">
  <label for="other">Other</label><br>
  <span class="error">* <?php echo $genderErr;?></span>

        <hr>
		<input type="submit"> 
  </fieldset><br><br>




<fieldset style="width: 300px">
     <legend> <b> Degree </b> </legend>

     <input type="checkbox" id="" name="" value="SSC">
  <label for="degree1"> SSC</label>
  <input type="checkbox" id="" name="" value="">
  <label for="degree2"> HSC</label>
  <input type="checkbox" id="" name="" value="">
  <label for="degree3"> BSc</label>
   <input type="checkbox" id="" name="" value="">
  <label for="degree4"> MSc</label>
  <br><Br>

  <span class="error">* <?php echo $degreeErr;?></span>
  

     <hr>
    <input type="submit">
  </fieldset><br>


<fieldset style="width: 300px">
     <legend> <b> Blood Group </b> </legend>


  <select name="" id="" multiple>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
     <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
     <option value="O+">O+</option>
    <option value="O-">O-</option>

  </select>


<hr>
    <input type="submit">


</form>

</body>
</html>