<?php
include "header.php";
include "../config.php";

$id = $_GET['Id'];
$select = "SELECT * FROM products where id = $id";
$result = mysqli_query($conn,$select);
$row = mysqli_fetch_assoc($result);

?>


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Edit Products Here....</h6>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Edit Products Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Products Name:" name="p_name" value="<?php echo $row['p_name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Edit Products Description:</label>
                        <input type="text" class="form-control" placeholder="Enter Products Description:" name="p_desc" value="<?php echo $row['p_desc'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edit Products Price:</label>
                        <input type="text" class="form-control" placeholder="Enter Products Price:" name="p_price" value="<?php echo $row['p_price'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edit Products Quantity:</label>
                        <input type="text" class="form-control" placeholder="Enter Products Quantity:" name="p_qty" value="<?php echo $row['p_qty'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edit Products Image:</label>
                        <input type="file" class="form-control" placeholder="Enter Products Image:" name="p_image">
                        <img src="Products/<?php echo $row['p_image'] ?>" height="100px" width="100px" alt="">
                    </div> 
                    <button type="submit" class="btn btn-primary" name="update_prod">Update Products</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include "footer.php";

if(isset($_POST['update_prod']))
{
    $p_name = $_POST['p_name']; 
    $p_desc = $_POST['p_desc']; 
    $p_price = $_POST['p_price']; 
    $p_qty = $_POST['p_qty']; 
    $p_image = $_FILES['p_image']; 
    $filename = $_FILES['p_image']['name'];
    $temp_name = $p_image['tmp_name'];
    
    move_uploaded_file($temp_name,"Products/$filename");

    if($filename=="")
    {
        $update = "UPDATE products SET p_name = '$p_name' , p_desc = '$p_desc' , p_price = '$p_price' , p_qty = '$p_qty' where id = $id ";
    }
    else{
        $update = "UPDATE products SET p_name = '$p_name' , p_desc = '$p_desc' , p_price = '$p_price' , p_qty = '$p_qty' , p_image = '$filename' where id = $id ";
    }

   $result = mysqli_query($conn,$update);
   if($result)
   {
      echo "<script>window.location.href='show_products.php'</script>";
   }
   else{
    echo "not updated";
   }
} 

?>