<?php
	if(isset($_SESSION["id"]))
	{
		$user=fetch_user($_SESSION["id"]);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		a:link
		{
			color: #558000;
			text-decoration: none;
		}
		a:visited 
		{
		  	color: #558000;
		  	text-decoration: none;
		}
		a:hover 
		{
		  	color:white;
		  	text-decoration: none;
		}
		.color
		{
			color: #558000 
		}
		.h2
		{
			font-family: Arial, Helvetica, sans-serif;
			text-align: left;

		}
		.padding
		{
			padding-left: 100%
		}
		.header 
		{
			position: fixed;
			top: 0;
			background-color:#ace600;
			color: white;
			padding: 0.2%; 
		}
		.shadow
		{
			text-shadow: 0 0 8px #e60000;
		}
		.navlink
		{
			font-family: Arial, Helvetica, sans-serif;
			column-width: 100%
		}
	</style>
</head>
<body>

<header class="header">

	<table >
		<tr>
			<th>
				<img src="logo/logo.png" alt="Farm food logo" width="80px" height="80px" >
			</th>
			<th style="width: 20%">
				<h2 class="h2 shadow">FARM FOOD</h2>
			</th>
			<th style="width: 100%; text-align: right;" class="h2" >
			<?php if(isset($_SESSION["id"])) : ?>
				<a href="FarmerPage.php?message=welcome" style="width: 100%" >HOME</a> |
				<span class="color">LOGGED IN AS</span> <a href="FarmerPage.php?message=welcome" style="width: 100%" ><?php echo $user["username"];?></a> |
				<span class="color"><a href="FarmerPage.php?message=welcome" style="width: 100%" >ORDERS</a></span>|
				<span class="color"><a href="" style="width: 100%" >PRODUCTS</a></span>|
				<a href="controller/logout.php" style="width: 100%" >LOG OUT</a>
			<?php else : ?>
				<a href="home_page.php" style="width: 100%" >HOME</a> |
				<a href="login_page.php" style="width: 100%" >LOGIN</a> |
				<a href="FarmerSignupPage.php" style="width: 100%" >SIGN UP</a>
			<?php endif; ?>

			</th>

		</tr>
	</table>
</header>

</body>
</html>