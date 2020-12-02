<?php

require_once 'model.php';

function insertuser($data)
{
	insertdata($data);
}
function fetchbyusername($username)
{
	return fetchusername($username);
}
function fetchbyid($id)
{
	return fetchid($id);
}
function updateuserwithimage($data)
{
	updatewithimage($data);
}
function updateuser($data)
{
	update($data);
}
function update_password($data)
{
	updatepassword($data);
}
	
?>