<script src="confirm.js"></script>
<?php
	require('db.php');
	require('layout.php');
	echo $header; 
	echo $menu;
	$id = (int) $_GET['id_active'];
	$product_id = (int) $_GET['product_id'];

	$biodata = "SELECT * FROM userdata WHERE user_id = '$user_id'";
	$resultbiodata = mysqli_query($conn, $biodata);

	if (mysqli_num_rows($resultbiodata) > 0) {
		$row = mysqli_fetch_assoc($resultbiodata);
		$buyer = $row["username"];
		$name = $row["fullname"];
		$fulladdress = $row["fulladdress"];
		$postalcode = $row["postalcode"];
		$phonenumber = $row["phonenumber"];
	}

	$product = "SELECT * FROM catalogue WHERE product_id = '$product_id'";
	$resultproduct = mysqli_query($conn, $product);

	if (mysqli_num_rows($resultproduct) > 0) {
		$row2 = mysqli_fetch_assoc($resultproduct);
		$productname = $row2["productname"];
		$price = $row2["price"];
		$seller = $row2["username"];
		$image = $row2["imagepath"];
		$countpurchase = $row2["purchases"];
	}

	$total = $price;


	echo
 		'<h1><span id="asking">Please confirm your purchase </span></h1>
 		<hr></hr>
 		<br>
 		<form name="confirmform" id="confirmform" action="" method="post">
 			<label for="product">Product<span style="margin-left: 30px;">:</label>
 			'.$productname.'<br>
			<label for="price">Price<span style="margin-left: 46px;">:</label>
			IDR '.number_format($price, 0, ',','.').'<br>
			<label for="quantity">Quantity<span style="margin-left:26px;">:</label>
			<input id="quantity" onblur="return validateQuantity()" onkeydown="return countTotal('.$price.')" onkeyup="return countTotal('.$price.')" style="width:25px;" type="text" name="quantity" value="1" onkeypress="return validateNumber(event)">
			pcs<br>
			<div id="cekquantity" style="margin-left:84px;"></div>
			<label for="totalprice">Total Price<span style="margin-left: 13px;">:</label>
			<label id="totalprice">IDR '.number_format($total, 0, ',','.').'</label><br>
			<label >Delivery to<span style="margin-left: 12.5px;">:</label><br><br>
			<label class="smallerlabel" for="consignee" >Consignee</label><br>
			<input id="consignee" type="text" name="consignee" value="'.$name.'" onblur="return validateConsignee()"><br>
			<div id="cekconsignee"></div>

			<label class="smallerlabel" for="address">Full Adress</label><br>
			<textarea id="fulladdress" type="text" name="fulladdress" onblur="return validateAddress()">'.$fulladdress.'</textarea><br>
			<div id="cekaddress"></div>
			<label class="smallerlabel" for="postalcode">Postal Code</label><br>
			<input id="postalcode" type="text" name="postalcode" value="'.$postalcode.'" onblur="return validatePostal()"><br>
			<div id="cekpostal"></div>
			<label class="smallerlabel" for="phonenumber">Phone Number</label><br>
			<input id="phonenumber" type="text" name="phonenumber" value="'.$phonenumber.'" onblur="return validatePhone()"><br>
			<div id="cekphone"></div>
			<label class="smallerlabel" for="ccnumber">12 Digits Credit Card Number</label><br>
			<input id="ccnumber" type="text" name="creditcard" onkeypress="return validateCardNumber(event)" onblur="return validateCC()"><br>
			<div id="cekcc"></div>
			<label class="smallerlabel" for="verification">3 Digits Card Verification Value</label><br>
			<input id="ver" type="text" name="verification" onkeypress="return validateVerification(event)" onblur="return validateVer()"><br>
			<div id="cekver"></div>
			<input type="submit" onclick="return confirmData()" value="CONFIRM" style=" margin-left:376px;" href="">
			<input type="reset" value="CANCEL" style="margin-left:20px;">
 		</form>';


	if ($_SERVER['REQUEST_METHOD']=='POST'){ 
		$quantity = $_POST["quantity"];
		$consignee = $_POST["consignee"];
		$newaddress = $_POST["fulladdress"];
		$newpostal = $_POST["postalcode"];
		$newphone = $_POST["phonenumber"];
		$creditcardnum = $_POST["creditcard"];
		$vernum = $_POST["verification"];
		$int = (int)$quantity;
		$insert = "INSERT INTO purchase (product_name, product_price, seller, buyer, image, quantity, consignee,
		 fulladdress, postalcode, newphonenumber, creditcard, verification, datebought, timebought) VALUES (
		 '$productname', '$price', '$seller', '$buyer', '$image', '$int', '$consignee', '$newaddress', '$newpostal',
		 '$newphone', '$creditcardnum', '$vernum', curdate(), curtime())";
		$resultinsert = mysqli_query($conn, $insert);
		if(!$resultinsert) echo mysqli_error($conn);
		$countnow = $countpurchase + $int;
		$addpurchase ="UPDATE catalogue SET purchases='$countnow' WHERE product_id='$product_id'";
		$resultadd = mysqli_query($conn, $addpurchase);
		if(!$resultadd) echo mysqli_error($conn);
		header("Location: purchases.php?id_active=$id");
	}

	mysqli_close($conn);
 		
 		echo'<br/>
 		</div>
 		</div>
 	</body>
 </html>';

 ?>

