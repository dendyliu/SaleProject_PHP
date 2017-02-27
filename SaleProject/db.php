<?php
	$conn = new mysqli('localhost', 'root', '', 'tesfix');
	if ($conn->connect_error){
	    die("Database Connection Failed" . $conn->connect_error);
	}
?>