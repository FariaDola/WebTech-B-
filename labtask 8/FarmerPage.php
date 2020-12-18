<?php 
 
	require_once 'controller/functions.php';
	session_start();
	if(isset($_SESSION["id"]))
	{
		$user=fetch_user($_SESSION["id"]);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGGED in as <?php echo $_SESSION['userName'] ?></title>
</head>
<body>
	<?php include('view/outlay.php'); ?>
	<?php if ($_GET['message']=='welcome'): ?>
		<div>
			<?php if (isset($_SESSION["id"])) : ?>
				<h1 class="Welcome" style="font-size: 40px">Welcome <?php echo $user['firstname']?> <?php echo $user['lastname']?></h1>
				<p class="Welcome" style="font-size: 20px"> Surf through your recent orders and products from the navigation bar above</p> 
			<?php else:?>
				<?php header('Location: FarmerLoginPage.php');?>
			<?php endif; ?>
		</div>
	<?php endif ?>

</body>
</html>