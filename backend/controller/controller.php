<?php

/**
 *
 */
class controller
{
    /**
     * @return void
     */
    public function showLogin(): void
    {
        require "view/login.php";
    }

    /**
     * @return void
     */
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

    /**
     * @return void
     */
    public function home()
    {
        include "model/control.php";
        require "view/categorias.php";
    }

    /**
     * @return void
     */
    public function rememberPassword()
    {
        require "view/recordarpassword.html";
    }

    /**
     * @return void
     */
    public function logout()
    {
        session_destroy();
        header("Location: http://localhost/web/backend/index.php/admin/login");
    }

    /**
     * @return void
     */
    public function admin()
    {
        if (!isset($_SESSION["login"])) {
            header("Location: admin/login");
        } else {
            header("Location: admin/dashboard");
        }
    }

    /**
     * @param $contenido
     * @param $plantilla
     * @param $info
     * @return void
     */
    public function template($contenido, $plantilla, $info)
    {
        require "view/" . $plantilla;
    }

    /**
     * @return array
     */
    public function getDatosTablaCom()
    {
        $dbComments = new bdComentario();
        $cabecera2 = $dbComments->getColumnsName();
        $info = [$cabecera2];
        return $info;
    }

    /**
     * @return array
     */
    public function getDatosTablaSales()
    {
        $dbSales = new bdVentas();
        $cabecera2 = $dbSales->getColumnsName();
        $info = [$cabecera2];
        return $info;
    }

    /**
     * @return array
     */
    public function getDatosTablaUsr()
    {
        $dbUser = new bdUsuario();
        $cabecera2 = $dbUser->getColumnsName();
        $info = [$cabecera2];
        return $info;
    }

    /**
     * @param int $id
     * @return void
     */
    public function showEditUsr(int $id)
    {
        $dbUser = new bdUsuario();
        $cat = $dbUser->getById($id);
        $prod = json_decode(json_encode($cat), true);
        $info = array_values($prod);
        require "view/editarUsuario.php";
    }

    /**
     * @return void
     */
    public function aniadirUsrs()
    {
        $dbUser = new bdUsuario();
        $info = $dbUser->maxId() + 1;
        require "view/aniadirUsuario.php";
    }

