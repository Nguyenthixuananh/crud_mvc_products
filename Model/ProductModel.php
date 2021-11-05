<?php

include_once "database/DB.php";
include_once "BaseModel.php";

class ProductModel extends BaseModel
{
    protected $table = "products";


    public function create($data)
    {
        $sql = "INSERT INTO $this->table(`name`,`price`,`description`) VALUE(?,?,?)";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1, $data["name"]);
        $stmt->bindParam(2, $data["price"]);
        $stmt->bindParam(3, $data["description"]);
        $stmt->bindParam(4, $data["image"]);
        $stmt->execute();
    }

    public function edit($data)
    {
        try {
            $sql = "UPDATE $this->table SET `name`  = ?,`price`=?,`description`=? WHERE `id` = ?";
            $stmt = $this->dbConnect->prepare($sql);
            $stmt->bindParam(1, $data["name"]);
            $stmt->bindParam(2, $data["price"]);
            $stmt->bindParam(3, $data["description"]);
            $stmt->bindParam(4, $data["id"]);
            $stmt->execute();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}