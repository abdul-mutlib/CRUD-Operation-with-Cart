<?php 
  include("include/conn.php");
 
   $sql = "SELECT * FROM add_products WHERE product_id='".$_POST['id']."'";
   $query = mysqli_query($conn,$sql);
   while($row = mysqli_fetch_assoc($query))
   {
         $data = $row;
   }
    echo json_encode($data);
 ?>