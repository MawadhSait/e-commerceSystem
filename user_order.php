<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
</head>
<body>

<?php 
    $username = $_SESSION['username'];
    $get_users = "SELECT * FROM user_table WHERE username='$username'";
    $result= mysqli_query($conn,$get_users);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];
    


?>

<h3 class='text-center mt-4'>All my Orders</h3>
<table class='table table-bordered mt-5'>
    <thead class='bg-light'>
        <tr>
            <th>SN</th>
            <th>Amount Due</th>
            <th>Total Price</th>
            <th>Invoice Number</th>
            <th>Date</th>
            <th>Complete/Incomplete</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sn=0;
        $get_orders_details = "SELECT * FROM order_table WHERE user_id=$user_id";
        $run_order = mysqli_query($conn,$get_orders_details);
        $count_order = mysqli_num_rows($run_order);
        if($count_order>0){
            while ($row_order=mysqli_fetch_array($run_order)){
                $order_id = $row_order['order_id'];
                $amount_due = $row_order['amount_due'];
                $invoice_number = $row_order['invoice_number'];
                $total_product = $row_order['total_product'];
                $order_date = $row_order['order_date'];
                $order_status = $row_order['order_status'];
                $sn++;
                if($order_status=='pending'){
                    $order_status = 'Incomplete';
                }else{
                    $order_status = 'complete';
                }
            echo"
            <tr>
                <td>$sn</td>
                <td>$amount_due</td>
                <td>$total_product</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>";
    
                if($order_status=="complete"){
                echo "<td> Paid </td>";
                }else{
                echo"
                    <td><a href='confirm_payment.php?order_id=$order_id' class='text-dark'>Confirm</td>
                </tr>";
                }
    
              
        }
        }else{
            echo "<h1 class='text-danger'> No order Found</h1>";
        }

    ?>
    </tbody>
</table>
    
</body>
</html>