<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body style=" background-color:#FDBD88;">
<?php

    require('include/conn.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['admin_name'])) {
        $admin_name = stripslashes($_REQUEST['admin_name']);    // removes backslashes
        $admin_name = mysqli_real_escape_string($conn, $admin_name);
         $admin_email = stripslashes($_REQUEST['admin_email']);    // removes backslashes
        $admin_email = mysqli_real_escape_string($conn, $admin_email);
        $admin_password = stripslashes($_REQUEST['admin_password']);
        $admin_password = mysqli_real_escape_string($conn, $admin_password);
        // Check user is exist in the database
      $query    = "SELECT * FROM users WHERE admin_name='$admin_name' AND admin_email='$admin_email'
                     AND admin_password='$admin_password'  ";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows == 1) {

           $_SESSION['admin_name'] = $admin_name;
           $_SESSION['admin_email'] = $admin_email;
           $_SESSION['admin_password'] = $admin_password;
          
            // Redirect to user dashboard page
            header("Location: index.php");
              header('Location: index.php');
           
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/Password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                 
                  <p class='link'>Are you forgot Password? Don't worry!.<br><br>Click here to <a href='forgot-password.php'>Reset Password</a> </p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="admin_name" placeholder="Enter Admin Name" autofocus="true"/>
        <input type="email" class="login-input" name="admin_email" placeholder="Enter Admin Email" />
        <input type="password" class="login-input" name="admin_password" placeholder="Enter Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
  </form>
<?php
    }
?>
</body>
</html>

