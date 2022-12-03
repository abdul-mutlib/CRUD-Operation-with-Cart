
<?php 
 include_once('include/top.php');
include_once('include/conn.php');
                                   ?>

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
                    <?php include_once('include/navbar.php');
                   ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">
  <h2>Add New Product</h2>
  <form action="" method="POST" enctype="multipart/form-data">
     <div class="col-md-4">
      <label for="text">Product Name:</label>
      <input type="text" class="form-control" placeholder="Enter Product " name="product_name">
    </div>
    <tr>
       
            
        <td class="col-md-4">
        <div class="col-md-4" >
                                    <label>Category </label>
                                   <select class="form-control" name="category_name" id="category">
                                       <option selected value="">Select Category</option>
                                      
                                      
                                      
                               </select>
                           </div></td>
   
<td class="col-md-4" >
                                <div class="col-md-4" >
                                    <label>Sub Category </label>
                                   <select class="form-control" name="subcategory_name" id="sub_category">
                                       <option selected value="">Select Sub Category</option>
                                       <option value=""></option>
                                      
                               </select>
                           </div>
</td>
</tr>
</td>
</tr>

   <div class="col-md-4">
      <label for="text">Product Purchase Price:</label>
      <input type="text" class="form-control" placeholder="Enter Product Purchase Price" name="product_purchase_price">
    </div>
    <div class="col-md-4">
      <label for="text">Product Sale Price:</label>
      <input type="text" class="form-control"  placeholder="Enter Product Sale Price" name="product_sale_price">
    </div>
     <div class="col-md-4">
      <label for="text">Product Quantity:</label>
    <input type="text" class="form-control"  placeholder="Enter Product Quantity" name="product_quantity">
    </div>
    <?php
    include_once('include/barcode.php');
     ?>
     <div class="col-md-4">

      <label for="text">Product Barcode:</label>
       <input type="barcode" class="form-control" placeholder="Generate Barcode"  name="product_barcode">

    </div>
   
    <div class="col-md-4">
      <label for="file">Product Image:</label> 
      <input type="file" class="form-control" placeholder="Enter Product Image" name="product_image">
    </div>
<br>
    <input type="submit" name="insert-btn" class="btn btn-primary">
    
  
    <br><br><br>
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

 $product_name = $_POST['product_name'];
  $category_name = $_POST['category_name'];
 $subcategory_name = $_POST['subcategory_name'];
$product_purchase_price = $_POST['product_purchase_price'];
$product_sale_price =$_POST['product_sale_price'];
$product_quantity = $_POST['product_quantity'];
$product_barcode = $_POST['product_barcode'];
//$brcd_barcode = $_POST['product_barcode']['brcd_name'];

$product_image = $_FILES['product_image']['name'];
$tmp_image = $_FILES['product_image']['tmp_name'];
$insert = "INSERT INTO add_products(product_name,category_name,subcategory_name,product_purchase_price,product_sale_price,product_quantity,product_barcode,product_image) VALUES ('$product_name','$category_name','$subcategory_name','$product_purchase_price','$product_sale_price','$product_quantity','$product_barcode','$product_image')";

$run_insert=mysqli_query($conn, $insert);

if($run_insert===TRUE){

  move_uploaded_file($tmp_image, "Upload/Images/$product_image");
 }
}
?>
</div>
                <!-- /.container-fluid -->
 
            </div>
            <!-- End of Main Content -->

<?php
include_once('include/footer.php');
?>