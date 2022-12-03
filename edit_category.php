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
                    <h1 class="h3 mb-4 text-gray-800">Edit Sub Category</h1>
                    <?php
     $conn = mysqli_connect('localhost', 'root', '', 'pos' );
     if (isset($_GET['edit'])) {

       

      $edit_id=$_GET['edit'];
      $select ="SELECT * from category WHERE category_id='$edit_id'";
      $run = mysqli_query($conn,$select);
      $row_category = mysqli_fetch_array($run);
       $category_id = $row_category['category_id'];
       
      
      
    }
      ?> 
       <?php
                                 $select_category = "SELECT * FROM category WHERE category_id='$category_id'";       

                                $run_category =mysqli_query($conn,$select_category);
                                  $row_category = mysqli_fetch_array($run_category);
                                  $category_id = $row_category['category_id'];
                                    $category_name = $row_category['category_name']; 

                                    ?>
                    <div class="row">
                        <div class="col">
                            <form action="" method="POST">
                                  <div class="col-md-4">
      <label for="text">Category Name:</label>
      <input type="text" class="form-control" value="<?php echo $category_name; ?>" placeholder="Enter Product " name="category_name">
    </div>
                               
                               <br>
                                <div class="form-group">
                                    
                                    <input type="submit" name="insert-btn" value="Edit Category" class="btn btn-success">
                             
                                </div>
                            </form>



                          <?php
// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'pos' );

if(isset($_POST['insert-btn']))
{
 $ecategory_id = $_POST['category_name'];



 $update = "UPDATE category SET category_name='$ecategory_id' WHERE category_id='$edit_id'";

$run_update=mysqli_query($conn,$update);
if($run_update===TRUE)

                                 {
                                    echo "<div class='alert alert-success'>Category Updated Successfuly</div>";
                                   
                                   
                                     echo "<script>window.open('view_category.php','self');</script>";
                                 }
                                 else
                                 {
                                   echo "<div class='alert alert-danger'>Category Not Updated Successfuly</div>"; 
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