<?php include('../config/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- FontAwosom       -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <title>Admin LOGIN</title>
</head>
<body>
    <div class="container-fluid mt-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 text-center">
                <img src="product-img/images.jpg" class='img-fluid' alt="" width='70%'>
            </div>
            <div class="col-lg-6">
                <form action=""method='POST'>

                <div class="form-outline mb-4 w-50">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required/>
                </div>


                <div class="form-outline mb-4 w-50">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required/>
                </div>

              
                <div class="mt-4 pt-2">
                <input type="submit" name="admin_login" value="Log in"class="btn btn-primary mb-3">
                <p class="small fw-bold mt-2 pt-1 mb-0">YOU DON't Have an account? <a href="admin-registriation.php">Register</a></p>
                </div>
                </form>
            </div>
        </div>
    </div>




    <?php
include('../config/footer.php');

if(isset($_POST['admin_login'])){
    $password= md5($_POST['password']);
    $username= $_POST['username'];



    $sql_check="SELECT * FROM adminRe WHERE admin_name='$username' AND admin_password = '$password'";
    $res_check=mysqli_query($conn,$sql_check);
   $count_log = mysqli_num_rows($res_check);

   if($count_log==1){
    $_SESSION['adminuser']=$username;
        echo "<script>alert('You are logged in')</script>";
        echo "<script>window.open('index.php','_self')</script>";
   }else{
        $_SESSION['username']=$username;
        echo "<script>alert('You are NOT logged in')</script>";
       // echo "<script>window.open('payment.php','_self')</script>";
   }
}
?>