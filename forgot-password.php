<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>forgot Password</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body style=" background-color:#FDBD88;">
<?php 
session_start();
include('include/conn.php');
//session_start();
if (isset($_POST['submit'])) {
    $admin_email = mysqli_real_escape_string($conn, $_POST['admin_email']);


    $email_verify="SELECT * FROM admin where admin_email='$admin_email'";
    $run=mysqli_query($conn,$email_verify);

    $email_count=mysqli_num_rows($run);
    if($email_count) {
      $admin_email_data=mysqli_fetch_array($run);
      $admin_email=$admin_email_data['admin_email'];
        $admin_name=$admin_email_data['admin_name'];
        $token=$admin_email_data['token'];
        $subject="Password Reset";
        $body="Hi, $admin_name. Click here to Reset your Password
        http://localhost/perfect-packaging-pro/reset-password.php?token=$token";
       $sender_email= 'From: mabdulmutlib.hexatech@gmail.com';

        if(mail($admin_email,$subject,$body,$sender_email)){
             echo "<div class='form'>
                  <h3>Email Send to your mail account Successfully</h3><br/>
                  <p class='link'>Click here to <a href='reset-password.php'>Login</a> again.</p>
                 
                  
                  </div>";
            header('location:reset-password.php?token='.$token);

        }
       


}
 else
        {
             echo "<div class='form'>
                  <h3>Email Not found</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>Register</a></p>
                  </div>";
        }  
} 
 else {
?>

     
    <form class="form" method="post" name="login">
        <h1 class="login-title">Check mail to verify! </h1>
        
        <input type="email" class="login-input" name="admin_email" placeholder="Enter Admin Email To Verify" />
        
        <input type="submit" value="Send Email" name="submit" class="login-button"/>
        
  </form>
<?php 
}
 ?>
</body>
</html>

<!--

https://speedysense.com/create-registration-login-system-php-mysql/

-->