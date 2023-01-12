<?php


class controller
{
    public function showLogin(): void
    {
        require "view/login.php";
    }

    public function autenticacion(): void
    {
        $user = "";
        $password = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                if (isset($_POST["username"]) && !empty($_POST["username"])) {
                    $user = $_POST["username"];
                }
                if (isset($_POST["password"]) && !empty($_POST["password"])) {
                    $password = $_POST["password"];
                }
                if (isset($_SESSION["login"])) {
                    header("Location:../dashboard");
                } else {
                    $db = new bbdd();
                    if ($db->login($user, sha1($password))) {
                        $_SESSION["login"] = $user;
                        header("Location:../dashboard");
                    } else {
                        $_SESSION["error"] = true;
                        header("Location:../login");
                    }
                }
            }
        } else {
            header("Location:../login");
        }


    }

    public function home()
    {
        include "model/control.php";
        require "view/categorias.php";
    }

    public function rememberPassword()
    {
        require "view/recordarpassword.html";
    }
    public function logout() {
        session_destroy();
        header("Location: http://localhost/php/proyectointegrador/backend/index.php/admin/login");
    }
    public function ficha() {
        require "view/ficha.php";
    }
}