<?php
$servername = "localhost";
$usernamesql = "root";
$passwordsql = "tl280790";
$dbname = "saleproject";


$conn = new mysqli($servername, $usernamesql, $passwordsql, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
//$user_id='1';
$user_id=$_GET["id_active"];
$sql = "SELECT username FROM userdata WHERE user_id = '$user_id'";
$result = $conn->query($sql); 

$result = $conn->query($sql); 
$row = $result->fetch_assoc();
$name = $row["username"];



$header = <<<HTML
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/style.css">
		<title>
			Sale Project
		</title>
	</head>
	
	<body>
		<div class="container">
			<header>
				<h1 class="webtitle"> <span id="sale">Sale</span><span id="project">Project</span></h1>
				<div id="greeting">Hi, $name!</div>
				<div id="logout"><a href="login.php" ><b>logout</b></a></div>
			</header>
			<nav class="nav-bar">
				<div id="catalog"><a href="catalog.php?id_active=$user_id">Catalog</a></div>
				<div id="yourproduct"><a href="your_product.php?id_active=$user_id">Your Product</a></div>
				<div id="addproduct"><a href="add_product.php?id_active=$user_id">Add Product</a></div>
				<div id="sales"><a href="sales.php?id_active=$user_id">Sales</a></div>
				<div id="purchases"><a href="purchases.php?id_active=$user_id">Purchases</a></div>
			</nav>
HTML;
$footer = <<<HTML
		
		</div>
	</body>
</html>
HTML;


?>

