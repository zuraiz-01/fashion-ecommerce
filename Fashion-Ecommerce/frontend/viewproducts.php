<?php 
include "header.php";
include "../config.php";

$id = $_GET['Id'];
$select = "SELECT * FROM products INNER JOIN category on products.c_id = category.id where products.id = $id";
$result = mysqli_query($conn,$select);
$row = mysqli_fetch_assoc($result);
?>
<div class="container-fluid my-5">

<div class="card details-card p-0">
    <div class="row">

        <div class="col-md-6 col-sm-12">
            <img class="img-fluid details-img" src="../admin/Products/<?php echo $row['p_image'] ?>" alt="">
        </div>
        <div class="col-md-6 col-sm-12 description-container p-5">
            <div class="main-description">
                <p class="product-category mb-0"><?php echo $row['c_name']?></p>
                <h3> <?php echo $row['p_name']?></h3>
                <hr>
                <p class="product-price">Product Price: <b><?php echo $row['p_price']?></b></p>
                <form class="add-inputs" method="post">
                    <input type="number" class="form-control" id="cart_quantity" name="cart_quantity" value="1" min="1" max="10">
                    <button name="add_to_cart" type="submit" class="btn btn-primary btn-lg">Add to cart</button>
                </form>
                <div style="clear:both">Product Quantity :<b> <?php echo $row['p_qty']?></b></div>

                <hr>


                <p class="product-title mt-4 mb-1">About this product</p>
                <p class="product-description mb-4">
                <?php echo $row['p_desc']?>
                </p>

                <hr>

                <p class="product-title mt-4 mb-1">Share this product</p>
                <ul class="social-list">
                    <li><a href="#"><i class="fa-brands fa-facebook"></a></i></li>
                    <li><a href="#"><i class="fa-brands fa-twitter"></a></i></li>
                    <li><a href="#"><i class="fa-brands fa-square-instagram"></a></i></li>

                </ul>

            </div>
        </div>
    </div>
    <!-- End row -->
</div>
</div>

<?php 
include "footer.php";

?>