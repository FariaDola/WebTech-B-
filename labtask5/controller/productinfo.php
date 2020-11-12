<?php 

require_once 'model.php';

function fetchallproducts(){
	return showAllProducts();

}
function fetchproduct($id){
	return showProduct($id);

}
