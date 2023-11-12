<?php
if(isset($_GET['delete-category'])){
   $id = $_GET['delete-category'];

    $sqlDelete = "DELETE FROM categories WHERE id_category=$id";
     $resDelete = mysqli_query($conn,$sqlDelete);
    if($resDelete){
     echo '<div class="alert alert-success"> The Category is deleted</div>';
     echo "<script>window.open('index.php','_self')</script>";
    
    }else{
        echo "<script>window.open('index.php','_self')</script>";
    }
}


?>