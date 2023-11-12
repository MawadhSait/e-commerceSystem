<?php include('config/connection.php');
      include('functions/commen-function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
     <!--  Bootstrap  -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
   
</head>
<body>



<div class="container-fluid my-3">
    <h2 class="text-center">New User Registration</h2>

    <?php 
if(isset($_SESSION['insert-user'])){
    echo $_SESSION['insert-user'];
    unset($_SESSION['insert-user']);
}
?>
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

                <div class="form-outline mb-4">
                    <label for="confirmpassword" class="form-label">Confirm Password</label>
                    <input type="password" name="confirmpassword" class="form-control" required/>
                </div>

                <div class="form-outline mb-4">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" required/>
                </div>

                <div class="form-outline mb-4">
                    <label for="phone" class="form-label">Phone number</label>
                    <input type="text" name="phone" class="form-control" required/>
                </div>

                <div class="form-outline mb-4">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" required/>
                </div>

                <div class="mt-4 pt-2">
                <input type="submit" name="user_register" value="Register"class="btn btn-primary mb-3">
                <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="user_login.php">Login</a></p>
                </div>
               
            </form>
        </div>
    </div>
</div>
<?php
include('config/footer.php');


if(isset($_POST['user_register'])){
    $user_name= $_POST['user_name'];
    $password= $_POST['password'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $address= $_POST['address'];
    $confirmpassword= $_POST['confirmpassword'];
    $user_ip = getIP();


    $sql_check="SELECT * FROM user_table WHERE username='$user_name' or useremail='$email'";
    $res_check=mysqli_query($conn,$sql_check);
    if (mysqli_num_rows($res_check)>0) {
            $_SESSION['insert-user']='<h3 class="text-center text text-danger " role="alert"> The username or email are  already exist.</h3>';
            header("location:user_register.php");

    }elseif($password!=$confirmpassword){
        $_SESSION['insert-user']='<h3 class="text-center text text-danger " role="alert"> The password is not match.</h3>';
        header("location:user_register.php");
    }else{
            $hashPass=md5($password);
            $inser_user="INSERT INTO user_table SET
            username='$user_name',
            useremail='$email',
            userpassword='$hashPass',
            user_ip='$user_ip',
            user_address='$address',
            user_mobile=$phone
            ";
        
            $res_user = mysqli_query($conn,$inser_user);
        
            if($res_user){
                $_SESSION['insert-user']='<h3 class="text-center text text-info " role="alert"> The user have been register.</h3>';
              $select_cart= "SELECT * FROM cart WHERE ip_address='$user_ip'";
              $result_cart = mysqli_query($conn, $select_cart);
              $row_cart = mysqli_fetch_assoc($result_cart);
              if($row_cart>0){
                $_SESSION['username']=$user_name;
                echo "<script>alert('You have items in your cart')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
              }else{
                $_SESSION['username']=$user_name;
                header("location:index.php");
              }
            }else{
                $_SESSION['insert-user']='<h3 class="text-center text text-danger " role="alert"> There is something error</h3>';
                header("location:index.php");
            }
            
      


    }


  
    
}
?>  



