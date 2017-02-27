<?php
require('db.php');
$usernameExist=true;
$emailExist=true;
if ($_SERVER['REQUEST_METHOD']=='POST'){ 
	$fullname = $_POST["fullname"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirm = $_POST["confirmpassword"];
	$address = $_POST["fulladdress"];
	$postal = $_POST["postalcode"];
	$phone = $_POST["phonenumber"];
	
	$sql = "SELECT username FROM userdata WHERE username='$username'";
	$result = $conn->query($sql); 
	if ($result->num_rows > 0){
		$usernameExist=true;
	}
	else {
		$usernameExist=false;
	}
	
	$sql = "SELECT email FROM userdata WHERE email='$email'";
	$result = $conn->query($sql); 
	if ($result->num_rows > 0){
		$emailExist=true;
	}
	else {
		$emailExist=false;
	}
	
	if(($usernameExist==false)&&($emailExist==false)) {
		$sql = "INSERT INTO userdata (fullname, username, email, password, fulladdress, postalcode, phonenumber) VALUES ('$fullname', '$username', '$email', '$password', '$address', '$postal', '$phone')";
		$result  = $conn->query($sql);
		
		
		
		$sql = "SELECT user_id FROM userdata WHERE username='$username'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$user_id = $row["user_id"]; 
		header("Location: catalog.php?id_active=$user_id");
	}
	$conn->close();	
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/register.css">
		<script src="register.js"></script>
		<title>
			Sale Project
		</title>
	</head>
	
	<body>
		<div class="container">
			<h1 class="webtitle"> <span id="sale">Sale</span><span id="project">Project</span></h1>
			<br/>

		<span id="PleaseRegister">Please register</span>
		<hr>
		<br/>
		<form id="formregis"name="formregister" action="" onsubmit="return validateForm()" method="post">
			<label for="fname">Full Name</label>
			<input type="text" id="fname" name="fullname" onblur="return validateName()">
			<span id="register1" style="font-family:Calibri;color:red"></span>
			<br>
			<br>
			<label for="uname">Username</label>
			<input type="text" id="uname" name="username" onblur="return validateUName()"> 
			<span id="register2" style="font-family:Calibri;color:red"></span>
			<?php
			if ($_SERVER['REQUEST_METHOD']=='POST'){
				if ($usernameExist==true) {
					echo '<p style="font-family:Calibri;color:red">Username already exists</p>';
				}
			}
			?>
			<br>
			<br>
			<label for="email">Email</label>
			<input type="text" id="email" name="email" onblur="return (validateEmail() && validateEmail2())">
			<span id="register3" style="font-family:Calibri;color:red"></span>
			<?php
			if ($_SERVER['REQUEST_METHOD']=='POST'){
				if ($emailExist==true) {
					echo '<p style="font-family:Calibri;color:red">Email already exists</p>';
				}
			}
			?>
			<br>
			<br>
			<label for="pass">Password</label>
			<input type="password" id="pass" name="password" onblur="return (validatePassword() && validatePassAndConfirm())">
			<span id="register4" style="font-family:Calibri;color:red"></span>
			<br>
			<br/>
			<label for="confirm">Confirm Password</label>
			<input type="password" id="confirm" name="confirmpassword" onblur="return (validateConfirm() && validatePassAndConfirm())">
			<span id="register5" style="font-family:Calibri;color:red"></span>
			<br>
			<br/>
			<label for="faddress">Full Address</label>
			<textarea id="faddress" name="fulladdress" onblur="return validateAddress()"></textarea>
			<span id="register6" style="font-family:Calibri;color:red"></span>
			<br>
			<br>
			<label for="postal">Postal Code</label>
			<input type="text" id="postal" name="postalcode" onblur="return validatePostal()">
			<span id="register7" style="font-family:Calibri;color:red"></span>
			<br>
			<br>
			<label for="phone">Phone Number</label>
			<input type="text" id="phone" name="phonenumber" onblur="return validatePhone()">
			<span id="register8" style="font-family:Calibri;color:red"></span>
			<br>
			<br>
			<br>
			<input type="submit" id="register" value="REGISTER">
		</form>
		
			
		
		<br>
		<br>
		<p id="already">Already registered? Login  <span id="here"><a href="login.php">here</a></span></p>
		
	</div>
</body>	
	
</html>
