<?php

include_once "Model/CategoryModel.php";
class CategoryController
{
    private $categoryModel;
    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $categories = $this->categoryModel->getAll();
        include_once "View/category/list.php";
    }
}