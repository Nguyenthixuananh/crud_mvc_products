<a href="product-add.php">ADD NEW CATEGORY</a>
<table border="1px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    <?php if (isset($categories)) : ?>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?php echo $category["id"] ?></td>
                <td><?php echo $category["name"] ?></td>
                <td><a href="product-detail.php?id=<?php echo $category["id"] ?>">Detail</a></td>
                <td><a onclick="return confirm('Are you sure??')"
                       href="product-delete.php?id=<?php echo $category["id"] ?>">Delete</a></td>
                <td><a href="product-update.php?id=<?php echo $category["id"] ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">Không có sản phẩm nào ở đây</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>