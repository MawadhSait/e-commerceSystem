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
   
    <title>Admin Registration</title>
</head>
<body>
    <div class="container-fluid mt-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 text-center">
                <img src="product-img/images (1).jpg" class='img-fluid' alt="" width='70%'>
            </div>
            <div class="col-lg-6">
                <form action=""method='POST'>

                <div class="form-outline mb-4 w-50">
                    <label for="Username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required/>
                </div>

                <div class="form-outline mb-4 w-50">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required/>
                </div>

                <div class="form-outline mb-4 w-50">
                    <label for="password Confirm" class="form-label"> Confirm Password</label>
                    <input type="password" name="Cpassword" class="form-control" required/>
                </div>

                <div class="form-outline mb-4 w-50">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required/>
                </div>

                <div class="mt-4 pt-2">
                <input type="submit" name="admin_register" value="Register"class="btn btn-primary mb-3">
                <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="admin-login.php">Login</a></p>
                </div>
                </form>
            </div>
        </div>
    </div>


    <?php include('../config/footer.php');
    
    
    
if(isset($_POST['admin_register'])){
    $admin_name= $_POST['username'];
    $password= $_POST['password'];
    $email= $_POST['email'];
    $confirmpassword= $_POST['Cpassword'];
 


    $sql_check="SELECT * FROM adminRe WHERE admin_name='$admin_name' or admin_email='$email'";
    $res_check=mysqli_query($conn,$sql_check);
    if (mysqli_num_rows($res_check)>0) {
           // $_SESSION['insert-admin']='<h3 class="text-center text text-danger " role="alert"> The username or email are  already exist.</h3>';
            header("location:admin-registriation.php");

    }elseif($password!=$confirmpassword){
       // $_SESSION['insert-admin']='<h3 class="text-center text text-danger " role="alert"> The password is not match.</h3>';
        header("location:admin-registriation.php");
    }else{
            $hashPass=md5($password);
            $inser_admin="INSERT INTO adminRe SET
            admin_name='$admin_name',
            admin_email='$email',
            admin_password='$hashPass'
            ";
        
            $res_admin = mysqli_query($conn,$inser_admin);
        
            if($res_admin){
                $_SESSION['insert-admin']='<h3 class="text-center text text-info " role="alert"> The admin have been register.</h3>';
                $_SESSION['adminuser']=$admin_name;
                header("location:index.php");
                
              
            }else{
                $_SESSION['insert-admin']='<h3 class="text-center text text-danger " role="alert"> There is something error</h3>';
                header("location:index.php");
            }
            
      


    }


  
}
    
    
    
    ?>



