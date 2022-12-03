<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body style=" background-color:#FDBD88;">
<?php

      require('include/conn.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['submit'])) {
       if (isset($_GET['token'])) {
            $token=$_GET['token'];
        $select="SELECT * FROM admin where token='$token'";
        $runemail=mysqli_query($conn,$select);
       while($row=mysqli_fetch_array($runemail)){
        $admin_email=$row['admin_email'];
    }
        $admin_password = stripslashes($_REQUEST['admin_password']);
        $admin_password = mysqli_real_escape_string($conn, $admin_password);
        // Check user is exist in the database

        $update="UPDATE admin set admin_password='$admin_password' where token='$token' AND admin_email='$admin_email'";
        $run=mysqli_query($conn,$update);
        if ($run) {
            echo "<div class='form'>
                  <h3>Password updated Successfully</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";

        } 
        
        else {
            echo "<div class='form'>
                  <h3>Password Not updated</h3><br/>
                  <p class='link'>Click here to <a href='reset-password.php'>Reset Password Again</a> again.</p>
                  </div>";
        }
     }
 }
 else{
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Update Password</h1>
        
        <input type="password" class="login-input" name="admin_password" placeholder="Enter New Password"/>
        <input type="submit" value="Reset Password" name="submit" class="login-button"/>
        
  </form>
<?php } ?>
</body>
</html>

<!--

https://speedysense.com/create-registration-login-system-php-mysql/

-->