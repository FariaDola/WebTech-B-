<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <form action="controller/createproduct.php" method="POST" enctype="multipart/form-data">

  <fieldset style="width: 300px">
     <legend> <b> Add Product </b> </legend>

  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="buyingPrice">Buying Price:</label><br>
  <input type="text" id="buyingprice" name="buyingprice"><br>
  <label for="sellingprice">Selling Price:</label><br>
  <input type="text" id="sellingprice" name="sellingprice"><br>

  <hr>

  <input type="checkbox" id="display" name="display" value="1">
  <label for="display"> Display </label><br>

  <hr>

  <input type="submit" name = "createproduct" value="SAVE">
</form> 

</body>
</html>