    /**
     * @return void
     */
    public function processaniadirUsr()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                if (isset($_POST["correo"]) && !empty($_POST["correo"]) && preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", $_POST["correo"])) {
                    $correo = $_POST["correo"];
                } else {
                    header("Location: ../admin/users/aniadirUsers");
                }
                if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && preg_match("/^[A-ZÁÉÍÓÚ][a-záéíóú]+$/", $_POST["nombre"])) {
                    $nombre = $_POST["nombre"];
                } else {
                    header("Location: ../admin/users/aniadirUsers");
                }
                if (isset($_POST["tel"]) && !empty($_POST["tel"]) && preg_match("/\d{9}/", $_POST["tel"])) {
                    $tel = $_POST["tel"];
                } else {
                    header("Location: ../admin/users/aniadirUsers");
                }
                if (isset($_POST["dinero"]) && !empty($_POST["dinero"]) && preg_match("/^(?!0\d|$)\d*(\.\d{1,4})?$/", $_POST["dinero"])) {
                    $dinero = (float)$_POST["dinero"];
                } else {
                    header("Location: ../admin/users/aniadirUsers");
                }
                if (isset($_POST["password"]) && isset($_POST["password2"]) && !empty($_POST["password"]) && !empty($_POST["password2"]) && $_POST["password"] == $_POST["password2"] && preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST["password"])) {
                    $password = sha1($_POST["password"]);
                } else {
                    $_SESSION["error"] = "El usuario no ha podido ser añadido";
                    header("Location: ../admin/users/aniadirUsers");
                }
                $rol = 'usuario';
                $dbUsuario = new bdUsuario();
                $dbUsuario->create($correo, $password, $nombre, $tel, $rol);
                header("Location: ../admin/users");
            }
        }
    }

    /**
     * @return false|string|null
     */
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

    /**
     * @return int|mixed|null
     */
    public function idUser()
    {
        $db = new bdUsuario();
        return $db->getMaxId();
    }

    /**
     * @return int|mixed|null
     */
    public function idSales()
    {
        $db = new bdVentas();
        return $db->getMaxId();
    }

    /**
     * @return false|string|null
     */
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

    /**
     * @return false|string|null
     */
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

    /**
     * @return int|mixed|null
     */
    public function idComments()
    {
        $db = new bdComentario();
        return $db->getMaxId();
    }

    /**
     * @return void
     */
    public function control()
    {
        include "model/control.php";
    }

    /**
     * @return void
     */
    public function processUsers()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                if (isset($_POST["idUsr"]) && !empty($_POST["idUsr"])) {
                    $id = (int)$_POST["idUsr"];
                    $dbUsr = new bdUsuario();
                    if (isset($_POST["correo"]) && !empty($_POST["correo"]) && preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", $_POST["correo"])) {
                        $correo = $_POST["correo"];
                    } else {
                        header("Location: ../admin/users/editarUsers/" . $id);
                    }
                    if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && preg_match("/^[A-ZÁÉÍÓÚ][a-záéíóú]+$/", $_POST["nombre"])) {
                        $nombre = $_POST["nombre"];
                    } else {
                        header("Location: ../admin/users/editarUsers/" . $id);
                    }
                    if (isset($_POST["tel"]) && !empty($_POST["tel"]) && preg_match("/\d{9}/", $_POST["tel"])) {
                        $tel = $_POST["tel"];
                    } else {
                        header("Location: ../admin/users/editarUsers/" . $id);
                    }
                    if (isset($_POST["dinero"]) && !empty($_POST["dinero"]) && preg_match("/^(?!0\d|$)\d*(\.\d{1,4})?$/", $_POST["dinero"])) {
                        $dinero = (float)$_POST["dinero"];
                    } else {
                        header("Location: ../admin/users/editarUsers/" . $id);
                    }
                    if(isset($_POST["password"]) && !empty($_POST["password"]) && preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/",$_POST["password"])) {
                        $password = sha1($_POST["password"]);
                    } else {
                        header("Location: ../admin/users/editarUsers/" . $id);
                    }
                    $array = array("Correo" => $correo, "Nombre" => $nombre, "Telefono" => $tel, "Christokens" => $dinero, "Password" => $password);
                    echo $dbUsr->update($id, $array);
                }
                header("Location: ../../admin/users");

            }
        }
    }

    /**
     * @param $id
     * @return void
     */
    public
    function deleteUser($id)
    {
        $dbUsers = new bdUsuario();
        $dbUsers->delete($id);
        header("Location: ../admin/users");
    }

    /**
     * @param int $id
     * @return void
     */
    public
    function showEditCom(int $id)
    {
        $dbComments = new bdComentario();
        $cat = $dbComments->getById($id);
        $prod = json_decode(json_encode($cat), true);
        $info = array_values($prod);
        require "view/editarComentario.php";
    }

    /**
     * @return void
     */
    public
    function processComentario()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                $id = (int)$_POST["idCom"];
                if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && preg_match("/^[A-ZÁÉÍÓÚ][a-záéíóú]+$/", $_POST["nombre"])) {
                    $texto = $_POST["nombre"];
                } else {
                    header("Location: ../admin/products/editarComments/" . $id);
                }
                $idusr = (int)$_POST["idUsr"];
                $idProd = (int)$_POST["idProd"];
                $array = array("Texto" => $texto, "IdUsuario" => $idusr, "IdObjeto" => $idProd);
                $dbCom = new bdComentario();
                $dbCom->update($id, $array);
                header("Location: ../../admin/comments");
            }
        }
    }

    /**
     * @param int $id
     * @return void
     */
    public
    function deleteComments(int $id)
    {
        $dbComentarios = new bdComentario();
        $dbComentarios->delete($id);
        header("Location: ../admin/comments");
    }
}