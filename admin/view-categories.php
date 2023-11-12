<h3 class='text-center text-success'>ALL Categories</h3>
<table class='table table-bordered mt-5 text-center'>
    <thead class='bg-light'>
        <tr>
            <th>SN</th>
            <th>Categories Title</th>
            <th>Edit </th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    
    $sn = 0;
    $sql = "SELECT * FROM categories";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) >0){
        while($row=mysqli_fetch_array($res)){
            $id = $row['id_category'];
            $title = $row['name_category'];
            $sn++;
            echo "
            <tr>
                <td>$sn</td>
                <td>$title</td>
                <td>
                    <a href='index.php?edit-category=$id' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a>
                </td>
                <td>
                    <a href='index.php?delete-category=$id' type='button' class='text-dark' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i> </a>
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
        Are you sure want to delete the Category?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_categories" class='text-light text-decoration-none'>NO</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?delete-category=<?php echo $id?>" class='text-light text-decoration-none'> YES </a></button>
      </div>
    </div>
  </div>
</div>