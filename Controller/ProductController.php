<?php

include_once "Model/ProductModel.php";

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $products = $this->productModel->getAll();
        include_once "View/product/list.php";
//        $sql = "SELECT * FROM $this->table";
//        $stmt = $this->dbConnect->query($sql);
//        return $stmt->fetchAll();
    }

    public function showFormCreate()
    {
        include_once "View/product/create.php";
    }

    public function create($data)
    {
        $filepath = "";
        if (isset($_FILES["file"])) {
            $filepath = "uploads/" . $_FILES["file"]["name"];
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) {
                echo "<img src=" . $filepath . " height=200 width=300 />";
            } else {
                echo "Error !!";
            }
        }
        $data2 = [
            "name" => $data['name'],
            "price" => $data['price'],
            "description" => $data['desc'],
            "image" => $filepath
        ];

        $this->productModel->create($data2);
        header("location:index.php");
    }

    public function deleteProduct($id)
    {
        if ($this->productModel->getById($id) !== null) {
            $this->productModel->delete($id);
            header("location:index.php");
        }
    }

    public function showDetail($id)
    {
        $product = $this->productModel->getById($id);
        include_once "View/product/detail.php";
    }

    public function showFormUpdate()
    {
        $id = $_REQUEST["id"];
        $product = $this->productModel->getById($id);
        include_once "View/product/update.php";
    }

    public function editProduct($id, $request)
    {
        $product = $this->productModel->getById($id);

//        if ($_SERVER['REQUEST_METHOD']== "POST"){
        $data = [
            "name" => $request['name'],
            "price" => $request['price'],
            "description" => $request['desc'],
            "id" => $id
        ];
        $this->productModel->edit($data);
        header("location:index.php");
//        }
    }

}