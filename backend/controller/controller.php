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

    public function maxIdCat()
    {
        $db = new bdCategoria();
        return $db->getMaxIdCat();
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

    public function processCategoria()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['submit'])) {
                if (isset($_POST['idCat']) && !empty($_POST['idCat'])) {
                    $id = (int)$_POST['idCat'];
                } else {
                    header("Location: ../../admin/categories");
                }
                $dbCategoria = new bdCategoria();
                $temporal = $_FILES["imagen"]["tmp_name"];
                $fileName = $_FILES["imagen"]["name"];
                $path = $_SERVER['DOCUMENT_ROOT'] . "/php/proyectointegrador/backend/view/imgCategories/" . $_POST['idCat'] . "/{$fileName}";

                $absolutePath = __DIR__ . '/' . $path;
                $dir = $_SERVER['DOCUMENT_ROOT'] . "/php/proyectointegrador/backend/view/imgCategories/" . $_POST['idCat'];
                if (!file_exists($absolutePath)) {
                    $files = glob($dir . "/*"); //obtenemos todos los nombres de los ficheros
                    foreach ($files as $file) {
                        if (is_file($file))
                            unlink($file); //elimino el fichero
                    }
                    move_uploaded_file($temporal, $path);
                    $categoryImg = "http://localhost/php/proyectointegrador/backend/view/imgCategories/" . $_POST['idCat'] . "/{$fileName}";
                }
                $array = array("Nombre" => $_POST["nombre"], "Descripcion" => $_POST["descripcion"], "Imagen" => $categoryImg,);
                $dbCategoria->update($id, $array);
                header("Location: ../../admin/categories");
            }
        }
    }

    public function processProducto()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                if (isset($_POST['idProd']) && !empty($_POST['idProd'])) {
                    $id = (int)$_POST['idProd'];
                } else {
                    header("Location: ../../admin/categories");
                }
                $dbObjeto = new bdObjeto();
                $this->vaciarCarpeta();
                $img = $this->imagen("");
                $img2 = $this->imagen(2);
                $img3 = $this->imagen(3);
                $array = array("Nombre" => $_POST["nombre"], "Precio" => (float)$_POST["precio"], "Imagen1" => $img, "Imagen2" => $img2, "Imagen3" => $img3, "Latitud" => (float)$_POST["latitud"], "Longitud" => (float)$_POST["longitud"], "IdCategoria" => (int)$_POST["idCat"]);
                $dbObjeto->update($id, $array);
                header("Location: ../../admin/products");
            }
        }
    }

    private function imagen($id)
    {
        $temporal = $_FILES["imagen" . $id]["tmp_name"];
        $fileName = $_FILES["imagen" . $id]["name"];
        $path = $_SERVER['DOCUMENT_ROOT'] . "/php/proyectointegrador/backend/view/imgProducts/" . $_POST['idProd'] . "/{$fileName}";
        $absolutePath = __DIR__ . '/' . $path;
        if (!file_exists($absolutePath)) {
            move_uploaded_file($temporal, $path);
            return "http://localhost/php/proyectointegrador/backend/view/imgProducts/" . $_POST['idProd'] . "/{$fileName}";
        }
    }

    private function vaciarCarpeta()
    {
        $dir = $_SERVER['DOCUMENT_ROOT'] . "/php/proyectointegrador/backend/view/imgProducts/" . $_POST['idProd'];
        $files = glob($dir . "/*"); //obtenemos todos los nombres de los ficheros
        foreach ($files as $file) {
            if (is_file($file))
                unlink($file); //elimino el fichero
        }
    }

    public
    function error()
    {

    }
}