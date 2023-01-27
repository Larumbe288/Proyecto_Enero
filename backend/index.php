<?php
//Incluyo los archivos necesarios
require("model/Conexion.php");
require "model/objeto.php";
require "model/categoria.php";
require "model/usuario.php";
require "model/compra.php";
require "model/comentario.php";
require "model/mailer.php";
require("repositories/bdUsuario.php");
require "repositories/bdCategoria.php";
require "repositories/bdObjeto.php";
require "repositories/bdVentas.php";
require "repositories/bdComentario.php";
require "./controller/controller.php";
require "./controller/FrontController.php";
require "./controller/ProductController.php";
require "./controller/CategoryController.php";
session_start();
$dbObjeto = new bdObjeto();
$dbCategoria = new bdCategoria();
$dbUser = new bdUsuario();
$dbSales = new bdVentas();
$dbComments = new bdComentario();
//Instancio el controlador
$controller = new controller();
$frontcontroller = new FrontController();
$prodcontroller = new ProductController();
$catcontroller = new CategoryController();
//Ruta de la home
$home = "/web/backend/index.php/";
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
    $controller->control();
    unset($_SESSION['tabla']);
    $_SESSION["tabla"] = "Products";
    $info = $prodcontroller->getDatosTablaObj();
    $controller->template("tabla.php", "template.php", $info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "dashboard" && !isset($array_ruta[2])) {
    $controller->control();
    $controller->template("homeAdmin.php", "template.php", 0);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "categories" && !isset($array_ruta[2])) {
    $controller->control();
    unset($_SESSION['tabla']);
    $_SESSION["tabla"] = "Categories";
    $info = $catcontroller->getDatosTablaCat();
    $controller->template("tabla.php", "template.php", $info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "users" && !isset($array_ruta[2])) {
    $controller->control();
    unset($_SESSION['tabla']);
    $_SESSION["tabla"] = "Users";
    $info = $controller->getDatosTablaUsr();
    $controller->template("tabla.php", "template.php", $info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "sales" && !isset($array_ruta[2])) {
    $controller->control();
    unset($_SESSION['tabla']);
    $_SESSION["tabla"] = "Sales";
    $info = $controller->getDatosTablaSales();
    $controller->template("tabla.php", "template.php", $info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "comments" && !isset($array_ruta[2])) {
    $controller->control();
    unset($_SESSION['tabla']);
    $_SESSION["tabla"] = "Comments";
    $info = $controller->getDatosTablaCom();
    $controller->template("tabla.php", "template.php", $info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "logout") {
    $controller->logout();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categorias" && !isset($array_ruta[1])) {
    echo $catcontroller->categorias2();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "products" && !isset($array_ruta[1])) {
    echo $prodcontroller->productos();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "users" && !isset($array_ruta[1])) {
    echo $controller->users();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categories" && !isset($array_ruta[1])) {
    echo $catcontroller->categories();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "sales" && !isset($array_ruta[1])) {
    echo $controller->sales();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "comments" && !isset($array_ruta[1])) {
    echo $controller->comments();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "eliminarCategories" && isset($array_ruta[1])) {
    $catcontroller->eliminarCategoria((int)$array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "eliminarProducts" && isset($array_ruta[1])) {
    $prodcontroller->eliminarProducto((int)$array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "eliminarUsers" && isset($array_ruta[1])) {
    $controller->deleteUser((int)$array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "eliminarComments" && isset($array_ruta[1])) {
    $controller->deleteComments((int)$array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "products" && isset($array_ruta[1]) && $array_ruta[1] == "id") {
    echo $prodcontroller->idProd();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categories" && isset($array_ruta[1]) && $array_ruta[1] == "id") {
    echo $catcontroller->idCat();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "users" && isset($array_ruta[1]) && $array_ruta[1] == "id") {
    echo $controller->idUser();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "sales" && isset($array_ruta[1]) && $array_ruta[1] == "id") {
    echo $controller->idSales();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "comments" && isset($array_ruta[1]) && $array_ruta[1] == "id") {
    echo $controller->idComments();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarCategories" && isset($array_ruta[1]) && !isset($array_ruta[2])) {
    $controller->control();
    $catcontroller->showEditCat((int)$array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarProducts" && isset($array_ruta[1]) && !isset($array_ruta[2])) {
    $controller->control();
    $prodcontroller->showEdit((int)$array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarUsers" && isset($array_ruta[1]) && !isset($array_ruta[2])) {
    $controller->control();
    $controller->showEditUsr((int)$array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarComments" && isset($array_ruta[1]) && !isset($array_ruta[2])) {
    $controller->control();
    $controller->showEditCom((int)$array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "aniadirUsers" && !isset($array_ruta[1])) {
    $controller->control();
    $controller->aniadirUsrs();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "aniadirCategories" && !isset($array_ruta[1])) {
    $controller->control();
    $catcontroller->aniadirCat();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "aniadirProducts" && !isset($array_ruta[1])) {
    $controller->control();
    $prodcontroller->aniadirProd();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarCategories" && isset($array_ruta[1]) && isset($array_ruta[2]) && $array_ruta[2] == "processCategoria") {
    $catcontroller->processCategoria();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarProducts" && isset($array_ruta[1]) && isset($array_ruta[2]) && $array_ruta[2] == "processProduct") {
    $prodcontroller->processProducto();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarComments" && isset($array_ruta[1]) && isset($array_ruta[2]) && $array_ruta[2] == "processComment") {
    $controller->processComentario();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarUsers" && isset($array_ruta[1]) && isset($array_ruta[2]) && $array_ruta[2] == "processUser") {
    $controller->processUsers();
} else if (isset($array_ruta[0]) && isset($array_ruta[1]) && $array_ruta[1] == "processUser") {
    $controller->processaniadirUsr();
} else if (isset($array_ruta[0]) && isset($array_ruta[1]) && $array_ruta[1] == "processCategoria") {
    $catcontroller->processaniadirCat();
} else if (isset($array_ruta[0]) && isset($array_ruta[1]) && $array_ruta[1] == "processProduct") {
    $prodcontroller->processaniadirProd();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && !isset($array_ruta[1])) {
    $info = $catcontroller->categorias();
    $cant = $catcontroller->idCat();
    $productos = $frontcontroller->getProductosComprados();
    $frontcontroller->homePage($info, $cant, $productos);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categoorias" && !isset($array_ruta[1])) {
    echo $catcontroller->categoriasJSON();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "login" && !isset($array_ruta[2])) {
    $frontcontroller->loginHome();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "registro" && !isset($array_ruta[2])) {
    $frontcontroller->registro();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "logout" && !isset($array_ruta[2])) {
    $frontcontroller->logoutHome();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "contacto" && !isset($array_ruta[2])) {
    $info = $catcontroller->categorias();
    $cant = $catcontroller->idCat();
    $frontcontroller->contacto($info, $cant);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "profile" && !isset($array_ruta[2])) {
    $frontcontroller->profile();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "products" && !isset($array_ruta[2])) {
    $frontcontroller->showProducts();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "products" && isset($array_ruta[2])) {
    $frontcontroller->mostrarFicha((int)$array_ruta[2]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "contacto" && isset($array_ruta[2]) && $array_ruta[2] == "process") {
    $frontcontroller->processContacto();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "registro" && isset($array_ruta[2]) && $array_ruta[2] == "process") {
    $frontcontroller->processRegistro();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "login" && isset($array_ruta[2]) && $array_ruta[2] == "process") {
    $frontcontroller->processLoginHome();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "prooductos" && !isset($array_ruta[1])) {
    echo $frontcontroller->processBuscador();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "prooductos" && isset($array_ruta[1]) && $array_ruta[1] == "id") {
    echo $frontcontroller->idBuscador();
} else {
    $frontcontroller->error();
}