<?php
	$user_id = $_GET["id_user"];
	$product_id = $_GET["id_product"];
	$state = $_GET["state"];
	$purchases = $_GET["purchase"];
	$servername = "localhost";
	$usernamesql = "root";
	$passwordsql = "tl280790";
	$dbname = "saleproject";
	
	
	
	$conn = new mysqli($servername, $usernamesql, $passwordsql, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
		
			if ($state==0) {
				$sql = "INSERT INTO likes (product_id, user_id) VALUES ('$product_id','$user_id')";
				$result= $conn->query($sql);
				$state=1;
				$likeddislike = '<span><button id="dislike"  onclick="return loadDoc('.$user_id.','.$product_id.','.$state.','.$purchases.')"><b> LIKED  </b></button> </span>';
			}
			else {
				$sql = "DELETE FROM likes WHERE product_id='$product_id' AND user_id='$user_id'";
				$result= $conn->query($sql);
				$state=0;
				$likeddislike = '<span><button id="like"  onclick="return loadDoc('.$user_id.','.$product_id.','.$state.','.$purchases.')"><b> LIKE  </b></button> </span>';
			}
			
			$nextsql = "SELECT product_id, user_id FROM likes WHERE product_id = '$product_id'";
			$nextresult= $conn->query($nextsql);
			$likes = $nextresult->num_rows;
			
			
			
				echo '
						<br/>
						<span style="font-size:14px">'.$likes.' likes</span> <br/>
						<span style="font-size:14px">'.$purchases.' purchases</span> <br/>
						<br/>
						'.$likeddislike.'
						<span style="margin-left:10px"><a id="buy" href="confirm.php?id_product='.$product_id.'"><b>    BUY </b></a> </span>';
		$conn->close();
	
?>
