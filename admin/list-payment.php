<h3 class='text-center text-success'>All Payments</h3>

<table class="table table-border">
    
        <?php 

        $sql_order = 'SELECT * FROM user_payment';
        $result_order = mysqli_query($conn, $sql_order);
        $count = mysqli_num_rows($result_order);
        $sn=1;
        if($count>0){
            echo "
            <thead class='bg-light'>
            <tr>
            
                <th>SN</th>
                <th>Order_id</th>
                <th>Invoice number</th>
                <th>Amount</th>
                <th>Order Date</th>
                <th>Payment Mode</th>
                <th>Delete</th>
            </tr>
            </thead>
            ";

            while($row =mysqli_fetch_array($result_order)){
                $payment_id =$row['payment_id'];
                $order_id = $row['order_id'];
                $amount = $row['amount'];
                $invoice_number = $row['invoice_number'];
               
                $date =$row['date'];
                $mode = $row['payment_mood'];
                
                ?>
            <tbody class='bg-light'>
                <tr>
                
                <td><?php echo $sn++?></td>
                <td><?php echo $order_id ?></td>
                <td><?php echo $invoice_number ?></td>
                <td><?php echo $amount ?></td>
                <td><?php echo $date ?></td>
                <td><?php echo $mode ?></td>
                <td><a href="index.php?delete-orders=<?php echo $payment_id?>" 
                class='text-dark' type='button'  data-toggle='modal' data-target='#paymentDelete'>
                <i class='fa-solid fa-trash'></i></a></td>
    

                </tr>
              
            </tbody>


                <?php

            }
        }else{
            echo "No Orders Yet";
        }
        ?>
        
    
    
</table>



<!--  modal -->
<div class="modal fade" id="paymentDelete" tabindex="-1" role="dialog" aria-labelledby="paymentDelete" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Are you sure want to delete the Orders?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list-orders.php" class='text-light text-decoration-none'>NO</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?delete-payment=<?php echo $order_id?>" class='text-light text-decoration-none'> YES </a></button>
      </div>
    </div>
  </div>
</div>