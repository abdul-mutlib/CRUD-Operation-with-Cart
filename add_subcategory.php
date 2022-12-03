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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Add Sub Category</h1>
                    <div class="row">
                        <div class="col">
                            <form action="" method="POST">
                                  <div class="col-md-4">
                                    <label>Category </label>
                                   <select class="form-control" name="category_name">
                                       <option value="">Select Category</option>
                                        <?php include_once('include/conn.php');
                                    $select = "select * from category ";
                                    $run =mysqli_query($conn,$select);
                                  while(  $row_category = mysqli_fetch_array($run)){
                                    $category_id = $row_category['category_id'];
                                    $category_name = $row_category['category_name'];
                                 
                                  
                                     ?>
                                       <option value="<?php echo $category_id;?>"><?php echo $category_name;?></option>
                                   <?php } ?>
                               </select>
                           </div>
                               <div class="col-md-4">
                                    <label>Sub Category Name</label>
                                    <input type="text" name="subcategory_name" class="form-control" placeholder="Enter Sub Category Name ">
                                </div>
                                <br>
                               
                                <div class="col-md-4">
                                    
                                    <input type="submit" name="insert-btn" value="Add Sub Category" class="btn btn-success">
                             
                                </div>
                            </form>
                            <?php
                              require_once('include/conn.php');

                                if(isset($_POST['insert-btn'])){
                                    $category_name= $_POST['category_name'];
                                    $subcategory_name=$_POST['subcategory_name'];

                                 $insert_subcategory = "INSERT INTO sub_category (category_id, subcategory_name) VALUES ('$category_name','$subcategory_name')";
                                 $run_insert = mysqli_query($conn,$insert_subcategory);
                                 if($run_insert===true)
                                 {
                                    echo "<div class='alert alert-success'>Category Added Successfuly</div>";
                                 }
                                 else
                                 {
                                   echo "<div class='alert alert-danger'>Category Not Added Successfuly</div>"; 
                                 }


                                 

                                }

                             ?>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
 
            </div>
            <!-- End of Main Content -->

<?php
include_once('include/footer.php');
?>