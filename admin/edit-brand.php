<?php 
if(isset($_GET['edit-brand'])){
   echo $id_brand = $_GET['edit-brand'];
   $sql_get = "SELECT * FROM brand WHERE brand_id=$id_brand";
   $res_get = mysqli_query($conn,$sql_get);
   $row_get = mysqli_fetch_array($res_get);

   $brand_name=$row_get['brand_name'];
}


?>

<form action="" method="POST">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-light">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control p-2" value='<?php echo  $brand_name?>' name="brand_name">
    </div>
    <br>
    <div class="input-group w-10 mb-2">
        <input type="submit" class="btn btn-dark p-2" value="Update Brand" name="update_brand">
    </div>
</form>



<?php 

if(isset($_POST['update_brand'])){
    $brand_name = mysqli_escape_string($conn,$_POST['brand_name']);
    $sql = "SELECT * FROM brand WHERE brand_name='$brand_name'";
    $res = mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
   
    if($count>0){
        $_SESSION['NotFound']='<div class="alert alert-warning" role="alert"> The Brand name is exist</div>'; 
       // header('Location:http://localhost/ECommerceSystem/admin/');   // return error message if category name already
    }else{
        $sql1="UPDATE `brand` SET `brand_name`='$brand_name' WHERE `brand_id` = $id_brand";
       $res1 = mysqli_query($conn,$sql1);
       
       if($res1==true){
        $_SESSION['add']='<div class="alert alert-success" role="alert"> The Brand is Updates</div>'; 
        header('Location:http://localhost/ECommerceSystem/admin/index.php?view-brands'); // return error message if category name already
        }else{
            $_SESSION['add']='<div class="alert alert-warning" role="alert"> The Brand is NOT Updates</div>'; 
            header('Location:http://localhost/ECommerceSystem/admin/index.php?view-brands'); 
        }
    }
}
?>