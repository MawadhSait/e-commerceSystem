<?php include('config/connection.php');
include('functions/commen-function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- FontAwosom       -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
 <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">LOGO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>

                <?php
                if(isset($_SESSION['username'])){
                    echo "
                    <li class='nav-item px-2'>
                        <a href='logout.php' class='nav-link'>Logout</a>
                    </li>";
                }else{
                    echo "
                    <li class='nav-item px-2'>
                        <a href='user_login.php' class='nav-link'>Login</a>
                    </li>";
                    echo "
                    <li class='nav-item px-2'>
                        <a href='user_register.php' class='nav-link'>Register</a>
                    </li>";
                    
                }
                ?>
                <li class="nav-item">
                     <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cartItem(); ?></sup></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Total price</a>
                </li>
                

            </ul>

            <form class="d-flex" role="search" action="<?php search_product();?>" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"name="search_data">
               <input type="submit" name="search_product" value="Search" class="btn btn-outline-dark">
            </form>
            </div>
        </div>
    </nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    <?php
        if(isset($_SESSION['username'])){
            echo "
            <li class='nav-item px-2'>
                 <a href='profile.php' class='nav-link'> Welcome " . $_SESSION['username'];"</a>
            </li>";
        }else{
            echo "
            <li class='nav-item px-2'>
                 <a href='user_login.php' class='nav-link'>Login</a>
            </li>";
        }
        ?>
    </ul>

</nav>

<div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communcations is at the heart of e-commerce and community</p>
</div>
<?php
if(isset($_SESSION['search-data'])){
    echo $_SESSION['search-data'];
    unset($_SESSION['search-data']);
}
?>

<div class="row m-1">
    <div class="col-md-10">
        <!--Products -->
        <div class="row">
            
            <?php
            search_product();
            more_details();
        get_uniq_category();

        get_uniq_brand();
            ?>
        </div>
    </div>

    <div class="col-md-2 bg-light">
        <!--SideBar -->
        <div class="navbar-nav me-auto text-center">
        <li class="nav-item">
            <a href="#" class="nav-link"><h4>Brand</h4></a>
        </li>
        <?php get_brands();?>
        </div>

        <div class="navbar-nav me-auto text-center">
            <li class="nav-item">
                <a href="#" class="nav-link"><h4>Categories</h4></a>
            </li>
            <?php get_category();?>
        </div>
    </div>
</div>



<?php include('config/footer.php');?>