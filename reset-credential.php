<?php 
session_start();
include_once('include/auth_session.php');
include_once('include/conn.php');
include_once("include/top.php");
?>
  <?php
  include_once('include/style.css');
  ?>
</head>

<body>
    <!-- Left Panel -->
  
       <?php
  include_once('include/sidebar.php');
  ?>
    
    <!-- /#left-panel -->
    <!-- Right Panel -->
       <?php
  include_once('include/header.php');
  ?>

  
 
  <form class="form" action="" method="post" enctype="multipart/form-data" style="margin-left: 25%;">
        <!-- /#header -->
        <!-- Content -->
        <div class="content" >
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                 <div style="margin-left: 5%;"><h3>Reset User Cridentials</h3></div><br><br>
                    <div class="col-lg-8 col-md-8" >
                      
                       <div class="form-group">
                           <label >Admin Name</label>
                           <input type="text" name="admin_name" placeholder="Enter Admin Name " class="form-control">
                       </div> 
                        <div class="form-group">
                           <label>Admin Email</label>
                           <input type="email" name="admin_email"  placeholder="Enter Email Addess " class="form-control">
                       </div>
                        <div class="form-group">
                           <label>Admin Password</label>
                           <input type="Password" name="admin_password"  placeholder="Enter Admin Password " class="form-control">
                       </div>
                      
                       <br>
                       <input type="submit" name="btn-cat" class="btn btn-success" value="Update">
                    </div>
                
            </div>
            <!-- .animated -->
        </div>

    </form>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
      

<?php
    require('include/conn.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['admin_name'])) {
        // removes backslashes
        $admin_name = stripslashes($_REQUEST['admin_name']);
        //escapes special characters in a string
        $admin_name = mysqli_real_escape_string($conn, $admin_name);
        $admin_email    = stripslashes($_REQUEST['admin_email']);
        $admin_email    = mysqli_real_escape_string($conn, $admin_email);
        $admin_password = stripslashes($_REQUEST['admin_password']);
        $admin_password = mysqli_real_escape_string($conn, $admin_password);
       
        //$create_datetime = date("Y-m-d H:i:s");
        $query="UPDATE admin SET admin_name='$admin_name',admin_email='$admin_email',admin_password='$admin_password' WHERE admin_name='$_SESSION[admin_name]'";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form' align='center'>
                  <h4 >Username, Email & Password Changed successfully.</h4><br/>
                  </div>";

        } else {
            echo "<div class='form'>
                  <h3>Oops!, Something is wrong.</h3><br/>
                  
                  </div>";
        }
    } else {

    }
?>
     <?php
  include_once('include/footer.php');
  ?>

        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

    <!--Local Stuff-->
   
</body>
</html>
