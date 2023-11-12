<?php
include('config/connection.php');
include('functions/commen-function.php');

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];

}

$user_ip = getIP();
$total = 0;
$sql_cart = "SELECT * FROM cart WHERE ip_address='$user_ip'";
$res=mysqli_query($conn,$sql_cart);
$invoice_number = mt_rand();
$status='pending';
$count_product = mysqli_num_rows($res);
while($row_price = mysqli_fetch_array($res)){
    $product_id = $row_price['product_id'];
    $sql_cart = "SELECT * FROM product WHERE product_id=$product_id";
    $run_pricce=mysqli_query($conn,$sql_cart);
    while($row_product_price = mysqli_fetch_array($run_pricce)){
        $product_price = array($row_product_price['product_price']);
        $product_value = array_sum($product_price);
        $total+=$product_value;
    }

}

$get_cart = "SELECT * FROM cart";
$run_cart = mysqli_query($conn, $get_cart);
$get_items_qty= mysqli_fetch_array($run_cart);
$qty = $get_items_qty['qty'];
if($qty==0){
    $qty=1;
    $subtotal=$total;
}else{
    $qty = $qty;
    $subtotal =$total*$qty;
}

$date = date("Y-m-d H:i:s");
$sql_order = "INSERT INTO order_table SET
user_id=$user_id,
amount_due=$subtotal,
invoice_number=$invoice_number,
total_product=$count_product,
order_date='$date',
order_status='$status'
";
$run_order= mysqli_query($conn,$sql_order);
if($run_order){
    echo "<script>alert('Order are submmited successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}
$inser_pending_order = "INSERT INTO order_pending SET
user_id=$user_id,
invoice_number=$invoice_number,
product_id=$product_id,
qty=$qty,
order_status='$status'
";
$run_pending_order= mysqli_query($conn,$inser_pending_order);

    $empty_cart = "DELETE FROM cart WHERE ip_address='$user_ip'";
    $run_empty_cart= mysqli_query($conn,$empty_cart);
    

?>