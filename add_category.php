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
                    <h1 class="h3 mb-4 text-gray-800">Add Category</h1>
                    <div class="row">
                        <div class="col">
                            <form action="" method="POST">
                                <div class="col-md-4">
                                    <label>Category Name</label>
                                    <input type="text" name="category_name" class="form-control" placeholder="Enter Category Name ">
                                </div>
                               <br>
                               
                               <div class="col-md-4">
                                    
                                    <input type="submit" name="insert-btn" value="Add Category" class="btn btn-success">
                             
                                </div>
                            </form>
                            <?php
                              require_once('include/conn.php');

                                if(isset($_POST['insert-btn'])){
                                    $category_name= $_POST['category_name'];
                                

                                 $insert_category = "INSERT INTO category (Category_name) VALUES ('$category_name')";
                                 $run_insert = mysqli_query($conn,$insert_category);
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