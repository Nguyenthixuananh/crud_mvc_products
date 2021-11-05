<?php

include_once "database/DB.php";
class BaseModel
{
    protected $table;
    protected $dbConnect;

    public function __construct()
    {
        $db = new DB();
        $this->dbConnect = $db->connect();
    }


    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->dbConnect->query($sql);
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $stmt = $this->dbConnect->query($sql);
        return $stmt->fetch();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id=:id";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}