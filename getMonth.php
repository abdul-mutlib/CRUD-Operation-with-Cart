<?php
include_once('include/conn.php');
if($_REQUEST['empid']) {
	$sql = "SELECT invoice_no, order_month,order_quantity,order_amount  FROM orders WHERE invoice_no='".$_REQUEST['empid']."'";
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