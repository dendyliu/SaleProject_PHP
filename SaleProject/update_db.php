<?php
require('db.php');


session_start();
$prodid=$_SESSION['product_id'];
$user_id=$_SESSION['id_active'];
$productname=$_POST['prod_name'];
$desc=$_POST['desc_box'];
$price=$_POST['price_box'];
$asd = "dasdasd";

$sql = "UPDATE catalogue
		SET productname= '$productname'
			,price = '$price'
			,productdesc = '$desc'
		WHERE product_id =$prodid";
$result = $conn->query($sql);
$conn->close();
header("Location:your_product.php?id_active='.$user_id.'");	
?>