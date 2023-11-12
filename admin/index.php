<?php 
include('../config/connection.php');
include('functions/commen-function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <!-- FontAwosom       -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
<?php
    if(isset($_SESSION['adminuser'])){
       
        ?>
  
<div class="container-fluid">
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">LOGO</a>            
                    <div class="navbar navbar-expand-lg">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class=" active btn btn-dark" aria-current="page" href="#">Welcom</a>
                        </li>                    
                    </ul>
                    </div>
        </div>
    </nav>


    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>


    <div class="row">
        <div class="col-md-12 bg-light p-1 d-flex align-items-center">
            <div class="p-2">
                <a href="" class="admin-img"><img src=""  alt="" width="100px"></a>
                <p class="text-dark text-center"><?php echo $_SESSION['adminuser'];?></p>
            </div>
            <div class="button text-center">
                <button class="btn btn-outline-dark "><a href="insert-product.php" class="nav-link my-1">Insert Product</a></button>
                <button class="btn btn-outline-dark "><a href="index.php?view_products" class="nav-link my-1">View Product</a></button>
                <button class="btn btn-outline-dark "><a href="index.php?insert-category" class="nav-link my-1">Insert Categories</a></button>
                <button class="btn btn-outline-dark "><a href="index.php?view-categories" class="nav-link my-1">View Categories</a></button>
                <button class="btn btn-outline-dark "><a href="index.php?insert-brands" class="nav-link my-1">Insert Brands</a></button>
                <button class="btn btn-outline-dark "><a href="index.php?view-brands" class="nav-link my-1">View Brands</a></button>
                <button class="btn btn-outline-dark "><a href="index.php?list-orders" class="nav-link my-1">all Order</a></button>
                <button class="btn btn-outline-dark "><a href="index.php?list-payment" class="nav-link my-1">All payment</a></button>
                <button class="btn btn-outline-dark "><a href="index.php?list-user" class="nav-link my-1">List Users</a></button>
                <button class="btn btn-outline-dark "><a href="../logout.php" class="nav-link my-1">LogOut</a></button>
            </div>
        </div>
        <div class="col-md-12">
                    
    <?php
    if(isset($_SESSION['NotFound'])){
        echo $_SESSION['NotFound'];
        unset($_SESSION['NotFound']);
    }
    if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    
       if(isset($_SESSION['add-product'])){
        echo $_SESSION['add-product']; 
        unset($_SESSION['add-product']);//removing session message 
      }
        
    ?>

        </div>
    </div>

  

    <div class="container my-5">
        <?php
        if(isset($_GET['insert-category'])){
            include('insert-category.php');
        }
        if(isset($_GET['insert-brands'])){
            include('insert-brands.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_product'])){
            include('edit_product.php');
        }
        if(isset($_GET['delete-product'])){
            include('delete-product.php');
        }
        if(isset($_GET['view-brands'])){
            include('view-brands.php');
        }
        if(isset($_GET['view-categories'])){
            include('view-categories.php');
        }
        if(isset($_GET['edit-category'])){
            include('edit-category.php');
        }
        if(isset($_GET['edit-brand'])){
            include('edit-brand.php');
        }
        if(isset($_GET['delete-brand'])){
            include('delete-brand.php');
        }
        if(isset($_GET['delete-category'])){
            include('delete-category.php');
        }
        if(isset($_GET['list-orders'])){
            include('list-orders.php');
        }
        if(isset($_GET['delete-orders'])){
            include('delete-orders.php');
        }
        if(isset($_GET['list-payment'])){
            include('list-payment.php');
        }
        if(isset($_GET['list-user'])){
            include('list-user.php');
        }


        
        

        

        
        
        ?>
    </div>





</div>



<?php include('../config/footer.php');

}else{
    header("Location:admin-registriation.php");
}

    
?>