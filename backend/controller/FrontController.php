<?php
class FrontController
{
    public function profile()
    {
        $dbUser = new bdUsuario();
        $id = (int)$_SESSION["idUser"];
        $info = $dbUser->getById($id);
        require "view/profile.php";
    }
    public function error()
    {
        require "view/error404.php";
    }
    public function mostrarFicha(int $id)
    {
        $dbComments = new bdComentario();
        $dbObjeto = new bdObjeto();
        $info = $dbObjeto->getById($id);
        $comentarios = $dbComments->getComentariosPorObjeto($id);
        require("view/ficha.php");
    }
    public function contacto($info, $booleano)
    {
        require "view/contacto.php";
    }
    public function processContacto()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["comentario"]) && !empty($_POST["comentario"])) {
                    $ip = $_SERVER["REMOTE_ADDR"];
                    $captcha = $_POST["g-recaptcha-response"];
                    $secretkey="6LdHhi8kAAAAAOIs3YEWBhY61k-rvRQfKusnXUwF";
                    $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");
                    $atributos = json_decode($respuesta,true);
                    if(!$atributos['success']) {
                        $_SESSION["errorContact"]="No se ha validado el Captcha";
                        header("Location: ../contacto");
                    }
                    $email = $_POST["email"];
                    $text = $_POST["comentario"];
                    $texto = "Correo: " . $email . "<br>" . "Nombre: " . $_POST["nombre"] . "<br>" . "Mensaje: " . $text;
                    $m = new Mailer\Mailer('alvarolarumbe97@gmail.com', $email, '', '', $texto);
                    $m->enviarEmail();
                    unset($_SESSION["errorContact"]);
                    header("Location: ../contacto");
                } else {
                    $_SESSION["errorContact"]="Los datos no cumplen con las especificaciones";
                    header("Location: ../contacto");
                }
            }
        }
    }
    public function processBuscador()
    {
        $dbObjeto = new bdObjeto();
        if (isset($_POST["buscar"])) {
            $texto = $_POST["buscar"];
        } else {
            $texto = '';
        }
        if (isset($_POST["inicio"])) {
            $principio = (int)$_POST["inicio"];
        } else {
            $principio = 0;
        }
        return $dbObjeto->buscador($texto, $principio);
    }
    public function idBuscador()
    {
        $dbObjeto = new bdObjeto();
        if (isset($_POST["texto"])) {
            $texto = $_POST["texto"];
        } else {
            $texto = '';
        }
        return $dbObjeto->getIdBuscador($texto);
    }
    public function registro()
    {
        require "view/registro.php";
    }
    public function getProductosComprados()
    {
        $dbObjeto = new bdObjeto();
        return $dbObjeto->productosMasVendidos();
    }
    public function processRegistro()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                if (isset($_POST["user"]) && !empty($_POST["user"]) && preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", $_POST["user"]) && isset($_POST["password"]) && !empty($_POST["password"]) && preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST["password"]) && isset($_POST["nombre"]) && !empty($_POST["nombre"]) && preg_match("/^[A-ZÁÉÍÓÚ][a-záéíóú]+$/", $_POST["nombre"]) && isset($_POST["tel"]) && !empty($_POST["tel"]) && preg_match("/^\d{9}$/", $_POST["tel"])) {
                    $correo = $_POST["user"];
                    $password = $_POST["password"];
                    $nombre = $_POST["nombre"];
                    $tel = $_POST["tel"];
                    $dbUsuario = new bdUsuario();
                    $dbUsuario->create($correo, $password, $nombre, $tel, "usuario");
                    $_SESSION["loginU"] = true;
                    $_SESSION["idUser"] = $dbUsuario->getIdByCorreo($correo);
                    header("Location: ../../home");
                } else {
                    $_SESSION["errorR"] = "El usuario introducido ya existe";
                    header("Location: ../registro");
                }
            }
        }
    }
    public function processLoginHome()
    {
        if (isset($_SESSION["loginU"])) {
            header("Location: ../../home");
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["submit"])) {
                    if (isset($_POST["user"]) && !empty($_POST["user"]) && isset($_POST["password"]) && !empty($_POST["password"]) && preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", $_POST["user"]) && preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST["password"])) {
                        $user = $_POST["user"];
                        $password = sha1($_POST["password"]);
                        $dbUser = new bdUsuario();
                        unset($_SESSION["error"]);
                        $dbUser->loginHome($user, $password);
                        $_SESSION["loginU"] = $user;
                        $_SESSION["idUser"] = (int)$dbUser->getIdByCorreo($user);
                        var_dump($_SESSION["idUser"]);
                        header("Location: ../../home");
                    } else {
                        $_SESSION["error"] = "El usuario y/o la contraseña son incorrectos";
                        header("Location: ../login");
                    }
                }
            }
        }
    }
    public function homePage($info, $booleano, $productos)
    {
        require "view/home.php";
    }
    public function loginHome()
    {
        require "view/loginHome.php";
    }
    public function logoutHome()
    {
        session_destroy();
        header("Location: http://localhost/web/backend/index.php/home");
    }
    public function showProducts()
    {
        require "view/productos.php";
    }
}