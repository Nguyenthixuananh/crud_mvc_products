<form action=""method="post">
    <input type="text" name="name"placeholder="Ten san pham" value="<?php echo $product['name']?>">
    <input type="text" name="price"placeholder="Gia san pham" value="<?php echo $product['price']?>">
    <input type="text" name="desc"placeholder="Mo ta san pham"value="<?php echo $product['description']?>">
    <button type="submit">Sua</button>
    <button><a href="index.php">Back</a></button>
</form>