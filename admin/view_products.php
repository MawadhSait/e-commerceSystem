<?php



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
      <!-- FontAwosom       -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
   
    <title></title>
</head>
<body>
    
<h3 class='text-center text-success'>All Products</h3>
<table class='table table-border mt-5'>
    <thead class='bg-light'>
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image </th>
            <th>Product $price</th>
            <th>Total Sold </th>
            <th>Status </th>
            <th>Edit </th>
            <th>DELETE</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $sn = 0;
        $sql = "SELECT * FROM product";
        $res = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($res)) { 
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_img1 = $row['product_img1'];
            $product_price = $row['product_price'];
            $status = $row['status'];
            $sn++;
           ?>
            <tr>
                <td> <?php echo $sn; ?></td>
              <td> <?php echo $product_name ;?> </td>
              <td>  <img src='product-img/<?php echo $product_img1?>' alt='' width='150px'> </td>
              <td><?php echo  $product_price ?></td>
              <td>
              <?php 
                $sqlSold = "SELECT * FROM order_pending WHERE product_id=$product_id";
                $resconut = mysqli_query($conn,$sqlSold);
                echo $countSold = mysqli_num_rows($resconut);
                
              ?>
              </td>
              <td> <?php echo $status ?></td>
              <td><a href='index.php?edit_product=<?php echo $product_id?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i> </a></td>
              <td><a href='index.php?delete-product=<?php echo $product_id?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            

            <?php
        }

    ?>
    
  
    </tbody>

</table>
