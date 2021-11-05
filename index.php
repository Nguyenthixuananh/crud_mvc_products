<?php

include_once "Controller/ProductController.php";
include_once "Controller/CategoryController.php";
include_once "Controller/AuthController.php";

session_start();
$productController = new ProductController();
$categoryController = new CategoryController();
$authController = new AuthController();

$page = (isset($_GET["page"]) ? $_GET["page"] : "");
$username = isset($_SESSION["username"]) ? $_SESSION["username"] : "";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="navbar">
    <p>Name: <?php echo $username; ?></p>
    <a href="index.php?page=logout">Logout</a>
    <a href="index.php?page=product-list">Products</a>
    <a href="index.php?page=category-list">Categories</a>
</div>
<?php
switch ($page) {
    case "product-list":
        $authController->checkAuth();
        $productController->index();
        break;

    case "category-list":
        $categoryController->index();
        break;

    case "product-create":
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            //show form create
            $productController->showFormCreate();
        } else {
            //tao san pham
            $productController->create($_REQUEST);
        }
        break;
    case "product-delete":
        $productController->deleteProduct($_REQUEST["id"]);
        break;
    case "product-detail":
        $id = $_GET["id"];
        $productController->showDetail($id);
        break;
    case "product-update":
        $id = $_GET["id"];
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $productController->showFormUpdate();
        } else {
            $productController->editProduct($id, $_REQUEST);
        }

        break;
    case "login":
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $authController->showFormLogin();
        } else {
            $authController->login($_REQUEST);
        }
        break;
    case "logout":
        $authController->logout();
        break;
    default:
        $productController->index();
}
?>

</body>
</html>
