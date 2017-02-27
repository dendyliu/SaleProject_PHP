<?php
	require('db.php');
	require('layout.php');
	echo $header;
	echo $menu;
	echo
	'<div>
		<h1><span id="asking">Here are your sales</span></h1>
		<hr></hr>
		<br/><br/>
		<ul class="list-product">';

	$sales = "SELECT * FROM purchase, userdata WHERE (userdata.user_id = '$user_id' AND 
		purchase.seller = userdata.username) ORDER BY purchase.purchase_id DESC";
	$resultsales = mysqli_query($conn, $sales);


	if (mysqli_num_rows($resultsales) > 0) {
		while ($row = mysqli_fetch_assoc($resultsales)){
	    $productname = $row["product_name"];
	    $price = $row["product_price"];
	    $quantity = $row["quantity"];
	    $totalprice = $price * $quantity;
	    $buyer = $row["buyer"];
	    $datebought= $row["datebought"];
	    $timebought = $row["timebought"];
	    $consignee = $row["consignee"];
	    $fulladdress = $row["fulladdress"];
	    $postalcode = $row["postalcode"];
	    $imagepath = $row["image"];
	    $phonenumber = $row["newphonenumber"];

		echo
		'<li>
				<span id="date">
					<b>'.date('l, j F Y', strtotime($datebought)).'</b>
					<br/>
						at '.date("H:i", strtotime($timebought)).'
					<hr></hr>
				</span>
				<div class="item-list-product">
					<div style="position:absolute">
							<a href="'.$imagepath.'"><img class="img-item" src="'.$imagepath.'"></img></a>
					</div>
					<div id="product-info" style="width:250px">
						<span><b>'.$productname.'</b></span> <br/>
						<span>IDR '.number_format($totalprice, 0, ',','.').'</span> <br/>
						<span>'.$quantity.' pcs</span><br/>
						<span>@IDR '.number_format($price, 0, ',','.').'</span>
					</div>
					<div id="eddel" style="font-size:12px;left:380px;width:220px">
						<span>Delivery to <b>'.$consignee.'</b> </span> <br/>
						<span>'.$fulladdress.'</span> <br/>
						<span>'.$postalcode.'</span><br/>
						<span>'.$phonenumber.'</span>
					</div>
				</div>
					<span style="margin-left:120px;font-size:12px">bought by <b>'.$buyer.'</b></span>
			</li>
			<br>';
		}
	} else {
		echo '<b>You have not sold any product.<b>';
	}

	echo
		'</ul>
	</div>';
	echo $footer;
?>