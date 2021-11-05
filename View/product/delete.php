<?php

include_once "Model/ProductModel.php";
$productModel = new ProductModel();

if (isset($_GET["id"])){
    $id = $_GET["id"];
    if ($productModel->getById($id) !== null){

    $product = $productModel->delete($id);
    header("location:index.php");
    }

}
