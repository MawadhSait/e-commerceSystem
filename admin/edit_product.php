<?php 

if(isset($_GET['edit_product'])){
    $id = $_GET['edit_product'];
    $get_pro = "select * from product where product_id=$id";
    $run_pro = mysqli_query($conn,$get_pro);
    $row_pro=mysqli_fetch_array($run_pro);
    $pro_title =$row_pro['product_name'];
    $pro_description =$row_pro['product_description'];
    $pro_keywords =$row_pro['product_keywords'];
    $pro_category =$row_pro['category_id'];
    $pro_brand =$row_pro['brand_id'];
    $pro_img1 =$row_pro['product_img1'];
    $pro_img2 =$row_pro['product_img2'];
    $pro_img3 =$row_pro['product_img3'];
    $pro_price =$row_pro['product_price'];


    $sql_category = "SELECT * FROM categories WHERE id_category = $pro_category";
    $run_cate = mysqli_query($conn,$sql_category);
    $row_cate=mysqli_fetch_array($run_cate);
    $cat_name = $row_cate['name_category'];


    $sql_brand = "SELECT * FROM brand WHERE brand_id = $pro_brand";
    $run_brand= mysqli_query($conn,$sql_brand);
    $row_brand=mysqli_fetch_array($run_brand);
    $brand_name = $row_brand['brand_name'];
    
}

?>


<div class="container my-3">
    <h1 class="text-center">Edit Product</h1>

    <form action="" method="POST" enctype="multipart/form-data" class="my-5">
        <div class="form-outlin mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product title</label>
            <input type="text" value='<?php echo $pro_title?>' name="product_title" class="form-control" placeholder="Enter Product title" autocomplete="off"required="required"/>
        </div>

        <div class="form-outlin mb-4 w-50 m-auto">
            <label for="product_description" class="form-label">Product description</label>
            <input type="text" value='<?php echo $pro_description ?>' name="product_description" class="form-control" placeholder="Enter product description" autocomplete="off"required="required"/>
        </div>

        <div class="form-outlin mb-4 w-50 m-auto">
            <label for="product_keyword" class="form-label">Product Ketywords</label>
            <input type="text" value='<?php echo $pro_keywords ?>' name="product_keyword" class="form-control" placeholder="Enter product keyword" autocomplete="off"required="required"/>
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
                if($name_cat == $cat_name){
                    echo "<option selected value='$name_cat' >$name_cat</option>";
                }else{
                    echo " <option value='$id_cat'>$name_cat</option>";
                }
                
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
                        if($brand_name == $name_brand){
                            echo "<option selected value='$name_brand' >$name_brand</option>";
                        }else{
                            echo " <option value='$id_brand'>$name_brand</option>";
                        }
                        
                    }
        ?>
            </select>
        </div>

        <div class="input-group mb-4 form-outlin w-50 m-auto">
        <label class="input-group-text" for="img1">Upload image 1</label>
        <div class="d-flex">
                <input type="file" name="img1" class="form-control" >
                <img src="product-img/<?php echo $pro_img1?>" alt="" width='150px'>
            </div>
        </div>
<br>
        <div class="input-group mb-4 form-outlin w-50 m-auto">
            <label class="input-group-text" for="img2">Upload image 2</label>
            <div class="d-flex">
                <input type="file" name="img2" class="form-control" >
                <img src="product-img/<?php echo $pro_img1?>" alt="" width='150px'>
            </div>
        </div>
<br>
        <div class="input-group mb-4 form-outlin w-50 m-auto">
            <label class="input-group-text" for="img3">Upload image 3</label>
            <div class="d-flex">
                <input type="file" name="img3" class="form-control" >
                <img src="product-img/<?php echo $pro_img1?>" alt=""width='150px'>
            </div>
        </div>
<br>
        <div class="form-outlin mb-4 w-50 m-auto">
            <label for="Price" class="form-label">Product Price</label>
            <input type="text" value='<?php echo $pro_price?>' name="product_price" class="form-control" placeholder="Enter product Price" autocomplete="off"required="required"/>
        </div>

        <div class="form-outlin mb-4 w-50 m-auto">
            <input type="hidden" name='id_product' value='<?php echo $id?>'>
            <input type="submit"  class="form-control btn btn-outline-dark"value="Edite product" name="Edite_product"/>
        </div>
        
    </form>
</div>

<?php 


if(isset($_POST['Edite_product'])){
    $id_pro =$_POST['id_product'] ;
    $product_title =$_POST['product_title'] ;
    $product_description =$_POST['product_description'] ;
    $product_keyword = $_POST['product_keyword'] ;
    $product_category = $_POST['product_category'] ;
    $product_brand = $_POST['product_brand'] ;
    $product_price = $_POST['product_price'] ;
    
 
     $img1 = $_FILES['img1']['name'];
     $img2 = $_FILES['img2']['name'];
     $img3 = $_FILES['img3']['name'];
  
    $tmp_img1 = $_FILES['img1']['tmp_name'];
    $tmp_img2 = $_FILES['img2']['tmp_name'];
    $tmp_img3 = $_FILES['img3']['tmp_name'];
    
  
 
    if($product_title=='' or $product_description=='' or $product_keyword=='' 
         or $product_category=='' or $product_brand=='' or $product_price==''or
         $img1 =='' or $img2=='' or $img3=='' ){
            echo "<script>alert('Please fill all fields')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
          /*  $product_title=$pro_title ;
            $product_description= $pro_description ;
            $product_keyword=  $pro_keywords ;
            $product_category= $pro_category ;
            $product_brand= $pro_brand ;
            $img1= $pro_img1;
            $img2 =$pro_img2;
            $img3= $pro_img3 ;
            $product_price= $pro_price ;*/

            
             
    }else{
       
        move_uploaded_file($tmp_img1,"product-img/$img1");
        move_uploaded_file($tmp_img2,"product-img/$img2");
        move_uploaded_file($tmp_img3,"product-img/$img3");
      
 
    $dateNow = date("Y-m-d h:i:sa");
 
    $sql_update = "UPDATE product SET
     product_name='$product_title',
     product_description='$product_description',
     product_keywords='$product_keyword',
     category_id=$product_category,
     brand_id=$product_brand,
     product_img1='$img1',
     product_img2='$img2',
     product_img3='$img3',
     product_price=$product_price
     WHERE product_id=$id";
 
    $res_updte = mysqli_query($conn,$sql_update);
 
    if($res_updte==true){
            
    // $_SESSION['update-product']='<div class="alert alert-success"> The Product is Added</div>'; 
    // echo '<div class="alert alert-success"> The Product is Updated</div>';
     //echo "<script>window.open('index.php?view_products','_self')</script>";
     }else{
        echo"DDD";
       // echo '<div class="alert alert-warning" role="alert"> The Product is NOT Updated</div>'; 
        // $_SESSION['update-product']='<div class="alert alert-warning" role="alert"> The Product is NOT Added</div>'; 
      //  echo "<script>window.open('index.php?view_products','_self')</script>";
     }
     
    }
    
 
 
 }
 

?>