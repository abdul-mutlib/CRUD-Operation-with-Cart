<?php  include_once('include/top.php');?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
<script src="getMonth.js"></script>
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
                        <h3> Individual Report: 
                                               </h3>
                    </div>
                    <div><br></div>
                      <?php
     $conn = mysqli_connect('localhost', 'root', '', 'pos' );
     if (isset($_GET['del'])) {
       $del_id=$_GET['del'];
       $delete ="DELETE from orders where invoice_no=$del_id  ";
       $run=mysqli_query($conn,$delete);
     }
     ?> <form action="" method="POST">

     
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <select id="month" name="month" class="form-control">
                                            <option value="" selected="selected">Select Month</option> 
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                         
                                      </select>

                                    </div>
                                    <div>
                                    <td> <input type="submit" name="search" value="SEARCH" class="btn btn-primary"></td>
                                    <td ><a  class="btn btn-success" href="month_wise_report.php">Refresh</a></td>
                                </div>



                                </div>
       
                               
                            </div>
                        </form>
                        <form action="" method="POST">
    
    <table class="table   hidden" id="recordListing">
        <thead>
          <tr>
            <th>Invoice No</th>
            <th>Invoice Date</th>
            <th>Order_Quantity</th>
            <th>Order Price</th>
            <th>View Details</th>
          </tr>
        </thead>
    
       

  <?php 
include_once('include/conn.php');
if (isset($_POST['search'])) {
    
   $order_month = $_POST['month']; 
 $select  = "SELECT * From orders where order_month='$order_month'";
$run = mysqli_query($conn, $select);
while($row = mysqli_fetch_array($run)){
    $invoice_no = $row['invoice_no'];
    $invoice_date = $row['order_date'];
    $order_month = $row['order_month'];
    $invoice_year = $row['order_year'];
    $total_quantity = $row['order_quantity'];
    $total_price = $row['order_amount'];


            ?> 
        <tbody>
          <tr>
            <td > <?php echo $invoice_no; ?></td>
            <td ><?php echo $invoice_date."-".$order_month."-".$invoice_year; ?></td>
            <td ><?php echo $total_quantity; ?></td>
            <td ><?php echo $total_price; ?></td>

            <td ><a class="btn btn-outline-warning" href="view_checkout_details.php?view=<?php echo $invoice_no; ?>">View Details</a></td>
          </tr>
      <?php } }  ?>
        </tbody>            
    </table>  
    </form>     
</div>
      </div>                  
              

   


  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


    <script src="include/datatable.js">
    
    </script>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           
<?php 
include_once('include/footer.php');
?>