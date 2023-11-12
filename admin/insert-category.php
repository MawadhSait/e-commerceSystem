<?php 
include('../config/connection.php');
if(isset($_POST['category'])){
    $cat_name = mysqli_escape_string($conn,$_POST['cat_name']);
    $sql = "SELECT * FROM categories WHERE name_category='$cat_name'";
    $res = mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
   
    if($count>0){
        $_SESSION['NotFound']='<div class="alert alert-warning" role="alert"> The category name is exist</div>'; 
       // header('Location:http://localhost/ECommerceSystem/admin/');   // return error message if category name already
    }else{
        $sql1="INSERT INTO categories (`name_category`) VALUES ('$cat_name')";
       $res1 = mysqli_query($conn,$sql1);
       
       if($res1==true){
        $_SESSION['add']='<div class="alert alert-success" role="alert"> The category is Added</div>'; 
        header('Location:http://localhost/ECommerceSystem/admin/'); // return error message if category name already
        }else{
            $_SESSION['add']='<div class="alert alert-warning" role="alert"> The category is NOT Added</div>'; 
            header('Location:http://localhost/ECommerceSystem/admin/'); 
        }
    }
}

?>

<form action="" method="POST">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-light">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control p-2" placeholder="Insert Category" name="cat_name">
    </div>
    <br>
    <div class="input-group w-10 mb-2">
        <input type="submit" class="btn btn-dark p-2" value="Insert Category" name="category">
    </div>
</form>