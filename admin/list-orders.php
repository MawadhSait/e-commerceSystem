<h3 class='text-center text-success'>All Orders</h3>

<table class="table table-border">
    
        <?php 

        $sql_order = 'SELECT * FROM order_table';
        $result_order = mysqli_query($conn, $sql_order);
        $count = mysqli_num_rows($result_order);
        $sn=1;
        if($count>0){
            echo "
            <thead class='bg-light'>
            <tr>
            
                <th>SN</th>
                <th>Due Amount</th>
                <th>Invoice number</th>
                <th>Total product</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
            </thead>
            ";

            while($row =mysqli_fetch_array($result_order)){
                $order_id =$row['order_id'];
                $user_id = $row['user_id'];
                $due_amount = $row['amount_due'];
                $invoice_number = $row['invoice_number'];
                $total_product = $row['total_product'];
                $date =$row['order_date'];
                $status = $row['order_status'];
                
                ?>
            <tbody class='bg-light'>
                <tr>
                
                <td><?php echo $sn++?></td>
                <td><?php echo $due_amount ?></td>
                <td><?php echo $invoice_number ?></td>
                <td><?php echo $total_product ?></td>
                <td><?php echo $date ?></td>
                <td><?php echo $status ?></td>
                <td><a href="index.php?delete-orders=<?php echo $order_id?>" 
                class='text-dark' type='button'  data-toggle='modal' data-target='#OrderDelete'>
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
<div class="modal fade" id="OrderDelete" tabindex="-1" role="dialog" aria-labelledby="OrderDelete" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Are you sure want to delete the Orders?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list-orders.php" class='text-light text-decoration-none'>NO</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?delete-orders=<?php echo $order_id?>" class='text-light text-decoration-none'> YES </a></button>
      </div>
    </div>
  </div>
</div>