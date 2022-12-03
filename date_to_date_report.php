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
     ?> 

     <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                     <br>
                                      <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        

    <table id="example" class="table table-striped " style="width:100%">
        <thead>
            <tr>
                <th>Invoice No.</th>
                <th>Invoice Date</th>
                <th>Total Quantity</th>
                <th>Total Price</th>
                <th>View details</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
             
          
            

            <?php 
include_once('include/conn.php');
 


  if(isset($_GET['from_date']) && isset($_GET['to_date']))
     {
      $from_date = $_GET['from_date'];
     $to_date = $_GET['to_date'];
$select  = "SELECT * From orders where order_day BETWEEN '$from_date' AND '$to_date' ";
$run = mysqli_query($conn, $select);
while($row = mysqli_fetch_array($run)){
    $invoice_no = $row['invoice_no'];
    $invoice_date = $row['order_day'];
    
    $total_quantity = $row['order_quantity'];
    $total_price = $row['order_amount'];
   

            ?>
            <tr>
                <td><?php echo $invoice_no; ?></td>
                <td><?php echo $invoice_date; ?></td>
                <td><?php echo $total_quantity; ?></td>
                <td><?php echo $total_price; ?></td>
                <td><a class="btn btn-outline-warning" href="view_checkout_details.php?view=<?php echo $invoice_no; ?>">View Details</a></td>
                 <td><a class="btn btn-outline-danger" href="view_checkout.php?del=<?php echo $invoice_no; ?>">Delete</a></td>
                
            </tr>
           <?php } }    ?>
           
        </tbody>
      
    </table>
</

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
</form>
           
<?php 
include_once('include/footer.php');
?>