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
 
      <section class="mt-3">
   
<form action="cart.php" method="POST" >
          
         
   
            
         
            <div class="col-md-7  mt-4" style="background-color:#f5f5f5;">
               <div class="p-4">
                  <div class="text-center">
                     <h4>Receipt</h4>
                  </div>
                  <span class="mt-4"> Time : </span><span  class="mt-4" id="order_time"></span>
                  <div class="row">
                     <div class="col-xs-6 col-sm-6 col-md-6 ">
                        <span id="day"></span> : <span id="order_date"></span>
                     </div>
                     <?php
                     $order_sum= 1;
                     $select = "SELECT * FROM cart";
                     $run = mysqli_query($conn,$select);
                     while ($row = mysqli_fetch_array($run)) {
                       $order_id = $row['order_id'];
                    }
                       $order_sum += $order_id;
                     
                     ?>
                     <div class="col-xs-6 col-sm-6 col-md-4 text-right">

                       Order ID: <?php echo $order_sum;?>
                        
                     </div>
                  </div>
                     <br>

                  <div class="row">
                     </span>
                     <table id="receipt_bill" class="table">
                        <thead>
                           <tr>
                              <th> Order ID</th>
                              <th>Total Quantities</th>
                              <th>Sub Total</th>
                              <th class="text-center">Discount</th>
                              <th class="text-center">Total Price</th>
                             
                           </tr>
                        </thead>
                        <tbody id="new" >
                          
                        </tbody>
                       
                        <tr>
                         
                           <td style="width:12%">
                          <input disabled type="text" id="quantity" class="form-control">
                        </td> 
                           <td style="width:15%">
                          <input disabled type="text" id="quantity" class="form-control">
                        </td>
                           <td style="width:15%">
                          <input disabled type="text" id="quantity" class="form-control">
                        </td>
                           <td style="width:15%">
                          <input disabled type="text" id="quantity" class="form-control">
                        </td>
                            <td style="width:15%">
                          <input disabled type="text" id="quantity" class="form-control">
                        </td>
                        </tr>

                     </table>
                 
       <input type="submit" name="insert-btn" class="btn btn-success"  value="Cash" >
       
                                    
                    
                             
</form>  
                             

                  </div>
               </div>

            </div>

         </div>
      </section>

  
   </body>

</html>

<script>
   $(document).ready(function(){
     $('#product_id').change(function() {
      var id = $(this).find(':selected')[0].id;
       $.ajax({
          method:'POST',
          url:'fetch.php',
          data:{id:id},
          dataType:'json',
          success:function(data)
            {
             $('#price').text(data.product_sale_price);
 
               //$('#qty').text(data.product_quantity);
              
            }
       });
     });
    
     //add to cart 
     var count = 1;
     $('#add').on('click',function(){
    
        var name = $('#product_id').val();
        var quantity = $('#quantity').val();
        var price = $('#price').text();
 
        if(quantity == 0)
        {
           var erroMsg =  '<span class="alert alert-danger ml-5">Minimum Qty should be 1 or More than 1</span>';
           $('#errorMsg').html(erroMsg).fadeOut(9000);
        }
        else
        {
           billFunction(); // Below Function passing here 
        }
         
        function billFunction()
          {
          var order_total_price = 0;
       
          $("#receipt_bill").each(function () {
          var order_total_price =  price*quantity;
          var subTotal = 0;
          subTotal += parseInt(order_total_price);
          
          var table =   '<tr><td>'+ count +'</td><td>'+ name + '</td><td>' + quantity + '</td><td>' + price + '</td><td><strong><input type="hidden" id="total" value="'+order_total_price+'">' +order_total_price+ '</strong></td></tr>';

          $('#new').append(table)
 
           // Code for Sub Total of Vegitables 
            var total = 0;
            $('tbody tr td:last-child').each(function() {
                var value = parseInt($('#order_total_price', this).val());
                if (!isNaN(value)) {
                    order_total_price += value;
                }
            });
             $('#subTotal').text(order_total_price);
               
            // Code for calculate tax of Subtoal 5% Tax Applied
              var Tax = (order_total_price * 5) / 100;
              $('#taxAmount').text(Tax.toFixed(2));
 
             // Code for Total Payment Amount
 
             var Subtotal = $('#subTotal').text();
             var taxAmount = $('#taxAmount').text();
 
             var order_total_price = parseFloat(Subtotal) - parseFloat(taxAmount);
             $('#order_total_price').text(order_total_price.toFixed(2)); // Showing using ID 
        
         });
         count++;
        } 
       });
           // Code for year 
             
           var order_date = new Date(); 
             var order_time = order_date.getDate() + "/"
                + (order_date.getMonth()+1)  + "/"
                + order_date.getFullYear();
                $('#order_date').text(order_time);
 
           // Code for extract Weekday     
                function myFunction()
                 {
                    var d = new Date();
                    var weekday = new Array(7);
                    weekday[0] = "Sunday";
                    weekday[1] = "Monday";
                    weekday[2] = "Tuesday";
                    weekday[3] = "Wednesday";
                    weekday[4] = "Thursday";
                    weekday[5] = "Friday";
                    weekday[6] = "Saturday";
 
                    var day = weekday[d.getDay()];
                    return day;
                    }
                var day = myFunction();
                $('#day').text(day);
     });
</script>

 
<!-- // Code for TIME -->
<script>
    window.onload = displayClock();
 
     function displayClock(){
       var order_time = new Date().toLocaleTimeString();
       document.getElementById("order_time").innerHTML = order_time;
        setTimeout(displayClock, 1000); 
     }
</script>
