<?php
require('db.php');

date_default_timezone_set('Asia/Jakarta');
$user_id= (int) $_GET['id_active'];
$productname = $_POST['prod_name'];
$desc = $_POST['desc_box'];
$price = $_POST['price_box'];
$dateadded=date("Y-m-d");
$timeadded=date("h:i:s");

if ($result->num_rows> 0) {
		while ($row = $result->fetch_assoc()){
		}
}
//$tempNamePhoto= $_FILES["imgcatch"]["tmp_name"];
//$target_dir= "img/";
//$target_file = $target_dir . basename ($_FILES["imgcatch"]["name"]);
$sql = "INSERT INTO catalogue
		(productname,productdesc,price,dateadded,timeadded)
		VALUES ('$productname','$desc','$price','$dateadded','$timeadded')";
//move_uploaded_file($_FILES["imgcatch"]["tmp_name"],$target_file);
$result = $conn->query($sql);
$conn->close();
header("Location:your_product.php?id_active='.$user_id.'");
?>