<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body style=" background-color:#FDBD88;">
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
        $admin_image = $_FILES['admin_image']['name'];
        $admin_image= $_FILES['admin_image']['tmp_name'];
        $admin_image = mysqli_real_escape_string($conn, $admin_image);
        $admin_role = stripslashes($_REQUEST['admin_role']);
        $admin_role = mysqli_real_escape_string($conn, $admin_role);
        $token = mt_rand(10,1000000);
        $admin_status = stripslashes($_REQUEST['admin_status']);
        $admin_status = mysqli_real_escape_string($conn, $admin_status);
        //$create_datetime = date("Y-m-d H:i:s");

        $email_query="SELECT * FROM users where admin_email='$admin_email'";
        $runemailquery=mysqli_query($conn,$email_query);
        $email_count=mysqli_num_rows($runemailquery);
        if ($email_count>0) {
             echo "<div class='form'>
                  <h3>Email Already Exists!.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>Register Again</a></p>
                  </div>";
        }
        else{

        $query    = "INSERT into users(admin_name, admin_email, admin_password, admin_image, admin_role,token, admin_status )
                     VALUES ('$admin_name', '$admin_email',  '$admin_password', '$admin_image', '$admin_role' , '$token', '$admin_status' )";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        } }
    }
     else {
?>
    <form class="form" action="" method="post" enctype="multipart/form-data">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="admin_name" placeholder="Admin Name" required />
        <input type="text" class="login-input" name="admin_email" placeholder="Admin Email">
        <input type="password" class="login-input" name="admin_password" placeholder="Admin Password">
        <input type="file" class="login-input" name="admin_image" placeholder="Admin Image">
        <input type="text" class="login-input" name="admin_role" placeholder="Admin Role">

                         &emsp;&emsp; &emsp;&emsp;&emsp;&emsp; 

      <input type="radio" class="form-control" name="admin_status" placeholder="Admin Role" value="active" style="align=:center">Active

                         &emsp;&emsp;&emsp;&emsp;

        <input type="radio" class="form-control"  name="admin_status" placeholder="Admin Role" value="non_active" align="center">Non-Active<br><br>
        
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"> <a href="login.php">Click Here To Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>