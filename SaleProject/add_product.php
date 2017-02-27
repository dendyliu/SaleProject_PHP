<?php

$menu= <<<HTML
	<div>
		<h1><span id="asking">Please add your product here</span></h1>
			<hr></hr>
			<br/>
		<form id="add_product_form" action="" method="get">
			<label for="name"> Name </label><br/>
			<input type="text" name="name"><br/><br/>
			<label for="desc"> Description(max 200 chars)<br/>
			<input style="height:75px" type="text" name="desc"><br/><br/>
			<label for="price"> Price (IDR) <br/>
			<input type="text" name="price"><br/><br/>
			Photo <br/>
			<input type="button" value="Choose file">
			<br/>
			<input type="submit" value="ADD" style="margin-left:377px">
			<input type="submit" value="CANCEL" style="margin-left:20px">
		</form>
	</div>
HTML;
	require('layout.php');
	//require('your_product.php');
	echo $header;
	echo $menu;
	echo $footer;
	
?>