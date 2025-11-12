<?php
include "header.php";
include "../config.php"
    ?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Add Category Here....</h6>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Category Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Category Name:" name="c_name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category Image:</label>
                        <input type="file" class="form-control" placeholder="Enter Category Image:" name="c_image">
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn_cate">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

<?php
if (isset($_POST['btn_cate'])) {
    $c_name = $_POST['c_name'];
    $c_image = $_FILES['c_image'];
    $filename = $_FILES['c_image']['name'];
    $temp_name = $c_image['tmp_name'];
    move_uploaded_file($temp_name, "categoryimages/$filename");

    $insert = "INSERT INTO category(c_name, c_image) VALUES ('$c_name','$filename')";
    $result = mysqli_query($conn, $insert);
    if ($result) {
       header("location:show_category.php");
    }

}

?>