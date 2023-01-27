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
        header("Location: http://localhost/web/backend/index.php/admin/login");
    }
    public function admin()
    {
        if (!isset($_SESSION["login"])) {
            header("Location: admin/login");
        } else {
            header("Location: admin/dashboard");
        }
    }
    public function template($contenido, $plantilla, $info)
    {
        require "view/" . $plantilla;
    }
    public function getDatosTablaCom()
    {
        $dbComments = new bdComentario();
        $cabecera2 = $dbComments->getColumnsName();
        $info = [$cabecera2];
        return $info;
    }
    public function getDatosTablaSales()
    {
        $dbSales = new bdVentas();
        $cabecera2 = $dbSales->getColumnsName();
        $info = [$cabecera2];
        return $info;
    }
    public function getDatosTablaUsr()
    {
        $dbUser = new bdUsuario();
        $cabecera2 = $dbUser->getColumnsName();
        $info = [$cabecera2];
        return $info;
    }
    public function showEditUsr(int $id)
    {
        $dbUser = new bdUsuario();
        $cat = $dbUser->getById($id);
        $prod = json_decode(json_encode($cat), true);
        $info = array_values($prod);
        require "view/editarUsuario.php";
    }
    public function aniadirUsrs()
    {
        $dbUser = new bdUsuario();
        $info = $dbUser->maxId() + 1;
        require "view/aniadirUsuario.php";
    }
    public function processaniadirUsr()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                $correo = $_POST["correo"];
                $nombre = $_POST["nombre"];
                $tel = $_POST["tel"];
                $dinero = (float)$_POST["dinero"];
                if ($_POST["password"] == $_POST["password2"] && preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST["password"])) {
                    $password = sha1($_POST["password"]);
                } else {
                    $_SESSION["error"] = "El usuario no ha podido ser añadido";
                    header("Location: ../admin/users");
                }
                $rol = 'usuario';
                $dbUsuario = new bdUsuario();
                $dbUsuario->create($correo, $password, $nombre, $tel, $dinero, $rol);
                header("Location: ../admin/users");
            }
        }
    }
    public function users()
    {
        $dbUsers = new bdUsuario();
        if (isset($_POST['inicio'])) {
            $principio = (int)$_POST['inicio'];
        } else {
            $principio = 0;
        }
        if (isset($_POST['campo'])) {
            $campo = $_POST['campo'];
        } else {
            $campo = "Id_Usuario";
        }
        return $dbUsers->read($campo, $principio, 10);
    }
    public function idUser()
    {
        $db = new bdUsuario();
        return $db->getMaxId();
    }
    public function idSales()
    {
        $db = new bdVentas();
        return $db->getMaxId();
    }
    public function sales()
    {
        $dbCategoria = new bdVentas();
        if (isset($_POST["inicio"])) {
            $principio = (int)$_POST["inicio"];
        } else {
            $principio = 0;
        }
        if (isset($_POST["campo"])) {
            $campo = $_POST["campo"];
        } else {
            $campo = "Id_Compra";
        }
        return $dbCategoria->read($campo, $principio, 10);
    }
    public function comments()
    {
        $dbCategoria = new bdComentario();
        if (isset($_POST["inicio"])) {
            $principio = (int)$_POST["inicio"];
        } else {
            $principio = 0;
        }
        if (isset($_POST["campo"])) {
            $campo = $_POST["campo"];
        } else {
            $campo = "Id_Comentario";
        }
        return $dbCategoria->read($campo, $principio);
    }
    public function idComments()
    {
        $db = new bdComentario();
        return $db->getMaxId();
    }
    public function control()
    {
        include "model/control.php";
    }
    public function processUsers()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                if (isset($_POST["idUsr"]) && !empty($_POST["idUsr"])) {
                    $id = (int)$_POST["idUsr"];
                    $dbUsr = new bdUsuario();
                    $array = array("Correo" => $_POST["correo"], "Nombre" => $_POST["nombre"], "Telefono" => $_POST["tel"], "Christokens" => $_POST["dinero"], "Password" => $_POST["password"]);
                    echo $dbUsr->update($id, $array);
                }
                header("Location: ../../admin/users");

            }
        }
    }
    public function deleteUser($id)
    {
        $dbUsers = new bdUsuario();
        $dbUsers->delete($id);
        header("Location: ../admin/users");
    }
    public function showEditCom(int $id)
    {
        $dbComments = new bdComentario();
        $cat = $dbComments->getById($id);
        $prod = json_decode(json_encode($cat), true);
        $info = array_values($prod);
        require "view/editarComentario.php";
    }
    public function processComentario()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                $id = (int)$_POST["idCom"];
                $texto = $_POST["nombre"];
                $idusr = (int)$_POST["idUsr"];
                $idProd = (int)$_POST["idProd"];
                $array = array("Texto" => $texto, "IdUsuario" => $idusr, "IdObjeto" => $idProd);
                $dbCom = new bdComentario();
                $dbCom->update($id, $array);
                header("Location: ../../admin/comments");
            }
        }
    }
    public function deleteComments(int $id)
    {
        $dbComentarios = new bdComentario();
        $dbComentarios->delete($id);
        header("Location: ../admin/comments");
    }
}