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
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cartItem(); ?></sup></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav ">
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
    <h3 class="text-center"style='overflow-y:hidden;'>Hidden Store</h3>
    <p class="text-center">Communcations is at the heart of e-commerce and community</p>
</div>
<div class="container">
    <div class="row">
        <br>
        <?php
if(isset($_SESSION['delete-cart'])){
    echo $_SESSION['delete-cart'];
    unset($_SESSION['delete-cart']);
}

?>
        <br>
        <form action="" method="POST">
        <table class="table table-border text-center">
            
            <?php
                    global $conn;
                    $ip = getIP();
                    $total = 0;
                    $cart_query = "SELECT * FROM cart WHERE ip_address='$ip'";
                    $result= mysqli_query($conn,$cart_query);
                    $count_result = mysqli_num_rows($result);
                    if($count_result>0){  
                        echo "
                        <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity </th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operations</th>
                            </tr>
                        </thead>
                        ";
                        
                    while($row = mysqli_fetch_array($result)){
                        $product_id =$row['product_id'];
                        $product_select = "SELECT * FROM product WHERE product_id = $product_id";
                        $result_product = mysqli_query($conn, $product_select);
                        while ($row_product=mysqli_fetch_array($result_product)){
                            $table_price=$row_product['product_price'];
                            $product_price=array($row_product['product_price']);
                            $product_title=$row_product['product_name'];
                            $product_img1=$row_product['product_img1'];
                            $product_img2=$row_product['product_img2'];
                            $product_img3=$row_product['product_img3'];
                            $product_values= array_sum($product_price);
                            $total+=$product_values;
            ?>
            <tbody>
                <tr>
                    <td><?php echo $product_title; ?></td>
                    <td>
                        <img src="admin/product-img/<?php echo $product_img1;?>"style="object-fit:contain;" alt="product image" width="50px" height="50px">
                    </td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <?php
                        $ip = getIP();
                        if(isset($_POST['qty'])){
                            $qty = intval($_POST['qty']);
                            $sql_update = "UPDATE cart SET qty = $qty WHERE ip_address = '$ip'";
                            $result_product_qty = mysqli_query($conn, $sql_update);
                            $total = $total* $qty;
                        }
                        
                    ?>
                    <td><?php echo  $table_price;?></td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>"></td>
                    <td colspan="2">
                    <input type="submit" name="Update_cart" value="Update" class=" border-0 rounded-3 bg-info px-3 py-2 mx-3">
                    <input type="submit" name="remove_cart" value="Remove" class=" border-0 rounded-3 bg-info px-3 py-2 mx-3">
                     </td>
                </tr>
                <?php }
                }
                
            }else{
                echo "<h3 class='text-center text-danger'> The Cart is empty </h3>";
            }?>
            </tbody>

        </table>
        <?php
        
        $ip = getIP();
        $cart_query = "SELECT * FROM cart WHERE ip_address='$ip'";
        $result= mysqli_query($conn,$cart_query);
        $count_result = mysqli_num_rows($result);
        if($count_result>0){  
            echo "<div class='d-flex mb-5'>
                    <h4 class='px-3 m-2'style='overflow-y:hidden;'> Subtotal: <strong class='text-info'> $total $</strong></h4>
                    <input type='submit' value='Countiue Shopping' class='bg-info px-3 py-2 border-0 mx-3 rounded-3' name='continue_shopping'>
                    <button class='btn bg-secondary m-1' style='height: fit-content;'> <a href='checkout.php' class='text-light text-decoration-none'> CheckOut </a> </button>
                </div>";

        }else{
                echo " <input type='submit' value='Countiue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
        }

        if(isset($_POST['continue_shopping'])){
            header('location:index.php');
        }
?>  
       

        <?php
         function removeCartItem(){
            global $conn;
            if(isset($_POST['remove_cart'])){
                foreach($_POST["removeitem"] as $remove_id){
                    
                    
                    $delete_query = "DELETE FROM cart WHERE product_id=$remove_id";
                    $run_delete = mysqli_query($conn,$delete_query);
                    if($run_delete){
                        $_SESSION['delete-cart']='<div class="alert alert-success" role="alert"> The item is deleted</div>'; 
                       // header('Location:http://localhost/ECommerceSystem/index.php'); // return error message if category name already
                       
                    }else{
                        $_SESSION['delete-cart']='<div class="alert alert-success" role="alert"> The item is not deleted</div>'; 
                      //  header('Location:http://localhost/ECommerceSystem/'); // return error message if category name already
                    }
                }
            }
         }

            echo $removeItems = removeCartItem();

        ?>
        
 
    </div>
</div>
</form>



<?php include('config/footer.php');?>