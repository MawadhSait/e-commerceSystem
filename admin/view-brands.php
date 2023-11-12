<h3 class='text-center text-success'>ALL Brands</h3>
<table class='table table-bordered mt-5 text-center'>
    <thead class='bg-light'>
        <tr>
            <th>SN</th>
            <th>Brand Title</th>
            <th>Edit </th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    
    $sn = 0;
    $sql = "SELECT * FROM brand";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) >0){
        while($row=mysqli_fetch_array($res)){
            $id = $row['brand_id'];
            $title = $row['brand_name'];
            $sn++;
            echo "
            <tr>
                <td>$sn</td>
                <td>$title</td>
                <td>
                    <a href='index.php?edit-brand=$id' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a>
                </td>
                <td>
                    <a href='index.php?delete-brand=$id' type='button' class='text-dark' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i> </a>
                </td>
            </tr>
            ";
        }
    }

    ?>
        
    </tbody>

</table>


<!--  modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Are you sure want to delete the brand?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brands" class='text-light text-decoration-none'>NO</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?delete-brand=<?php echo $id?>" class='text-light text-decoration-none'> YES </a></button>
      </div>
    </div>
  </div>
</div>