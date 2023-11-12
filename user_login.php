<?php include('config/connection.php');
      include('functions/commen-function.php');
      @session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
<div class="container-fluid my-3">
    <h2 class="text-center">Login</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="POST">
                <div class="form-outline mb-4">
                    <label for="user_name" class="form-label">User Name</label>
                    <input type="text" name="user_name" class="form-control" required/>
                </div>

                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required/>
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" name="user_login" value="Register"class="btn btn-primary mb-3">
                </div>
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account<a href="user_register.php">Register Now</a></p>

            </form>
        </div>
    </div>
</div>

<?php
include('config/footer.php');

if(isset($_POST['user_login'])){
   $username_log =$_POST['user_name'];
   $password_log=    md5($_POST['password']);
   $user_ip = getIP();

   $sql_log = "SELECT * FROM user_table WHERE username='$username_log' AND userpassword='$password_log'";
   $res_log = mysqli_query($conn,$sql_log);
   $count_log = mysqli_num_rows($res_log);

   $sql_cart ="SELECT * FROM cart WHERE ip_address='$user_ip'";
   $res_cart = mysqli_query($conn,$sql_cart);
   $count_cart = mysqli_num_rows($res_cart);
   if($count_log==1 AND $count_cart==0){
    $_SESSION['username']=$username_log;
        echo "<script>alert('You are logged in')</script>";
        echo "<script>window.open('index.php','_self')</script>";
   }elseif($count_log==1 AND $count_cart>0){
        $_SESSION['username']=$username_log;
        echo "<script>alert('You are logged in')</script>";
        echo "<script>window.open('payment.php','_self')</script>";
   }else{
       echo " <div class='alert alert-danger' role='alert'>
       A simple danger alert—check it out!
   </div>" ;
   }
}
?>