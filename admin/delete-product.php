<?php
if(isset($_GET['delete-product'])){
    $id = $_GET['delete-product'];

    $sqlDelete = "DELETE FROM product WHERE product_id=$id";
    $resDelete = mysqli_query($conn,$sqlDelete);
    if($resDelete){
     echo '<div class="alert alert-success"> The Product is deleted</div>';
    
    }else{
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}


?>