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
      $select ="SELECT * from sub_category WHERE subcategory_id='$edit_id'";
      $run = mysqli_query($conn,$select);
      $row_subcategory = mysqli_fetch_array($run);
       $subcategory_id = $row_subcategory['subcategory_id'];
       $category_id = $row_subcategory['category_id'];
       $subcategory_name = $row_subcategory['subcategory_name'];
      
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
                                    <label>Category </label>
                                   <select  class="form-control" name="category_name" id="category">


                                       <option selected value="<?php echo $categroy_id;?>"><?php echo $category_name;?></option>
                                      
                                 
                                   </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Sub Category Name</label>
                                    <input type="text" name="subcategory_name" value="<?php echo $subcategory_name; ?>" class="form-control" placeholder="Enter Sub Category Name ">
                                </div>
                                
                               <br>
                                <div class="form-group">
                                    
                                    <input type="submit" name="insert-btn" value="Edit Sub Category" class="btn btn-success">
                             
                                </div>
                            </form>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    function loadData(type, category_id){
        $.ajax({
            url : "load-cs.php",
            type : "POST",
            data: {type : type, id : category_id},
            success : function(data){
                if(type == "SubCategory"){
                    $("#sub_category").html(data);
                }else{
                    $("#category").append(data);
                }
                
            }
        });
    }

    loadData();

    $("#category").on("change",function(){
        var category = $("#category").val();

        if(category != ""){
            loadData("SubCategory", category);
        }else{
            $("#sub_category").html("");
        }

        
    })
  });
</script>

                          <?php
// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'pos' );

if(isset($_POST['insert-btn']))
{
 $ecategory_id = $_POST['category_name'];
$esubcategory_name = $_POST['subcategory_name'];


 $update = "UPDATE sub_category SET category_id='$ecategory_id',subcategory_name='$esubcategory_name' WHERE subcategory_id='$edit_id'";

$run_update=mysqli_query($conn,$update);
if($run_update===TRUE)

                                 {
                                    echo "<div class='alert alert-success'>Category Updated Successfuly</div>";
                                   
                                   
                                     echo "<script>window.open('view_subcategory.php','self');</script>";
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