
<?php
require ('db.php');
$found1 = true;
$found2 = true;
$passwordcheck=true;
if ($_SERVER['REQUEST_METHOD']=='POST'){ 
	$emailorusername = $_POST["EmailorUsername"];
	$password = $_POST["password"];
	$passwordcheck = false;
	$isValidated = true;
	
	$emailErr = "";
	if (!filter_var($emailorusername, FILTER_VALIDATE_EMAIL)) {
		$emailErr = "Invalid email format";
	}
	$pass = "";
    if ($emailErr=="Invalid email format") {
		$found1=false;
		$sql = "SELECT username, password FROM userdata";
		$result = $conn->query($sql);
		$pass = "";
		if ($result->num_rows > 0) {
			while(($row = $result->fetch_assoc())&&($found1==false)) {
				if ($emailorusername==$row["username"]) {
					$pass = $row["password"];
					$found1=true;
				}
			}
			if ($found1==false) {
				$isValidated = false;
			}
			else {
				if ($password==$pass) {
					$passwordcheck = true;
				}
				else {
					$passwordcheck = false;
					$isValidated = false;
				}
			}
		}
		else {
			$isValidated = false;
		}
	}
	else {
		$found2=false;
		$sql = "SELECT email, password FROM userdata";
		$result = $conn->query($sql);
		
		$pass = "";
		if ($result->num_rows > 0) {
			while(($row = $result->fetch_assoc())&&($found2==false)) {
				if ($emailorusername==$row["email"]) {
					$pass = $row["password"];
					$found2=true;
				}
			}
			
		}
		else {
			$isValidated = false;
		}
		if ($found2==false) {
			$isValidated = false;
		}
		else {
			if ($password==$pass) {
				$passwordcheck=true;
			}
			else {
				$passwordcheck=false;
				$isValidated = false;
			}
		}
	}
	
    
	
	if($isValidated==true) {
		if ($emailErr=="Invalid email format") {
			$sql = "SELECT user_id FROM userdata WHERE username='$emailorusername'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$user_id = $row["user_id"]; 
		}
		else {
			$sql = "SELECT user_id FROM userdata WHERE email='$emailorusername'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$user_id = $row["user_id"]; 
		}	
		header("Location: catalog.php?id_active=$user_id");
		$conn->close();
	}
}
		
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/login.css">
		<script src="login.js"></script>
		<title>
			Sale Project
		</title>
	</head>
	
	<body>
		<div class="container">
			<h1 class="webtitle"> <span id="sale">Sale</span><span id="project">Project</span></h1>
			<br/>
			<span id="PleaseLogin" >Please login</span>
			<hr></hr>
			<br/>
			<form id="formlogin" name="formlogin" action="" onsubmit="return validateForm()" method="post">	
				<label for="EorU">Email or Username</label>
				<input type="text" id="EorU" name="EmailorUsername" onblur="return validateNameorEmail()">
				<span id="login1" style="font-family:Calibri;color:red"></span>
				<?php
					if ($found1==false) {
						echo '<p style="font-family:Calibri;color:red">Username is not found</p>';;
					}
					else if ($found2==false) {
						echo '<p style="font-family:Calibri;color:red">Email address is not found</p>';
					}
				?>
				<br/>
				<br/>
				<label for="pass">Password</label>
				<input type="password" id="pass" name="password" onblur="return validatePassword()">
				<span id="login2" style="font-family:Calibri;color:red"></span>
				<?php
					if ($passwordcheck==false) {
						echo '<p style="font-family:Calibri;color:red">Wrong password</p>';
					}
				?>
				<br/>
				<br/>
				<br/>
				<input type="submit" id="login" value="LOGIN">
			</form>	
			<br>
			<br>
			<p id="dont">Don't have an account yet? Register <span id="here"><a href="register.php">here</a></span></p>
		</div>
</body>


</html>
