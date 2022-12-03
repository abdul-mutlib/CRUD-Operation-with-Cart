<?php 
   include("include/conn.php");
    include("include/top.php");  
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>POS Page</title>
      <style>
        .result{
         color:red;
        }
        td
        {
          text-align:center;
        }

    .col-md-7  mt-4{
        height: 350px;
        width: 500px;
overflow-x: hidden;
margin-right: 10px;
}


      </style>
      
   </head>
   <body>
 <form action="" method="POST">
      <section class="mt-2">
         <div class="container-fluid">
         <h4 class="text-center" style="color:green"> <a href="index.php" class="btn btn-outline-warning"><h4>ShopNow </h4><br><h5> Hexa-Tech IT Solutions Multan</h5> </a></h4>
         
         <div class="row">
            <div class="col-md-5  mt-2 ">
                <table class="table" style="background-color:#E7E3E3;">

               
                  <thead>
                      <?php

                     $invoice_sum= 1;
                     $select = "SELECT * FROM orders";
                     $run = mysqli_query($conn,$select);


                     while ($row = mysqli_fetch_array($run)) {

                       $invoice_no = $row['order_id'];
                    }
                     
                      
                     $invoice_sum += $invoice_no;
                 
                     ?>
                     <div>
                      <td> Invoice No: </td><td><input type="text" name="invoice_no" class="form-control" value="<?php echo $invoice_sum;?>"> </td>
                    </div>
                     <tr>

                       
                        <th>Product Name</th>
                        <th>Price</th>
                         <th>Quantity</th>
                     </tr>
                  </thead>

                  <tbody>
                   
                     <tr>

                        <div class="form-group" >

                        
                        <td  style="width:40%" >
                           <div class="form-group">
                                   
                                   <select class="form-control" name="product_name" id="product_name">
                                       <option selected value="">Select Product</option>
                                          
                               </select>   
                                 
                           </div>

                        </td>

                      
                       <td>
                        <div class="form-group"  style="width:70%">
                    
                                <select  class="form-control" name="product_sale_price" id="product_sale_price">
                                      
                                       <option selected value=""></option>
                                      
                               </select>

                             
 </div>
                        </td>
                        <td  style="width:20%">
                          <input type="number" id="quantity" name="product_quantity" min="0" value="1" class="form-control"  >
                        </td>

                        
                     </tr>
                     <div>
                         
                        <td>
                          <input type="submit" name="addcart" value="Add To Cart" class="btn btn-primary">
                        </td>
                     </div>
                  </tbody>

               </table>
                
               <div role="alert" id="errorMsg" class="mt-5" >
                 <!-- Error msg  -->
              </div>
           </form>
<form action="" method="POST" name="invoice" >



 <?php
// Create connection
include_once('include/conn.php');

if(isset($_POST['addcart']))
{
$invoice_no = $_POST['invoice_no'];
 $product_name= $_POST['product_name'];
$product_sale_price = $_POST['product_sale_price'];
 $product_quantity = $_POST['product_quantity'];
$cart_total = $product_sale_price * $product_quantity;

$insert = "INSERT INTO cart(invoice_no, product_name,product_sale_price,product_quantity,cart_total) VALUES ('$invoice_no','$product_name','$product_sale_price','$product_quantity', '$cart_total')";

$run_insert=mysqli_query($conn, $insert);

if($run_insert===TRUE){

                                    echo "<div class='alert alert-success' id='success-alert'>
   <button type='button' class='close' data-dismiss='alert'>x</button>
   <strong>Success!</strong>
   Product Added Successfuly into Cart
</div>";
                                 }
                                 else
                                 {
                                   echo "<div class='alert alert-danger'>Cart Not Added Successfuly</div>"; 
                                 }

 
}
?>

     </div>
 
            <div class="col-md-7  mt-4" style="background-color:#E7E3E3;">
               <div class="p-4">
                  <div class="text-center">
                     <h4>Invoice</h4>
                  </div>
                 
                  <div class="row">
                     
                     <?php
                 





                     $order_sum= 1;
                     $select = "SELECT * FROM orders";
                     $run = mysqli_query($conn,$select);

                     while ($row = mysqli_fetch_array($run)) {
                       $order_id = $row['order_id'];
                    }
                    $order_sum += $order_id;
                      
                     
                     ?>
                    
                           
                     <div>Date:<?php  $order_date= date("d-m-Y");
                     echo $order_date;
                     ?>
                  </div> &emsp; &emsp;

              <div>
                  <span class="mt-4" > Time : </span><span  class="mt-4" id="time"></span></div>
               
                  <div style="margin-left: 70%;">

                       Invoice No: <?php echo $order_sum;?>
                       
                     </div>
                  </div>
                     <br>

                  <div class="row">
                     </span>
                      <?php
     $conn = mysqli_connect('localhost', 'root', '', 'pos' );
     if (isset($_GET['del'])) {
       $del_id=$_GET['del'];
       $delete ="DELETE from cart where cart_id=$del_id";
       $run=mysqli_query($conn,$delete);
     }
     ?>
      
                     <table id="receipt_bill" class="table">
                        <thead>
                           <tr>
                              <th> ID.</th>
                              <th>Product Name</th>
                              <th>Quantity</th>
                              <th class="text-center">Price</th>
                              <th class="text-center">Total</th>
                              
                             
                           </tr>

                           <?php
      
      $conn = mysqli_connect('localhost', 'root', '', 'pos' );
      //include_once('generate.php');
     
  
            
      $select ="select * from cart where invoice_no='$order_sum'   ";

 $sid = 0;
            $id=1;
            $total_price=0;
            $total_quantity=0;
          $run = mysqli_query($conn,$select);
          while($row = mysqli_fetch_array($run)){


            $sid =$sid + $id;
          $cart_id = $row['cart_id'];
          $invoice_no = $row['invoice_no'];
          $product_name = $row['product_name'];
          $product_sale_price = $row['product_sale_price'];
          $product_quantity = $row['product_quantity'];
         $cart_total = $row['cart_total'];

         $total_quantity +=$product_quantity;
         $total_price +=$cart_total; 

            $select_product = "SELECT * FROM add_products WHERE product_id='$product_name'";       

                $run_product =mysqli_query($conn,$select_product);
                $row_product = mysqli_fetch_array($run_product);
                $product_name = $row_product['product_name']; 
 

         
      ?> 
     
                        <tr align="center">
                              <td> <?php echo $sid; ?> </td>
                              <td><?php echo $product_name; ?></td>
                              <td><?php echo $product_quantity; ?></td>
                              <td class="text-center"><?php echo $product_sale_price; ?></td>
                              <td class="text-center"><?php echo $cart_total; ?></td>
                               <td><a class="btn btn-danger" href="carts.php?del=<?php echo $cart_id; ?>">Delete</td>
                             
                           </tr>
                       <?php }  ?>
                        </thead>
                        <tbody id="new" >
                          
                        </tbody>
                        <tr>
                           <td> </td>
                         
                        </tr>
                        <tr>
                           <td></td>
                           <td class="text-left text-dark">
                              <h5><strong>Gross Total: </strong></h5>
                           </td>
                           <td class="text-center text-danger">
                              <h5 id="order_total_price"><strong><?php echo "$total_quantity";?> </strong></h5>
                               
                           </td> <td class="text-center text-danger">
                              
                               
                           </td>
                            <td class="text-center text-danger">
                              <h5 id="order_total_price"><strong><?php echo "$total_price";?> </strong></h5>
                               
                           </td>
                           <td> <div>
                            <select class="form-control" name="order_status" >
                                <option selected>Cash</option>
                                <option>Credit</option>
                                <option>C.O.D</option>
                            </select>
                        </div></td>
                        </tr>
                       
                     </table>
                     
                 
     <input type="submit" name="checkout" value="Checkout" class="btn btn-success">
                             
