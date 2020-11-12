<?php  
require_once 'controller/productinfo.php';
$products = fetchallproducts();
$profit='0';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table border="2px solid " style="border-collapse: collapse;" >
	<thead>
		<tr>
			<th><b>Name</th>
			<th>Profit</th>
			<th colspan="2"></b></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($products as $i => $product): ?>
			<tr>
				<?php $profit=$product['selling price']-$product['buying price']?>
				<td><?php echo $product['Name'] ?></td>
				<td><?php echo $profit?></td>
				<td><a href="editProduct.php?id=<?php echo $product['id']?>">edit</a></td>
				<td><a href="controller/deleteStudent.php?id=<?php echo $product['id'] ?>">delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>