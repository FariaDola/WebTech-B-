<?php  
require_once '../model.php';


if (isset($_POST['createproduct'])) {
	$data['name'] = $_POST['name'];
	$data['buyingprice'] = $_POST['buyingprice'];
	$data['sellingprice'] = $_POST['sellingprice'];
	if(isset($_POST['display']))
	{$data['display'] = $_POST['display'];}
	else{$data['display'] = '0';}



  if (addProduct($data)) {
  	echo 'Successfully added!!';
  }
} else {
	echo 'You are not allowed to access this page.';
}

?>