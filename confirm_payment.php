<?php include('config/connection.php');
include('functions/commen-function.php');
@session_start();
if(isset($_GET['order_id'])){
$order_id = $_GET['order_id'];
echo $order_id;

$get_orders_details = "SELECT * FROM order_table WHERE order_id=$order_id";
$run_order = mysqli_query($conn,$get_orders_details);
$row_order = mysqli_fetch_array($run_order);
    $amount_due = $row_order['amount_due'];
    $invoice_number = $row_order['invoice_number'];
}

if(isset($_POST['confirm_payment'])){
    // code to confirm payment here 
    $new_invoice_number= $_POST['invoice_number'];
   $new_amount =$_POST['Amount'];
   $payment_mode =$_POST['payment_mode'];
   $date = date("Y-m-d H:i:s");

   $sql_payment= "INSERT INTO user_payment SET 
   order_id=$order_id,
   invoice_number=$new_invoice_number,
   amount='$new_amount',
   payment_mood='$payment_mode',
   date='$date'";
   $run_payment = mysqli_query($conn,$sql_payment);
   if($run_payment){
    $get_orders_update = "UPDATE order_table SET order_status='complete' WHERE order_id=$order_id";
    $run_order_update = mysqli_query($conn,$get_orders_update);
    echo "<script>alert('Payment Confirmed Successfully')</script>";
    echo "<script>window.open('profile.php?my_orders','_self')</script>";
   }
  

   

   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
   
    <title>COnfirm Payment</title>
</head>
<body class="mt-3 bg-light">


<h3 class="text-center"> Confirm Payment</h3>

<form action="" method="POST" class="text-center">
                <div class="form-outline mb-4">
                    <input type="text" name="invoice_numberDisable" disabled class="form-control w-50 m-auto"  value="<?php echo $invoice_number;?>"/>
                    <input type="hidden" name="invoice_number" class="form-control w-50 m-auto"  value="<?php echo $invoice_number;?>"/>
                </div>

                <div class="form-outline mb-4">
                    <label for="" class="form-label">Amount</label>
                    <input type="text" name="AmountDisable" disabled class="form-control w-50 m-auto" value="<?php echo $amount_due;?>"/>
                    <input type="hidden" name="Amount" class="form-control w-50 m-auto" value="<?php echo $amount_due;?>"/>
                </div>

                <div class="form-outline  w-50 m-auto">
                    <select name="payment_mode" id="" class="form-select">
                        <option value="">Select Mode of payment</option>
                        <option value="cash">Cash</option>
                        <option value="cash">UPI</option>
                        <option value="cash">Netbanking</option>
                        <option value="cash">paypal</option>
                        <option value="cash">Payoffline</option>
                    </select>
                </div>

                <div class="form-outline my-4">
                <input type="submit" name="confirm_payment" value="Confirm"class="btn btn-primary ">
                </div>
            </form>
    
    
</body>
</html>