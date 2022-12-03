
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
  <h2>Update Products</h2>
  <?php
     $conn = mysqli_connect('localhost', 'root', '', 'pos' );
     if (isset($_GET['edit'])) {
       $edit_id=$_GET['edit'];
       $select ="select * from add_products where product_id='$edit_id'";
      $run = mysqli_query($conn,$select);
      $row_products = mysqli_fetch_array( $run);
      $product_id = $row_products['product_id'];
      $product_name = $row_products['product_name'];
      $category_name = $row_products['category_name'];
      $subcategory_name = $row_products['subcategory_name'];
      $product_purchase_price= $row_products['product_purchase_price'];
      $product_sale_price = $row_products['product_sale_price'];
      $product_quantity = $row_products['product_quantity'];
      $product_barcode = $row_products['product_barcode'];
      $product_image =  $row_products['product_image'];
    }
      ?> 
      <?php
                                 $select_category = "SELECT * FROM category WHERE category_id='$category_name'";       

                                $run_category =mysqli_query($conn,$select_category);
                                  $row_category = mysqli_fetch_array($run_category);
                                    $category_name = $row_category['category_name']; 

                                      $select_subcategory = "SELECT * FROM sub_category WHERE subcategory_id='$subcategory_name'";       

                                $run_subcategory =mysqli_query($conn,$select_subcategory);
                                  $row_subcategory = mysqli_fetch_array($run_subcategory);
                                    $subcategory_name = $row_subcategory['subcategory_name']; ?>
       
    
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="col-md-4">
      <label for="text">Product Name:</label>
      <input type="text" class="form-control" value="<?php echo $product_name; ?>" placeholder="Enter Product " name="product_name">
    </div>
     <div class="col-md-4">
                                    <label>Category </label>
                                   <select  class="form-control" name="category_name" id="category">


                                       <option selected value="<?php echo $categroy_id;?>"><?php echo $category_name;?></option>
                                      
                                 
                                   </select>
                                </div>

                                 <div class="col-md-4">
                                    <label>Sub Category </label>
                                   <select class="form-control" name="subcategory_name" id="sub_category">
                                       <option selected value="<?php echo $subcategory_id;?>"><?php echo $subcategory_name;?></option>
                                   
                                   </select>
                                </div>
    <div class="col-md-4">
      <label for="text">Product Purchase Price:</label>
      <input type="text" class="form-control" value="<?php echo $product_purchase_price; ?>" placeholder="Enter Product Purchase Price" name="product_purchase_price">
    </div>
    <div class="col-md-4">
      <label for="text">Product Sale Price:</label>
      <input type="text" class="form-control" value="<?php echo $product_sale_price; ?>" placeholder="Enter Product Sale Price" name="product_sale_price">
    </div>
     <div class="col-md-4">
      <label for="text">Product Quantity:</label>
    <input type="text" class="form-control"  value="<?php echo $product_quantity; ?>" placeholder="Enter Product Quantity" name="product_quantity">
    </div>
     <div class="col-md-4">
      <label for="text">Product Barcode:</label>
       <input type="text" class="form-control" value="<?php echo $product_barcode; ?>" placeholder="Generate Barcode"  name="product_barcode">
    </div>
   
     <div class="col-md-4">
      <label for="file">Product Image:</label> 
      <input type="file" class="form-control" value="<?php echo $product_image; ?>" placeholder="Enter Product Image" name="product_image">
    </div>
   <br>
    <input type="submit" name="update-btn" value="Edit Products" class="btn btn-outline-success"/>
   
    
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

if(isset($_POST['update-btn']))
{
$eproduct_name = $_POST['product_name'];
$ecategory_name = $_POST['category_name'];
$esubcategory_name = $_POST['subcategory_name'];
$eproduct_purchase_price = $_POST['product_purchase_price'];
$eproduct_sale_price = $_POST['product_sale_price'];
$eproduct_quantity = $_POST['product_quantity'];
$eproduct_barcode = $_POST['product_barcode'];
$eproduct_image = $_FILES['product_image']['name'];
$etmp_image = $_FILES['product_image']['tmp_name'];


if(empty($eproduct_image)){
 $product_image=$product_image;
}
 $update = "UPDATE add_products SET product_name='$eproduct_name',category_name='$ecategory_name', subcategory_name='$esubcategory_name', product_purchase_price='$eproduct_purchase_price',product_sale_price='$eproduct_sale_price',product_quantity='$eproduct_quantity',product_barcode='$eproduct_barcode' WHERE product_id='$edit_id'";

$run_update=mysqli_query($conn,$update);
if($run_update===TRUE)

                                 {
                                    echo "<div class='alert alert-success'>Category Updated Successfuly</div>";
                                   
                                    move_uploaded_file($etmp_image, "Upload/Images/$eproduct_image");
                                     echo "<script>window.open('view_products.php','self');</script>";
                                 }
                                 else
                                 {
                                   echo "<div class='alert alert-danger'>Category Not Updated Successfuly</div>"; 
                                 }
  

 
}
?>
</div>

</body>
</html>

                <!-- /.container-fluid -->
 
            </div>
            <!-- End of Main Content -->

<?php
include_once('include/footer.php');
?>