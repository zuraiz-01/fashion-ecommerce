<?php
include "header.php";
include "../config.php" ?>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Category Name</th>
            <th>Category Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $select = "select * from category";
    $result = mysqli_query($conn, $select);
    while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['c_name']; ?></td>
                <td><img src="categoryimages/<?php echo trim($row['c_image']); ?>" height="90px" width="100px" alt="<?php echo htmlspecialchars($row['c_name']); ?>"></td>
                <td><a href="editcategory.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a></td>
                <td><a href="deletecategory.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
            </tr>
    <?php
    }
    ?>
    </tbody>
</table>















<?php include "footer.php"; ?>