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
        $dbObjecto = new bdObjeto();
        return $dbObjecto->getCategorias();
    }

    public function template($contenido, $plantilla, $info)
    {
        require "view/" . $plantilla;
    }

    public function productos()
    {
        $db = new bdObjeto();
        if (isset($_POST["inicio"])) {
            $inicio = (int)$_POST["inicio"];
        } else {
            $inicio = 0;
        }
        return $db->read($inicio, 10);
    }

    public function categorias()
    {
        $dbObjecto = new bdObjeto();
        return $dbObjecto->getCategorias();
    }

    public function idProd()
    {
        $db = new bdObjeto();
        return $db->getMaxId();
    }

    public function idCat()
    {
        $db = new bdCategoria();
        return $db->getMaxId();
    }

    public function categories()
    {
        $dbCategoria = new bdCategoria();
        $principio = 0;
        if (isset($_POST["inicio"])) {
            $principio = (int)$_POST["inicio"];
        }
        return $dbCategoria->read($principio, 10);
    }

    public function eliminarCategoria($id)
    {
        $dbCategoria = new bdCategoria();
        if ($dbCategoria->delete($id)) {
            header("Location: ../admin/categories");
        }
    }

    public function eliminarProducto($id)
    {
        $dbObjeto = new bdObjeto();
        $dbObjeto->delete($id);
        header("Location: ../admin/products");

    }

    public function showEdit($info)
    {
        require "view/editarProducto.php";
    }

    public function showEditCat($info)
    {
        require "view/editarCategoria.php";
    }

    public function error()
    {

    }
}