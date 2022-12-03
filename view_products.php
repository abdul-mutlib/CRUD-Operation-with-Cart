<?php  include_once('include/top.php');?>
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
            

               <div class="container">
  <h2>View Products</h2>
     <?php
     $conn = mysqli_connect('localhost', 'root', '', 'pos' );
     if (isset($_GET['del'])) {
       $del_id=$_GET['del'];
       $delete ="DELETE from add_products where product_id=$del_id";
       $run=mysqli_query($conn,$delete);
     }
     ?>        
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Category</th>
        <th>Product Sub Category</th>
        <th>Product Purchase Price</th>
        <th>Product Sale Price</th>
        <th>Product Quantity</th>
        <th>Product Barcode</th>
        <th>Product Image</th>
        <th>Delete</th>
        <th>Update</th>
      </tr>
    </thead>
    <tbody>
      <?php
      
      $conn = mysqli_connect('localhost', 'root', '', 'pos' );
      //include_once('generate.php');
      
      $select ="select * from add_products";

          $run = mysqli_query($conn,$select);
          while($row_product = mysqli_fetch_array($run)){
          $product_id = $row_product['product_id'];
          $product_name = $row_product['product_name'];
          $category_name = $row_product['category_name'];
          $subcategory_name = $row_product['subcategory_name'];
          $product_purchase_price = $row_product['product_purchase_price'];
          $product_sale_price = $row_product['product_sale_price'];
          $product_quantity = $row_product['product_quantity'];
          $product_barcode=$row_product['product_barcode'];
          $product_image = $row_product['product_image'];

            $select_category = "SELECT * FROM category WHERE category_id='$category_name'";       

                $run_category =mysqli_query($conn,$select_category);
                $row_category = mysqli_fetch_array($run_category);
                $category_name = $row_category['category_name'];  

            $select_subcategory = "SELECT * FROM sub_category WHERE subcategory_id='$subcategory_name'";       
                $run_subcategory =mysqli_query($conn,$select_subcategory);
                $row_subcategory = mysqli_fetch_array($run_subcategory);
                $subcategory_name = $row_subcategory['subcategory_name']; 
      ?> 
      <tr align="center">
        <td><?php echo $product_id; ?></td>
        <td><?php echo $product_name; ?></td>
        <td><?php echo ucfirst($category_name); ?></td>
        <td><?php echo ucfirst($subcategory_name); ?></td>
        <td><?php echo $product_purchase_price; ?></td>
        <td><?php echo $product_sale_price; ?></td>
        <td><?php echo $product_quantity; ?></td>
        <td><?php echo $product_barcode; ?></td>
        <td><img src="Upload/Images/<?php echo $product_image; ?>" height="50px"> </td>
        
        <td><a class="btn btn-danger" href="view_products.php?del=<?php echo $product_id; ?>">Delete</td>
        <td><a class="btn btn-success" href="edit_products.php?edit=<?php echo $product_id; ?>">Update</td>
        
      </tr>

      <?php } ?>

    </tbody>
    
  </table>
</div>

</body>

</html>  


               
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           </div>
        </div>
        <!-- End of Content Wrapper -->


    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
<?php 
include_once('include/footer.php');
?>