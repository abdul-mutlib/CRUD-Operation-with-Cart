<?php

	$conn = mysqli_connect("localhost","root","","pos") or die("Connection failed");

	if($_POST['type'] == ""){
		$sql = "SELECT * FROM orders";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['order_month']}'>{$row['order_month']}</option>";
		}
	}

	echo $str;
 ?>