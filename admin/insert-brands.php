<?php 
include('../config/connection.php');
if(isset($_POST['brand'])){
    $brand_name = mysqli_escape_string($conn,$_POST['brand_name']);
    $sql = "SELECT * FROM brand WHERE brand_name='$brand_name'";
    $res = mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
   
    if($count>0){
        $_SESSION['NotFound']='<div class="alert alert-warning" role="alert"> The brand name is exist</div>'; 
       // header('Location:http://localhost/ECommerceSystem/admin/');   // return error message if category name already
    }else{
        $sql1="INSERT INTO brand (`brand_name`) VALUES ('$brand_name')";
       $res1 = mysqli_query($conn,$sql1);
       
       if($res1==true){
        $_SESSION['add']='<div class="alert alert-success" role="alert"> The brand is Added</div>'; 
       // header('Location:http://localhost/ECommerceSystem/admin/'); // return error message if category name already
        }else{
            $_SESSION['add']='<div class="alert alert-warning" role="alert"> The brand is NOT Added</div>'; 
         //   header('Location:http://localhost/ECommerceSystem/admin/'); 
        }
    }
}




if(isset($_SESSION['NotFound'])){
    echo $_SESSION['NotFound'];
    unset($_SESSION['NotFound']);
}
if(isset($_SESSION['add'])){
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}

?>

<form action="" method="POST">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-light">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control p-2" placeholder="Insert brand" name="brand_name">
    </div>
    <br>
    <div class="input-group w-10 mb-2">
        <input type="submit" class="btn btn-dark p-2" value="Insert brand" name="brand">
    </div>
</form>