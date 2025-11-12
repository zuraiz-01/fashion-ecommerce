<?php
include "../config.php";
$id = $_GET['Id'];
$delete = "DELETE FROM products where id = $id";
$result = mysqli_query($conn,$delete);
if($result)
{
    echo "<script>window.location.href='show_products.php'</script>";
}
?>