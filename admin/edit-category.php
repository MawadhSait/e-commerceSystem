<?php 
if(isset($_GET['edit-category'])){
   echo $id_cat = $_GET['edit-category'];
   $sql_get = "SELECT * FROM categories WHERE id_category=$id_cat";
   $res_get = mysqli_query($conn,$sql_get);
   $row_get = mysqli_fetch_array($res_get);

   $category_name=$row_get['name_category'];
}


?>

<form action="" method="POST">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-light">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control p-2" value='<?php echo $category_name?>' name="cat_name">
    </div>
    <br>
    <div class="input-group w-10 mb-2">
        <input type="submit" class="btn btn-dark p-2" value="Update Category" name="update_category">
    </div>
</form>



<?php 

if(isset($_POST['update_category'])){
    $cat_name = mysqli_escape_string($conn,$_POST['cat_name']);
    $sql = "SELECT * FROM categories WHERE name_category='$cat_name'";
    $res = mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
   
    if($count>0){
        $_SESSION['NotFound']='<div class="alert alert-warning" role="alert"> The category name is exist</div>'; 
       // header('Location:http://localhost/ECommerceSystem/admin/');   // return error message if category name already
    }else{
        $sql1="UPDATE `categories` SET `name_category`='$cat_name' WHERE `id_category` = $id_cat";
       $res1 = mysqli_query($conn,$sql1);
       
       if($res1==true){
        $_SESSION['add']='<div class="alert alert-success" role="alert"> The category is Updates</div>'; 
        header('Location:http://localhost/ECommerceSystem/admin/index.php?view-categories'); // return error message if category name already
        }else{
            $_SESSION['add']='<div class="alert alert-warning" role="alert"> The category is NOT Updates</div>'; 
            header('Location:http://localhost/ECommerceSystem/admin/index.php?view-categories'); 
        }
    }
}
?>