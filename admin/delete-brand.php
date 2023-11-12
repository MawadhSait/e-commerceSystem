<?php
if(isset($_GET['delete-brand'])){
   $id = $_GET['delete-brand'];

    $sqlDelete = "DELETE FROM brand WHERE brand_id=$id";
     $resDelete = mysqli_query($conn,$sqlDelete);
    if($resDelete){
     echo '<div class="alert alert-success"> The Brand is deleted</div>';
     echo "<script>window.open('index.php','_self')</script>";
    
    }else{
        echo "<script>window.open('index.php','_self')</script>";
    }
}


?>