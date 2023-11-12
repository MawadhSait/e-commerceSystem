<?php
if(isset($_GET['delete-orders'])){
   $id = $_GET['delete-orders'];

    $sqlDelete = "DELETE FROM order_table WHERE order_id = $id";
     $resDelete = mysqli_query($conn,$sqlDelete);
    if($resDelete){
     echo '<div class="alert alert-danger"> The Orrder is deleted</div>';
    // echo "<script>window.open('index.php','_self')</script>";
    
    }else{
       // echo "<script>window.open('index.php','_self')</script>";
       echo '<div class="alert alert-danger"> The Orrder is deleted</div>';
    }
}


?>