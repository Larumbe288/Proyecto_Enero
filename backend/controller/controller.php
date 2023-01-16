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
                if (isset($_POST["username"]) && !empty($_POST["username"]) && preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", $_POST["username"])) {
                    $user = $_POST["username"];
                }
                if (isset($_POST["password"]) && !empty($_POST["password"]) && preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST["password"])) {
                    $password = $_POST["password"];
                }
                if (isset($_SESSION["login"])) {
                    header("Location:../dashboard");
                } else {
                    $db = new bdUsuario();
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

    public function logout()
    {
        session_destroy();
        header("Location: http://localhost/php/proyectointegrador/backend/index.php/admin/login");
    }

    public function ficha()
    {
        require "view/ficha.php";
    }

    public function admin()
    {
        if (!isset($_SESSION["login"])) {
            header("Location: admin/login");
        } else {
            header("Location: admin/dashboard");
        }
    }

    public function prueba()
    {
        require "view/prueba.php";
    }

    public function template($contenido, $plantilla,$info)
    {
        require "view/" . $plantilla;
    }
    public function productos() {
        $db = new bdObjeto();
        return $db->read(0,10);
    }
}