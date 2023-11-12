<?php
include('./config/connection.php');

function get_brands(){
    global $conn;
    
    $sql1 = "SELECT * FROM brand";
    $res1 = mysqli_query($conn, $sql1);
    while($row1=mysqli_fetch_assoc($res1)){
    $Btitle = $row1['brand_name'];
    $bId = $row1['brand_id'];
    echo "<li class='nav-item'>
            <a href='index.php?brand=$bId' class='nav-link'> $Btitle</a>
        </li>";

            }
        }
        
function get_category(){
    global $conn;
   
            $sql2 = "SELECT * FROM categories";
            $res2 = mysqli_query($conn, $sql2);
            while($row2=mysqli_fetch_assoc($res2)){
            $Ctitle = $row2['name_category'];
            $CId = $row2['id_category'];
            echo "<li class='nav-item'>
                    <a href='index.php?category=$CId' class='nav-link'> $Ctitle</a>
                </li>";
        }
    }

function get_product_cards(){
    global $conn;
    if(!isset($_GET['category']) AND !isset($_GET['brand']) AND !isset($_GET['search_data'])){
       
    $sql_card = "SELECT * FROM product";
    $res_card = mysqli_query($conn,$sql_card);
    while ($row3=mysqli_fetch_assoc($res_card)) {
        $product_id =$row3['product_id'] ;
        $product_title =$row3['product_name'] ;
        $product_description =$row3['product_description'] ;
        $product_category = $row3['category_id'] ;
        $product_brand = $row3['brand_id'] ;
        $product_price = $row3['product_price'] ;
        $product_img = $row3['product_img1'] ;
      echo "
      <div class='col-md-4 '>
        <div class='card mb-2'>
            <img src='admin/product-img/$product_img' class='card-img-top' alt='...'>
            <div class='card-body'>
                <h5 class='card-title'> $product_title </h5>
                <p class='card-text'>$product_description <br> $product_price $</p>
                <a href='index.php?add-cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
        </div>       
    </div>
      ";
            }
    }
}



function get_uniq_category(){
    if(isset($_GET['category'])){
        global $conn;
        $category_id =$_GET['category']; 

            $sql_card = "SELECT * FROM product WHERE category_id = $category_id";
            $res_uniqe = mysqli_query($conn,$sql_card);
            $count = mysqli_num_rows($res_uniqe);
            if($count>0){
                while ($row_uniq = mysqli_fetch_assoc($res_uniqe)) {
                    $product_id =$row_uniq['product_id'] ;
                    $product_title =$row_uniq['product_name'] ;
                    $product_description =$row_uniq['product_description'] ;
                    $product_category = $row_uniq['category_id'] ;
                    $product_brand = $row_uniq['brand_id'] ;
                    $product_price = $row_uniq['product_price'] ;
                    $product_img = $row_uniq['product_img1'] ;
                  echo "
                  <div class='col-md-4 '>
                    <div class='card mb-2'>
                        <img src='admin/product-img/$product_img' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'> $product_title </h5>
                            <p class='card-text'>$product_description <br> $product_price  $</p>
                            <a href='index.php?add-cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>       
                </div>
                  ";
                }
            }else{
                echo '<div class="text-center text-danger"> There is no data to display</div>';
            }
            
    }
}

function get_uniq_brand(){
    if(isset($_GET['brand'])){
        global $conn;
        $brand_id =$_GET['brand']; 

            $sql_card = "SELECT * FROM product WHERE brand_id = $brand_id";
            $res_uniqe = mysqli_query($conn,$sql_card);
            $count = mysqli_num_rows($res_uniqe);
            if($count>0){
                while ($row_uniq = mysqli_fetch_assoc($res_uniqe)) {
                    $product_id =$row_uniq['product_id'] ;
                    $product_title =$row_uniq['product_name'] ;
                    $product_description =$row_uniq['product_description'] ;
                    $product_category = $row_uniq['category_id'] ;
                    $product_brand = $row_uniq['brand_id'] ;
                    $product_price = $row_uniq['product_price'] ;
                    $product_img = $row_uniq['product_img1'] ;
                  echo "
                  <div class='col-md-4 '>
                    <div class='card mb-2'>
                        <img src='admin/product-img/$product_img' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'> $product_title </h5>
                            <p class='card-text'>$product_description <br> $product_price  $</p>
                            <a href='index.php?add-cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>       
                </div>
                  ";
                }
            }else{
                echo '<div class="text-center text-danger"> There is no data to display</div>';
            } 
    }
}


function search_product(){
    global $conn;
    if (isset($_GET["search_data"])) {
        $search_word = $_GET["search_data"];
        $sql_search = "SELECT * FROM product WHERE 	product_keywords LIKE '%$search_word%'";
        $res_card = mysqli_query($conn,$sql_search);
        $count_search = mysqli_num_rows($res_card);
        if($count_search>0){
            while ($row3=mysqli_fetch_assoc($res_card)) {
                $product_id =$row3['product_id'] ;
                $product_title =$row3['product_name'] ;
                $product_description =$row3['product_description'] ;
                $product_category = $row3['category_id'] ;
                $product_brand = $row3['brand_id'] ;
                $product_price = $row3['product_price'] ;
                $product_img = $row3['product_img1'] ;
              echo "
              <div class='col-md-4 '>
                <div class='card mb-2'>
                    <img src='admin/product-img/$product_img' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'> $product_title </h5>
                        <p class='card-text'>$product_description <br> $product_price  $ </p>
                        <a href='index.php?add-cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    </div>
                </div>       
            </div>
              ";
            }
        }else{
            $_SESSION['search-data']='<h3 class="text-center text text-danger " role="alert"> There is no data match</h3>'; 
            header('Location:http://localhost/ECommerceSystem/'); // return error message if category name already
             
          }
  }
}



