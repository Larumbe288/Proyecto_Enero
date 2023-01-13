<?php
//Incluyo los archivos necesarios
require("model/Conexion.php");
require "model/objeto.php";
require("repositories/bdUsuario.php");
require "repositories/bdCategoria.php";
require "repositories/bdObjeto.php";
require "./controller/controller.php";
session_start();
$dbObjeto = new bdObjeto();
//Instancio el controlador
$controller = new controller();
//Ruta de la home
$home = "/php/proyectointegrador/backend/index.php/";
//Quito la home de la ruta de la barra de direcciones
$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);
//echo $ruta . "<br>";
//Creo el array de ruta (filtrando los vacíos)
$array_ruta = array_filter(explode("/", $ruta));
//Decido la ruta en función de los elementos del array
if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "login" && !isset($array_ruta[2])) {
    if (isset($_SESSION["login"])) {
        header("Location: dashboard");
    } else {
        $controller->showLogin();
    }

} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && !isset($array_ruta[1])) {
    $controller->admin();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "remember") {
    $controller->rememberPassword();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == 'login' && isset($array_ruta[2]) && $array_ruta[2] == "process") {
    $controller->autenticacion();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "dashboard" && !isset($array_ruta[2])) {
//    $controller->home();
    $cabecera = $dbObjeto->getColumnsName();
    $contenido = $dbObjeto->read(0,10);
    $info = [$cabecera,$contenido];
    $controller->template("tabla.php", "template.php",$info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "dashboard" && isset($array_ruta[2]) && $array_ruta[2] == "ficha") {
    $controller->template("home.php", "template.php");
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "logout") {
    $controller->logout();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "prueba") {
    $controller->prueba();
} else {
    $controller->error();
}