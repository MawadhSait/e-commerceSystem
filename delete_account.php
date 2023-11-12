<?php include('config/connection.php');

@session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>


<h3 class="text-center text-danger"> Delete Account</h3>

<form action="" method="POST" class="text-center">
                <div class="form-outline mb-4">
                    <input type="submit" name="Delete"  class="form-control w-50 m-auto btn btn-outline-dark "  value="Delete Account"/>
                </div>

                <div class="form-outline mb-4">
                    <input type="submit" name="DO_NOT_Delete"  class="form-control w-50 m-auto btn btn-outline-dark" value="DO NOT Delete Account"/>
                </div>
            </form>
    
<?php 

$username_session = $_SESSION['username'];
if(isset($_POST['Delete'])){
    $sql = "DELETE FROM user_table WHERE username='$username_session'";
    $res_delete = mysqli_query($conn,$sql);
    if ($res_delete) {
        session_destroy();
 echo "<script>alert('THE USER HAS BEEN DELETED')</script>";
    echo "<script>window.open('index.php','_self')</script>";
    }
}


if(isset($_POST['DO_NOT_Delete'])){
    echo "<script>window.open('index.php','_self')</script>";
}
?>