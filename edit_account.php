<?php 
if(isset($_GET['edit_account'])){
    $username_session = $_SESSION["username"];
    $select_query = "SELECT * FROM user_table WHERE username='$username_session'";
    $res = mysqli_query($conn,$select_query);
    $row=mysqli_fetch_assoc($res);
    $user_id = $row['user_id'];
    $username = $row['username'];
    $useremail = $row['useremail'];
    $useraddress = $row['user_address'];
    $usermobile = $row['user_mobile'];
}

if(isset($_POST['update_user'])){
    $new_ID = $user_id;
    $new_name=$_POST['user_name'];
    $new_email=$_POST['email'];
    $new_address=$_POST['address'];
    $new_phone=$_POST['phone'];

    $sql_update = "UPDATE user_table SET
    username ='$new_name',
    useremail='$new_email',
    user_address='$new_address',
    user_mobile='$new_phone'
     WHERE user_id=$new_ID";
     $res_update = mysqli_query($conn,$sql_update);
     if ($res_update){
        echo "<script>alert('Account updated successfully!')</script>";
        echo "<script>window.open('logout.php','_self')</script>";
     }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h3 class="text-center"> Edite Account</h3>

<form action="" method="POST" class="text-center">
                <div class="form-outline mb-4">
                    <input type="text" name="user_name" class="form-control w-50 m-auto" value="<?php echo $username ;?>"/>
                </div>

                <div class="form-outline mb-4">
                    <input type="email" name="email" class="form-control w-50 m-auto" value="<?php echo  $useremail;?>"/>
                </div>

                <div class="form-outline mb-4">
                    <input type="text" name="phone" class="form-control w-50 m-auto" value="<?php echo $usermobile ;?>"/>
                </div>

                <div class="form-outline mb-4">
                    <input type="text" name="address" class="form-control w-50 m-auto" value="<?php echo $useraddress ;?>"/>
                </div>

               
                <input type="submit" name="update_user" value="Update"class="btn btn-primary ">
                
               
            </form>
    
</body>
</html>