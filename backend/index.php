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
session_start();
$dbObjeto = new bdObjeto();
$dbCategoria = new bdCategoria();
$dbUser = new bdUsuario();
$dbSales = new bdVentas();
$dbComments = new bdComentario();
//Instancio el controlador
$controller = new controller();
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
//    $controller->home();
    $controller->control();
    unset($_SESSION['tabla']);
    $_SESSION["tabla"] = "Products";
    $cabecera = $dbObjeto->getColumnsName();
    $contenido = $dbObjeto->read("ID_Producto", 0, 10);
    $info = [$cabecera, $contenido];
    $controller->template("tabla.php", "template.php", $info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "dashboard" && !isset($array_ruta[2])) {
    $controller->control();
    $info = 0;
    $controller->template("homeAdmin.php", "template.php", $info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "categories" && !isset($array_ruta[2])) {
    $controller->control();
    unset($_SESSION['tabla']);
    $_SESSION["tabla"] = "Categories";
    $cabecera2 = $dbCategoria->getColumnsName();
    $contenido2 = $dbCategoria->read("Id_Categoria", 0, 10);
    $info = [$cabecera2, $contenido2];
    $controller->template("tabla.php", "template.php", $info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "users" && !isset($array_ruta[2])) {
    $controller->control();
    unset($_SESSION['tabla']);
    $_SESSION["tabla"] = "Users";
    $cabecera2 = $dbUser->getColumnsName();
    $contenido2 = $dbUser->read("Id_Usuario", 0, 10);
    $info = [$cabecera2, $contenido2];
    $controller->template("tabla.php", "template.php", $info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "sales" && !isset($array_ruta[2])) {
    $controller->control();
    unset($_SESSION['tabla']);
    $_SESSION["tabla"] = "Sales";
    $cabecera2 = $dbSales->getColumnsName();
    $contenido2 = $dbSales->read("Id_Compra", 0, 10);
    $info = [$cabecera2, $contenido2];
    $controller->template("tabla.php", "template.php", $info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "comments" && !isset($array_ruta[2])) {
    $controller->control();
    unset($_SESSION['tabla']);
    $_SESSION["tabla"] = "Comments";
    $cabecera2 = $dbComments->getColumnsName();
    $contenido2 = $dbComments->read("Id_Comentario", 10);
    $info = [$cabecera2, $contenido2];
    $controller->template("tabla.php", "template.php", $info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "logout") {
    $controller->logout();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categorias" && !isset($array_ruta[1])) {
    echo $controller->categorias2();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "products" && !isset($array_ruta[1])) {
    echo $controller->productos();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "users" && !isset($array_ruta[1])) {
    echo $controller->users();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categories" && !isset($array_ruta[1])) {
    echo $controller->categories();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "sales" && !isset($array_ruta[1])) {
    echo $controller->sales();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "comments" && !isset($array_ruta[1])) {
    echo $controller->comments();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "eliminarCategories" && isset($array_ruta[1])) {
    $controller->eliminarCategoria((int)$array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "eliminarProducts" && isset($array_ruta[1])) {
    $controller->eliminarProducto((int)$array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "eliminarUsers" && isset($array_ruta[1])) {
    $controller->deleteUser((int)$array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "eliminarComments" && isset($array_ruta[1])) {
    $controller->deleteComments((int)$array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "products" && isset($array_ruta[1]) && $array_ruta[1] == "id") {
    echo $controller->idProd();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categories" && isset($array_ruta[1]) && $array_ruta[1] == "id") {
    echo $controller->idCat();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "users" && isset($array_ruta[1]) && $array_ruta[1] == "id") {
    echo $controller->idUser();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "sales" && isset($array_ruta[1]) && $array_ruta[1] == "id") {
    echo $controller->idSales();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "comments" && isset($array_ruta[1]) && $array_ruta[1] == "id") {
    echo $controller->idComments();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarCategories" && isset($array_ruta[1]) && !isset($array_ruta[2])) {
    $controller->control();
    $cat = $dbCategoria->getById((int)$array_ruta[1]);
    $info = array_values(json_decode(json_encode($cat), true));
    $controller->showEditCat($info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarProducts" && isset($array_ruta[1]) && !isset($array_ruta[2])) {
    $controller->control();
    $cat = $dbObjeto->getById((int)$array_ruta[1]);
    $info = json_decode(json_encode($cat), true);
    $info[9] = $controller->maxIdCat();
    $prod = array_values($info);
    $controller->showEdit($prod);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarUsers" && isset($array_ruta[1]) && !isset($array_ruta[2])) {
    $controller->control();
    $cat = $dbUser->getById((int)$array_ruta[1]);
    $info = json_decode(json_encode($cat), true);
    $prod = array_values($info);
    $controller->showEditUsr($prod);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarComments" && isset($array_ruta[1]) && !isset($array_ruta[2])) {
    $controller->control();
    $cat = $dbComments->getById((int)$array_ruta[1]);
    $info = json_decode(json_encode($cat), true);
    $prod = array_values($info);
    $controller->showEditCom($prod);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "aniadirUsers" && !isset($array_ruta[1])) {
    $controller->control();
    $info = $dbUser->maxId() + 1;
    $controller->aniadirUsrs($info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "aniadirCategories" && !isset($array_ruta[1])) {
    $controller->control();
    $info = $dbCategoria->getMaxIdCat() + 1;
    $controller->aniadirCat($info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "aniadirProducts" && !isset($array_ruta[1])) {
    $controller->control();
    $contenido = $dbObjeto->getIdes();
    $cabecera = $dbObjeto->getMaxIdProd() + 1;
    $info = [$cabecera, $contenido];
    $controller->aniadirProd($info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarCategories" && isset($array_ruta[1]) && isset($array_ruta[2]) && $array_ruta[2] == "processCategoria") {
    $controller->processCategoria();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarProducts" && isset($array_ruta[1]) && isset($array_ruta[2]) && $array_ruta[2] == "processProduct") {
    $controller->processProducto();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarComments" && isset($array_ruta[1]) && isset($array_ruta[2]) && $array_ruta[2] == "processComment") {
    $controller->processComentario();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "editarUsers" && isset($array_ruta[1]) && isset($array_ruta[2]) && $array_ruta[2] == "processUser") {
    $controller->processUsers();
} else if (isset($array_ruta[0]) && isset($array_ruta[1]) && $array_ruta[1] == "processUser") {
    $controller->processaniadirUsr();
} else if (isset($array_ruta[0]) && isset($array_ruta[1]) && $array_ruta[1] == "processCategoria") {
    $controller->processaniadirCat();
} else if (isset($array_ruta[0]) && isset($array_ruta[1]) && $array_ruta[1] == "processProduct") {
    $controller->processaniadirProd();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && !isset($array_ruta[1])) {
    $info = $controller->categorias();
    $cant = $controller->idCat();
    $productos = $controller->getProductosComprados();
    $controller->homePage($info, $cant, $productos);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categoorias" && !isset($array_ruta[1])) {
    echo $controller->categoriasJSON();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "login" && !isset($array_ruta[2])) {
    $controller->loginHome();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "registro" && !isset($array_ruta[2])) {
    $controller->registro();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "logout" && !isset($array_ruta[2])) {
    $controller->logoutHome();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "contacto" && !isset($array_ruta[2])) {
    $info = $controller->categorias();
    $cant = $controller->idCat();
    $controller->contacto($info, $cant);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "profile" && !isset($array_ruta[2])) {
    $id = (int)$_SESSION["idUser"];
    echo $id;
    $info = $dbUser->getById($id);
    $controller->profile($info);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "products" && !isset($array_ruta[2])) {
    require("view/productos.php");
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "products" && isset($array_ruta[2])) {
    $info = $dbObjeto->getById((int)$array_ruta[2]);
    $comentarios = $dbComments->getComentariosPorObjeto((int)$array_ruta[2]);
    require("view/ficha.php");
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "contacto" && isset($array_ruta[2]) && $array_ruta[2] == "process") {
    $controller->processContacto();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "registro" && isset($array_ruta[2]) && $array_ruta[2] == "process") {
    $controller->processRegistro();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && isset($array_ruta[1]) && $array_ruta[1] == "login" && isset($array_ruta[2]) && $array_ruta[2] == "process") {
    $controller->processLoginHome();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "prooductos" && !isset($array_ruta[1])) {
    echo $controller->processBuscador();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "prooductos" && isset($array_ruta[1]) && $array_ruta[1] == "id") {
    echo $controller->idBuscador();
} else {
    $controller->error();
}