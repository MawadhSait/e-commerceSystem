<?php include('config/connection.php');
include('functions/commen-function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    $user_ip = getIP();
    $get_user = "SELECT * FROM user_table WHERE user_ip='$user_ip'";
    $result = mysqli_query($conn,$get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];
?>
<div class="container">
    <h2 class="text-center text-info"style='overflow-y:hidden;'>Payment Options</h2>
    <div class="row d-flex justify-content-center align-items-center my-5">
        <div class="col-md-6">
            <a href="https://paypal.com" target="_blank" > <img src="admin/product-img/download.jpg" width="100%" alt=""></a>
        </div>
        <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id; ?>"> <h2 class="text-center"style='overflow-y:hidden;'>Pay Offline</h2></a>
        </div>
    </div>
</div>
    
<?php
include('config/footer.php');
?>