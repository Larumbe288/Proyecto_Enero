<?php
//Incluyo los archivos necesarios
require("model/Conexion.php");
require "model/objeto.php";
require "model/categoria.php";
require("repositories/bdUsuario.php");
require "repositories/bdCategoria.php";
require "repositories/bdObjeto.php";
require "./controller/controller.php";
session_start();
$dbObjeto = new bdObjeto();
$dbCategoria = new bdCategoria();
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
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "products" && !isset($array_ruta[2])) {
//    $controller->home();
    unset($_SESSION['tabla']);
    $_SESSION["tabla"] = "Products";
    $cabecera = $dbObjeto->getColumnsName();
    $contenido = $dbObjeto->read(0, 10);
    $info = [$cabecera, $contenido];
    $controller->template("tabla.php", "template.php", $info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "dashboard" && !isset($array_ruta[2])) {
    $info = 0;
    $controller->template("home.php", "template.php", $info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "categories" && !isset($array_ruta[2])) {
    unset($_SESSION['tabla']);
    $_SESSION["tabla"] = "Categories";
    $cabecera2 = $dbCategoria->getColumnsName();
    $contenido2 = $dbCategoria->read(0, 10);
    $info = [$cabecera2, $contenido2];
    $controller->template("tabla.php", "template.php", $info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "logout") {
    $controller->logout();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categorias" && !isset($array_ruta[1])) {
    echo $controller->categorias();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "products" && !isset($array_ruta[1])) {
    echo $controller->productos();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categories" && !isset($array_ruta[1])) {
    echo $controller->categories();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "eliminarCategories" && isset($array_ruta[1])) {
    $controller->eliminarCategoria((int)$array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "eliminarProducts" && isset($array_ruta[1])) {
    $controller->eliminarProducto((int)$array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "products" && isset($array_ruta[1]) && $array_ruta[1] == "id") {
    echo $controller->idProd();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categories" && isset($array_ruta[1]) && $array_ruta[1] == "id") {
    echo $controller->idCat();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarCategories" && isset($array_ruta[1]) && !isset($array_ruta[2])) {
    $cat = $dbCategoria->getById((int)$array_ruta[1]);
    $info = array_values(json_decode(json_encode($cat), true));
    $controller->showEditCat($info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarProducts" && isset($array_ruta[1]) && !isset($array_ruta[2])) {
    $cat = $dbObjeto->getById((int)$array_ruta[1]);
    $info = json_decode(json_encode($cat), true);
    $info[9] = $controller->maxIdCat();
    $prod = array_values($info);
    $controller->showEdit($prod);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarCategories" && isset($array_ruta[1]) && isset($array_ruta[2]) && $array_ruta[2] == "processCategoria") {
    $controller->processCategoria();
}else if (isset($array_ruta[0]) && $array_ruta[0] == "editarProducts" && isset($array_ruta[1]) && isset($array_ruta[2]) && $array_ruta[2] == "processProduct") {
    $controller->processProducto();
} else {
    $controller->error();
}