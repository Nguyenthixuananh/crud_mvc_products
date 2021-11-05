<?php

include_once "Model/UserModel.php";
class AuthController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function showFormLogin()
    {
        include_once "View/auth/login.php";
    }

    public function login($request)
    {
        $email = $request["email"];
        $password = $request["password"];

        if ($this->userModel->checkLogin($email, $password)){
            $user = $this->userModel->getByEmail($email);
            $_SESSION["username"] = $user["name"];
            header("Location:index.php");
        } else {
            var_dump("Tai khoan khong dung!!");
        }
    }

    public function logout()
    {

    session_destroy();
//    unset($_SESSION["username"]);
    header("Location:index.php?page=login");
    }

    public function checkAuth()
    {
        if (isset($_SESSION["username"])) {
            header("Location:index.php?page=login");
        }
    }

}