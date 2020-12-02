<?php 
	
	require_once 'controller/functions.php';
	$src="";
	session_start();
	$user=fetchbyid($_SESSION["id"]);
?>
<!DOCTYPE html>
<html>
<head>
	<title> public home</title>
	<style>
		 table,tr,td
		{
			border:1px solid;
			border-collapse: collapse;
			font-size: 50px;
			padding: 10px;
		}
	</style>
</head>
<body>

<table> 

	<tr>
		<td><a href="">Dashboard</a></td>
		<?php $src='uploads/'.$user['image'] ?>
		<td rowspan="5"> <img src="<?php echo $src ?>" alt="<?php echo $user['image']?>" style="width:300px;height:300px;" ><br> WELCOME <?php echo $user['firstname']?></td>
	</tr>
	<tr>
		<td><a href="profilepage.php">View Profile</a></td>
	</tr>
	<tr>
		<td><a href="editprofilepage.php">Edit Profile</a></td>
	</tr>
	<tr>
		<td><a href="passwordchangepage.php?update=">Change Password</a></td>
	</tr>
	<tr>
		<td><a href="controller/logout.php">Logout</a></td>
	</tr>

</table>


</body>
</html>