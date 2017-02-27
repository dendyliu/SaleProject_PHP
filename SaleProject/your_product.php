<script src="your_product.js"> </script>
<?php
	require('layout.php');
	echo $header;

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "saleproject";

	    echo
		'<div>
		<h1><span id="asking">What are you going to sell today?</span></h1>
		<hr></hr>
		<br/><br/>
		<ul class="list-product">';

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$product = "SELECT * FROM catalogue, userdata WHERE (userdata.user_id = '$user_id' AND catalogue.username = userdata.username) ORDER BY catalogue.product_id DESC";
	$resultproduct = mysqli_query($conn, $product);


	if (mysqli_num_rows($resultproduct) > 0) {
		while ($row = mysqli_fetch_assoc($resultproduct)){
	    $productname = $row["productname"];
	    $product_id = $row["product_id"];
	    $price = $row["price"];
	    $productdesc = $row["productdesc"];
	    $dateadded = $row["dateadded"];
	    $timeadded = $row["timeadded"];
	    $like = "SELECT * from likes WHERE product_id='$product_id'";
	    $resultlike = mysqli_query($conn, $like);
	    $likes = mysqli_num_rows($resultlike);
	    $purchases = $row["purchases"];
	    $imagepath = $row["imagepath"];

	    echo
			'<li>
				<span id="date">
					<b> '.date('l, j F Y', strtotime($dateadded)).'</b>
					<br/>
						at '.date("H:i", strtotime($timeadded)).'
					<hr></hr>
				</span>

				<div class="item-list-product">
					<div style="position:absolute">
							<a href="'.$imagepath.'"><img class="img-item" src="'.$imagepath.'"></img></a>
					</div>
					<div id="product-info">
						<span><b>'.$productname.'</b></span> <br/>
						<span>IDR '.number_format($price, 0, ',','.').'</span> <br/>
						<span style="font-size:12px;position:relative">'.$productdesc.'</span>
					</div>
					<div id="eddel">
						<br/>
						<span style="font-size:14px">'.$likes.' likes</span> <br/>
						<span style="font-size:14px">'.$purchases.' purchase</span> <br/>
						<br/>
						<span><a id="edit" href="edit_product.php?product_id=$product_id"><b> EDIT  </b></a> </span>
						<span style="margin-left:5px"><a onclick="validateDelete('.$user_id.')" id="delete" href="#"><b>DELETE </b></a> </span>
					</div>
				</div>	
			</li>
			<br>';
		}
	} else {
		echo '<b>You do not have any product.<b>';
	}
	echo
		'</ul>
	</div>';
	echo $footer;
?>