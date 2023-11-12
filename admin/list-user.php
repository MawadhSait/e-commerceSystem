<h3 class='text-center text-success'>All Users</h3>

<table class="table table-border">
    
        <?php 

        $sql_user = 'SELECT * FROM user_table';
        $result_user = mysqli_query($conn, $sql_user);
        $count = mysqli_num_rows($result_user);
        $sn=1;
        if($count>0){
            echo "
            <thead class='bg-light'>
            <tr>
            
                <th>SN</th>
                <th>User_id</th>
                <th>Username</th>
                <th>E-mail</th>
                <th>User Address</th>
                <th>User mobile</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            ";

            while($row =mysqli_fetch_array($result_user)){
                $userid =$row['user_id'];
                $username =$row['username'];
                $email=$row['useremail'];
                $address=$row['user_address'];
                $mobile=$row['user_mobile'];
                
                
                ?>
            <tbody class='bg-light'>
                <tr>
                
                <td><?php echo $sn++?></td>
                <td><?php echo $userid ?></td>
                <td><?php echo $username ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $address ?></td>
                <td><?php echo $mobile ?></td>
                <td><a href="index.php?delete-user=<?php echo $userid?>" 
                class='text-dark' type='button'  data-toggle='modal' data-target='#userDelete'>
                <i class='fa-solid fa-trash'></i></a></td>
    

                </tr>
              
            </tbody>


                <?php

            }
        }else{
            echo "No Users Yet";
        }
        ?>
        
    
    
</table>



<!--  modal -->
<div class="modal fade" id="userDelete" tabindex="-1" role="dialog" aria-labelledby="userDelete" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Are you sure want to delete the User?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list-user.php" class='text-light text-decoration-none'>NO</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?delete-user=<?php echo $user_id?>" class='text-light text-decoration-none'> YES </a></button>
      </div>
    </div>
  </div>
</div>