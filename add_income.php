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
                    <h1 class="h3 mb-4 text-gray-800">Add Income</h1>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="number" name="income_amount" class="form-control" required/>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category_id" required>
                                        <option >Select Category</option>
                                        <?php 
                                        require_once('include/conn.php');
                    $select_category = "Select * from category ";
                    $run =mysqli_query($conn,$select_category);
                    while($row_category = mysqli_fetch_array($run)){

                        $category_id = $row_category['category_id'];
                        $category_name = $row_category['category_name'];
                      
                                         ?>
                                         <option value="<?php echo $category_id; ?>"><?php echo $category_name?></option>
                                     <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Receipt</label>
                                    <input type="file" name="income_receipt" class="form-control"/>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="income_date" class="form-control">
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <label>Datails</label>
                                <textarea type="date" name="income_details" class="form-control"></textarea> 
                            </div>
                        </div>
                         <div>
                            <div class="form-group">
                               <input type="submit" name="insert-btn" class="btn btn-success" value="Add Income">
                            </div>
                        </div>
                    </form>
                    <?php 
                    include_once('include/conn.php');
                    if(isset($_POST['insert-btn'])){
                        $income_amount = $_POST['income_amount'];
                        $category_id = $_POST['category_id'];
                        //$income_receipt = $_POST['income_receipt'];
                        $receipt_image = $_FILES['income_receipt']['name'];
                        $tmp_image = $_FILES['income_receipt']['tmp_name'];
                        $income_date = $_POST['income_date'];
                        $income_details = $_POST['income_details'];

                        $month = date('m');
                        $year = date('Y');

                    $insert_income = "INSERT INTO income(income_amount,category_id,income_details,income_receipt,income_date,income_month,income_year) VALUES ('$income_amount','$category_id','$income_details','$receipt_image','$income_date','$month','$year') ";
                    $run_insert = mysqli_query($conn,$insert_income);
                            if($run_insert===TRUE){

                                move_uploaded_file($tmp_image, "Upload/Receipt/$receipt_image");
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