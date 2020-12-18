<?php 

require_once 'model.php';

function test_input($data) {
	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
}
function add_user($data)
{
	insertdata($data);
}
function fetch_user_byusername($username)
{
	return fetchuserbyusername($username);
}
function fetch_user($id)
{
	return fetchuser($id);
}
function edit_user_withimage($data)
{
	alterdatawithimage($data);
}
function edit_user($data)
{
	alterdata($data);
}
function update_password($data)
{
	updatepassword($data);
}

?>