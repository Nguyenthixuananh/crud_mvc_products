<a href="index.php?page=product-create">ADD NEW PRODUCT</a>
<table border="1px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Desc</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php if (isset($products)) : ?>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product["id"] ?></td>
                <td><img width="150px" src="<?php echo $product["image"] ?>"></td>
                <td><?php echo $product["name"] ?></td>
                <td><?php echo $product["price"] ?></td>
                <td><?php echo $product["description"] ?></td>
                <td><a href="index.php?page=product-detail&id=<?php echo $product["id"] ?>">Detail</a></td>
                <td><a onclick="return confirm('Are you sure??')"
                       href="index.php?page=product-delete&id=<?php echo $product["id"] ?>">Delete</a></td>
                <td><a href="index.php?page=product-update&id=<?php echo $product["id"] ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">Không có sản phẩm nào ở đây</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>