function more_details(){
    global $conn;
    if(isset($_GET["product_id"])){
        $product_id = $_GET["product_id"];
        $sql_card = "SELECT * FROM product WHERE product_id = $product_id";
        $res_more = mysqli_query($conn,$sql_card);
        $count = mysqli_num_rows($res_more);
        if($count>0){
            while ($row_uniq = mysqli_fetch_assoc($res_more)) {
                $product_id =$row_uniq['product_id'] ;
                $product_title =$row_uniq['product_name'] ;
                $product_description =$row_uniq['product_description'] ;
                $product_category = $row_uniq['category_id'] ;
                $product_brand = $row_uniq['brand_id'] ;
                $product_price = $row_uniq['product_price'] ;
                $product_img1 = $row_uniq['product_img1'] ;
                $product_img2 = $row_uniq['product_img2'] ;
                $product_img3 = $row_uniq['product_img3'] ;
              echo "
              <div class='col-md-4 '>
                <div class='card mb-2'>
                    <img src='admin/product-img/$product_img1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'> $product_title </h5>
                        <p class='card-text'>$product_description <br> $product_price  $</p>
                        <a href='index.php?add-cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                    </div>
                </div>       
            </div>

            <div class='col-md-8'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center text-info mb-5'>Relaeted Products</h4>
                    </div>
                    <div class='col-md-6'>
                        <img src='admin/product-img/$product_img2'class='card-img-top' alt=''>
                    </div>
                    <div class='col-md-6'>
                        <img src='admin/product-img/$product_img3'class='card-img-top' alt=''>
                    </div>
                </div>
            </div>

              ";
            }
        }
    }   

}


function getIP(){
    
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
   
}


function addToCart(){
    global $conn;
    if(isset($_GET['add-cart'])){
        $ip = getIP();
        $product_id=$_GET['add-cart'];
        $sql="SELECT * FROM cart WHERE product_id=$product_id AND ip_address='$ip'";
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0){
            $_SESSION['add-cart']='<div class="alert alert-warning" role="alert"> The item is existe</div>'; 
             header('Location:http://localhost/ECommerceSystem/'); // return error message if category name already
            
        }else{
            $insert_query="INSERT INTO cart SET product_id='$product_id', ip_address='$ip',qty=1";
            $result=mysqli_query($conn,$insert_query);
            $_SESSION['add-cart']='<div class="alert alert-success" role="alert"> The item is  Added</div>'; 
           header('Location:http://localhost/ECommerceSystem/'); // return error message if category name already
        }
    }
}

function cartItem(){
    
    if(isset($_GET['add-cart'])){
        global $conn;
        $ip = getIP();
        
        $sql="SELECT * FROM cart WHERE ip_address='$ip'";
        $result=mysqli_query($conn,$sql);
        $count_cart = mysqli_num_rows($result);
         
            
    }else{
        global $conn;
        $ip = getIP();
        $sql="SELECT * FROM cart WHERE ip_address='$ip'";
        $result=mysqli_query($conn,$sql);
        $count_cart = mysqli_num_rows($result);
        }

        echo $count_cart;
}


function totalCartPrice(){
    global $conn;
    $ip = getIP();
    $total = 0;
    $cart_query = "SELECT * FROM cart WHERE ip_address='$ip'";
    $result= mysqli_query($conn,$cart_query);
    while($row = mysqli_fetch_array($result)){
        $product_id =$row['product_id'];
        $product_select = "SELECT * FROM product WHERE product_id = $product_id";
        $result_product = mysqli_query($conn, $product_select);
        while ($row_product=mysqli_fetch_array($result_product)){
            $price=array($row_product['product_price']);
            $product_values= array_sum($price);
            $total+=$product_values;

        }
    }
echo $total;
}




function get_order_user(){
    global $conn;
    $username= $_SESSION['username'];
    $get_details = "SELECT * FROM user_table WHERE username='$username'";
    $result_query= mysqli_query($conn,$get_details);
    while($row_query=mysqli_fetch_assoc($result_query)){
        $user_id = $row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_order'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders = "SELECT * FROM order_table WHERE user_id=$user_id AND order_status='pending'";
                    $result_order= mysqli_query($conn,$get_orders);
                    $row_count_orders = mysqli_num_rows($result_order);
                    if($row_count_orders>0){
                        echo "<h3 class='text-center text-success mt-5 mb-2'> You have <span class='text-danger'>$row_count_orders</span> Pending Orders </h3>";
                    }else{
                        echo "<h3 class='text-center text-success mt-5 mb-2'> You have NOT any Pending Orders </h3>";  
                    }
                }
            }
        }
    }
}

?>