<?php

class bbdd {
function login($user,$password) {
    $db = Conexion::acceso();
    try {
        $sql = "select Correo,Nombre from usuario where Correo='$user' and Password='$password' and Rol='admin'";
        $usuarios = $db->query($sql);
        return $usuarios->fetch();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $db = null;
    }
}
}