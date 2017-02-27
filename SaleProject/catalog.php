<script>
	function loadDoc(userid,productid,state,purchase) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("eddel"+productid).innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "likes.php?id_user="+userid+"&id_product="+productid+"&state="+state+"&purchase="+purchase, true);
	xhttp.send();
} 
</script>
<?php
$user_id = $_GET["id_active"];
require('layout.php');
echo $header;
	$servername = "localhost";
	$usernamesql = "root";
	$passwordsql = "tl280790";
	$dbname = "saleproject";
	
	
	
	$conn = new mysqli($servername, $usernamesql, $passwordsql, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	
	echo '<div>
		<h1><span id="asking">What are you going to buy today?</span></h1>
		<hr></hr>
		<form method="post">
			<input id="search_bar" name="searchbox" type="text" placeholder=" Search catalog ...">
			<input id="search_button" type="submit" value="GO">
			<br/><br/>
			<span style="font-size:12px">by 
			<input type="radio" name="radiobutton" value="product" style="margin-left:20px;height:10px" checked>product <br/>
			<input type="radio" name="radiobutton" value="store" style="margin-left:37px;height:10px">store <br/>
			</span>
		</form>
		<br/>
		 ';
		$sql = "SELECT * FROM catalogue ORDER BY product_id DESC"; 
		
		if ($_SERVER['REQUEST_METHOD']=='POST'){
			$searchbox = $_POST["searchbox"];
			$filter = $_POST["radiobutton"];
			if ($filter=="product") {
				$sql = "SELECT * FROM catalogue WHERE productname LIKE '%$searchbox%' ORDER BY product_id DESC";
			}
			else if ($filter=="store") {
				$sql = "SELECT * FROM catalogue WHERE username LIKE '%$searchbox%' ORDER BY product_id DESC";
			}
			else {
				$sql = "SELECT * FROM catalogue ORDER BY product_id DESC"; 
			}
		}
		
		
		//$sql = "SELECT * FROM catalogue";
		$result = $conn->query($sql); 
		if ($result->num_rows > 0){
			while($row=$result->fetch_assoc()) {
				$product_id = $row["product_id"];
				$productname = $row["productname"];
				$price = $row["price"];
				$productdesc = $row["productdesc"];
				$username = $row["username"];
				$dateadded =date_create($row["dateadded"]);
				$timeadded = date_create($row["timeadded"]);
				$nextsql = "SELECT product_id, user_id FROM likes WHERE product_id = '$product_id'";
				$nextresult= $conn->query($nextsql);
				$likes = $nextresult->num_rows;
				$purchases = $row["purchases"];
				$imagepath = $row["imagepath"];
				$asql = "SELECT * FROM likes WHERE product_id = '$product_id' AND user_id='$user_id'";
				$result2 = $conn->query($asql); 
				if($result2->num_rows == 0){
					$state = 0;
					$likeddislike = '<span><button id="like"  onclick="return loadDoc('.$user_id.','.$product_id.','.$state.','.$purchases.')"><b>LIKE</b></button> </span>';
				}
				else {
					$state = 1;
					$likeddislike = '<span><button id="dislike"  onclick="return loadDoc('.$user_id.','.$product_id.','.$state.','.$purchases.')"><b>LIKED</b></button> </span>';
				}
				echo '
				<ul class="list-product">
				<li>
				<span id="date"><b>'.$username.'</b></span><br/>	
				<span id="date">added this on '. date_format($dateadded, 'l\, d F Y').' at '.date_format($timeadded, 'H:i').' </span>
				<hr></hr>
				<div class="item-list-product">
					<div style="position:absolute">
							<a href='.$imagepath.'><img class="img-item" src='.$imagepath.'></img></a>
					</div>
					<div id="product-info">
						<span><b>'.$productname.'</b></span> <br/>
						<span> IDR '.number_format($price, 0, ',','.').'</span> <br/>
						<span style="font-size:12px;position:relative">'.$productdesc.'</span>
					</div>
					<div id="eddel'.$product_id.'" class="eddelclass">
						<br/>
						<span style="font-size:14px">'.$likes.' likes</span> <br/>
						<span style="font-size:14px">'.$purchases.' purchases</span> <br/>
						<br/>
						'.$likeddislike.'
						<span style="margin-left:10px"><a id="buy" href="confirm.php?id_product='.$product_id.'"><b>    BUY </b></a> </span>
					</div>
				</div>	
				</li><br>';
			}
		}
			
		echo '</ul>
	</div>';

	//require('your_product.php');
	
	echo $footer;
?>

