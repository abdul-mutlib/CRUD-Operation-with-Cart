<?php

	$conn = mysqli_connect("localhost","root","","pos") or die("Connection failed");

	if($_POST['type'] == ""){
		$sql = "SELECT * FROM add_products";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['product_id']}'>{$row['product_name']}</option>";
		}
	}else if($_POST['type'] == "SubCategory"){

		$sql = "SELECT * FROM add_products WHERE product_id = {$_POST['id']}";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['product_sale_price']}'>{$row['product_sale_price']}</option>";
		}
	}

	echo $str;
 ?>