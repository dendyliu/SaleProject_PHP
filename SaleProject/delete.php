<?php
	$id = $_GET['id_active'];
	$prod_id = $_GET['product_id'];

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "saleproject";

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}


	$userid = "Select * from userdata where user_id = '$id'";
	$resultuser = mysqli_query($conn, $userid);
	$row = mysqli_fetch_assoc($resultuser);
	$user = $row["username"];
	$delete = "DELETE FROM catalogue WHERE (catalogue.username = '$user' && catalogue.product_id = '$product_id')";
	$resultdelete = mysqli_query($conn, $delete);

	header("Location: your_product.php?id_active=$id");
?>