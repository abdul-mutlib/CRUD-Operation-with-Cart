<?php  include_once('include/top.php');?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php  require_once('include/sidebar.php');?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               

                    <!-- Topbar Navbar -->
                    <?php include_once('include/navbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div>
                        <h3> View Checkout Details</h3>
                    </div>
                    <div><br></div>
                      <?php
     $conn = mysqli_connect('localhost', 'root', '', 'pos' );
     if (isset($_GET['del'])) {
       $del_id=$_GET['del'];
       $delete ="DELETE from orders where invoice_no=$del_id";
       $run=mysqli_query($conn,$delete);
     }
     ?> 

    <table id="example" class="table table-striped " style="width:100%">
        <thead>
            <tr>
                <th>Invoice No.</th>
                <th>Product Name</th>
                <th> Quantity</th>
                <th>Price</th>
                <th> Total Price</th>
                  
            </tr>
        </thead>
        <tbody>

            <?php 
include_once('include/conn.php');

     if (isset($_GET['view'])) {
       $edit_id=$_GET['view'];
$select  = "SELECT * From cart where invoice_no='$edit_id'";
$run = mysqli_query($conn, $select);
while($row = mysqli_fetch_array($run)){
    $invoice_no = $row['invoice_no'];
    $product_name = $row['product_name'];
    $product_price = $row['product_sale_price'];
    $product_quantity = $row['product_quantity'];
    $total_price = $product_quantity * $product_price;
       $select_product = "SELECT * FROM add_products WHERE product_id='$product_name'";       

                $run_product =mysqli_query($conn,$select_product);
                $row_product = mysqli_fetch_array($run_product);
                $product_name = $row_product['product_name']; 



            ?>
            <tr>
                <td><?php echo $invoice_no; ?></td>
                <td><?php echo $product_name; ?></td>
                <td><?php echo $product_quantity; ?></td>
                <td><?php echo $product_price; ?></td>
                <td><?php echo $total_price; ?></td>
               
                
            </tr>
           <?php } } ?>
           
        </tbody>
      
    </table>


  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>


    <script src="include/datatable.js">
    
    </script>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           
<?php 
include_once('include/footer.php');
?>