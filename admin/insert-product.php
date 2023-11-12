<?php include('../config/connection.php'); 


if(isset($_SESSION['empty'])){
    echo $_SESSION['empty'];
    unset($_SESSION['empty']);
}


if(isset($_POST['inser_product'])){
   $product_title =$_POST['product_title'] ;
   $product_description =$_POST['product_description'] ;
   $product_keyword = $_POST['product_keyword'] ;
   $product_category = $_POST['product_category'] ;
   $product_brand = $_POST['product_brand'] ;
   $product_price = $_POST['product_price'] ;
   $product_status='true';

    $img1 = $_FILES['img1']['name'];
    $img2 = $_FILES['img2']['name'];
    $img3 = $_FILES['img3']['name'];
 
   $tmp_img1 = $_FILES['img1']['tmp_name'];
   $tmp_img2 = $_FILES['img2']['tmp_name'];
   $tmp_img3 = $_FILES['img3']['tmp_name'];
   
     move_uploaded_file($tmp_img1,"product-img/$img1");
    move_uploaded_file($tmp_img2,"product-img/$img2");
    move_uploaded_file($tmp_img3,"product-img/$img3");
  

   if($product_title=='' or $product_description=='' or $product_keyword=='' 
        or $product_category=='' or $product_brand=='' or $product_price==''or
        $img1 =='' or$img2=='' or $img3=='' ){
            $_SESSION['empty']='<div class="alert alert-warning" role="alert"> All fields must not be empty</div>'; 
            exit();
   }else{

$dateNow = date("Y-m-d h:i:sa");

   $sql_insert = "INSERT INTO product SET
    product_name='$product_title',
    product_description='$product_description',
    product_keywords='$product_keyword',
    category_id=$product_category,
    brand_id=$product_brand,
    product_img1='$img1',
    product_img2='$img2',
    product_img3='$img3',
    product_price='$product_price',
    date='$dateNow',
    status='$product_status'";

   $res_insert = mysqli_query($conn,$sql_insert);

   if($res_insert==true){
    $_SESSION['add-product']='<div class="alert alert-success"> The Product is Added</div>'; 
    header('Location:http://localhost/ECommerceSystem/admin'); // return error message if category name already
    }else{
        $_SESSION['add-product']='<div class="alert alert-warning" role="alert"> The Product is NOT Added</div>'; 
     header('Location:http://localhost/ECommerceSystem/admin/'); 
    }
    
   }
   


}



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
<body class="bg-light">
  


        <div class="container my-3">
            <h1 class="text-center">Insert Product</h1>
    
            <form action="" method="POST" enctype="multipart/form-data" class="my-5">
                <div class="form-outlin mb-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product title</label>
                    <input type="text" name="product_title" class="form-control" placeholder="Enter Product title" autocomplete="off"required="required"/>
                </div>

                <div class="form-outlin mb-4 w-50 m-auto">
                    <label for="product_description" class="form-label">Product description</label>
                    <input type="text" name="product_description" class="form-control" placeholder="Enter product description" autocomplete="off"required="required"/>
                </div>

                <div class="form-outlin mb-4 w-50 m-auto">
                    <label for="product_keyword" class="form-label">Product Ketywords</label>
                    <input type="text" name="product_keyword" class="form-control" placeholder="Enter product keyword" autocomplete="off"required="required"/>
                </div>

                <div class="form-outlin mb-4 w-50 m-auto">
                    <select name="product_category" class="product_category form-select">
                    <option value="" >Select Category</option>
                <?php
                    $sql1 ="SELECT * FROM categories";
                    $res1=mysqli_query($conn,$sql1);
                    while ($row1 = mysqli_fetch_assoc($res1)) {
                        $id_cat=$row1['id_category'];
                        $name_cat=$row1['name_category'];
                        echo " <option value='$id_cat'>$name_cat</option>";
                    }
                ?>
                    </select>
                </div>


                <div class="form-outlin mb-4 w-50 m-auto">
                    <select name="product_brand" class="product_brand form-select">
                    <option value=""  >Select Brand</option>
                 <?php
                        $sql2 ="SELECT * FROM brand";
                        $res2=mysqli_query($conn,$sql2);
                            while ($row2 = mysqli_fetch_assoc($res2)) {
                                $id_brand=$row2['brand_id'];
                                $name_brand=$row2['brand_name'];
                                echo " <option value='$id_brand'>$name_brand</option>";
                            }
                ?>
                    </select>
                </div>

              <div class="input-group mb-4 form-outlin w-50 m-auto">
                <label class="input-group-text" for="img1">Upload image 1</label>
                    <input type="file" name="img1" class="form-control" >
                </div>
                <div class="input-group mb-4 form-outlin w-50 m-auto">
                    <label class="input-group-text" for="img2">Upload image 2</label>
                    <input type="file" name="img2" class="form-control" >
                </div>

                <div class="input-group mb-4 form-outlin w-50 m-auto">
                <label class="input-group-text" for="img3">Upload image 3</label>
                    <input type="file" name="img3" class="form-control" >
                </div>

                <div class="form-outlin mb-4 w-50 m-auto">
                    <label for="Price" class="form-label">Product Price</label>
                    <input type="text" name="product_price" class="form-control" placeholder="Enter product Price" autocomplete="off"required="required"/>
                </div>

                <div class="form-outlin mb-4 w-50 m-auto">
                  
                    <input type="submit"  class="form-control btn btn-outline-dark"value="Insert product" name="inser_product"/>
                </div>
                
            </form>
        </div>



</body>
</html>