</form>  
                             

                  </div>
               </div>

            </div>

         </div>
      </section>

  
   </body>

</html>
 <?php
      
      $conn = mysqli_connect('localhost', 'root', '', 'pos' );
      //include_once('generate.php');
      if(isset($_POST['checkout']))
{ 
      $select ="select * from cart where invoice_no='$invoice_no'";
 $sid = 0;
            $id=1;
            $total_price=0;
            $total_quantity=0;

          $run = mysqli_query($conn,$select);
          while($row = mysqli_fetch_array($run)){

            $sid =$sid + $id;
          $cart_id = $row['cart_id'];
          $invoice_no = $row['invoice_no'];
          $product_name = $row['product_name'];
          $product_sale_price = $row['product_sale_price'];
          $product_quantity = $row['product_quantity'];
         $cart_total = $row['cart_total'];

         $total_quantity += $product_quantity;
         $total_price +=$cart_total; 
$einvoice_no =$invoice_no;
            $select_product = "SELECT * FROM add_products WHERE product_id='$product_name'";       

                $run_product =mysqli_query($conn,$select_product);
                $row_product = mysqli_fetch_array($run_product);
                $product_name = $row_product['product_name']; 
               
        
            
            $etotal_quantity = $total_quantity;
            $etotal_price = $total_price;
            $order_date = date('d');
            $order_month = date('m');
            $order_year = date('Y');
            $order_status = $_POST['order_status'];
             $order_day = date('Y-m-d');
}
        $insert_order = "INSERT INTO orders(invoice_no,order_quantity,order_amount,order_date, order_month,order_year,order_status,order_day) VALUES ('$einvoice_no','$etotal_quantity','$etotal_price','$order_date','$order_month','$order_year','$order_status','$order_day')";

$run_order=mysqli_query($conn, $insert_order);
if($run_order===TRUE){

                                    echo "<div class='alert alert-success' id='success-alert'>
   <button type='button' class='close' data-dismiss='alert'>x</button>
   <strong>Success!</strong>
   Product Added Successfuly into Cart
</div>";

echo "<script>window.open('carts.php','_self');</script>";
                                 }
                                 else
                                 {
                                   echo "<div class='alert alert-danger'>Cart Not Added Successfuly</div>"; 
                                 }

         }
       
      ?> 








<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    function loadData(type, product_id){
        $.ajax({
            url : "load-css.php",
            type : "POST",
            data: {type : type, id : product_id},
            success : function(data){
                if(type == "SubCategory"){
                    $("#product_sale_price").html(data);
                }else{
                    $("#product_name").append(data);
                }
                
            }
        });
    }

    loadData();

    $("#product_name").on("change",function(){
        var product_name = $("#product_name").val();

        if(product_name != ""){
            loadData("SubCategory", product_name);
        }else{
            $("#product_sale_price").html("");
        }

        
    })
  });
</script>
<script>
    window.onload = displayClock();
 
     function displayClock(){
       var time = new Date().toLocaleTimeString();
       document.getElementById("time").innerHTML = time;
        setTimeout(displayClock, 1000); 
     }
</script>
