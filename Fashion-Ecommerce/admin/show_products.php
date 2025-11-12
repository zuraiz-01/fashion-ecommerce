<?php
include "header.php";
include "../config.php";
?>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>P Name</th>
            <th>P Description</th>
            <th>P Price</th>
            <th>P quantity</th>
            <th>P Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $select = "SELECT * FROM products";
    $result = mysqli_query($conn,$select);
    while($row=mysqli_fetch_array($result))
    {?>
    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['p_name'] ?></td>
        <td><?php echo $row['p_desc'] ?></td>
        <td><?php echo $row['p_price'] ?></td>
        <td><?php echo $row['p_qty'] ?></td>
        <td><img src="Products/<?php echo $row['p_image']?>" height="100px" width="100px" alt=""></td>
        <td><a href="editproduct.php?Id=<?php echo $row['id']  ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
        <td><a href="deleteproduct.php?Id=<?php echo $row['id']?>" class="btn btn-danger"> <i class="fa fa-trash"></i></a></td>
    </tr>
    <?php
    }
    ?>
    </tbody>
</table>

<?php
include "footer.php";
?>