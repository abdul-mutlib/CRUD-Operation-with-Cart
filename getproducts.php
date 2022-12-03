<?php
include_once("include/conn.php");
if($_REQUEST['productid']) {
	$sql = "SELECT product_id, product_name, product_sale_price FROM add_products 
WHERE product_id='".$_REQUEST['product_id']."'";
	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));	
	$data = array();
	while( $rows = mysqli_fetch_assoc($resultset) ) {
		$data = $rows;
	}
	echo json_encode($data);
} else {
	echo 0;	
}
?>