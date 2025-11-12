<?php
include "header.php";
include "../config.php"
    ?>


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Add Products Here....</h6>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Products Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Products Name:" name="p_name">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="c_id">
                            <option selected>Select Category------</option>
                            <?php
                            $select = "select * from category";
                            $result = mysqli_query($conn, $select);
                            while ($row = mysqli_fetch_array($result))
                             {
                            ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['c_name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Products Description:</label>
                        <input type="text" class="form-control" placeholder="Enter Products Description:" name="p_desc">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Products Price:</label>
                        <input type="text" class="form-control" placeholder="Enter Products Price:" name="p_price">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Products Quantity:</label>
                        <input type="text" class="form-control" placeholder="Enter Products Quantity:" name="p_qty">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Products Image:</label>
                        <input type="file" class="form-control" placeholder="Enter Products Image:" name="p_image">
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn_prod">Add Products</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>

<?php 
if(isset($_POST['btn_prod']))
{
   $c_id = $_POST['c_id'];
   $p_name = $_POST['p_name']; 
   $p_desc = $_POST['p_desc']; 
   $p_price = $_POST['p_price']; 
   $p_qty = $_POST['p_qty']; 
   $p_image = $_FILES['p_image']; 
   $filename = $_FILES['p_image']['name'];
   $temp_name = $p_image['tmp_name'];
   
   move_uploaded_file($temp_name,"Products/$filename");

    $insert = "INSERT INTO products(p_name, p_desc, p_price,p_image, p_qty, c_id) VALUES ('$p_name','$p_desc','$p_price','$filename','$p_qty','$c_id')";

  $result = mysqli_query($conn,$insert);

  if($result)
  {
    echo "<script>alert('Products addedd successfully......')</script>";
  }
  else{
    echo "product not addedd....";
  }
}

?>