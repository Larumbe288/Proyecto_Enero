<?php

class bdUsuario
{
    function login($user, $password)
    {
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

    function create($user, $password, $nombre, $telefono, float $dinero, $rol)
    {
        $db = Conexion::acceso();
        try {
            $sql = "insert into usuario(Correo,Nombre,Telefono,Christokens,Password,Rol) values ('$user', '$nombre','$telefono',$dinero,'$password','$rol')";
            $resultado = $db->query($sql);
            if (!$resultado) {
                echo "Error: " . $db->errorInfo();
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    function read()
    {
        $arrayUsuarios = [];
        $db = Conexion::acceso();
        try {
            $sql = "select * from usuario";
            $usuarios = $db->query($sql);
            foreach ($usuarios as $usuario) {
                $usr = new usuario((int)$usuario["Id_Usuario"], $usuario["Correo"], $usuario["Nombre"], $usuario["Telefono"], (float)$usuario["Christokens"], $usuario["Password"], $usuario["Rol"]);
                array_push($arrayUsuarios, $usr);
            }
            return $arrayUsuarios;
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    function getById(int $id)
    {
        $db = Conexion::acceso();
        try {
            $sql = "select * from usuario where Id_Usuario=$id";
            $result = $db->query($sql);
            $usuario = $result->fetch();
            if ($usuario) {
                return new usuario((int)$usuario["Id_Usuario"], $usuario["Correo"], $usuario["Nombre"], $usuario["Telefono"], (float)$usuario["Christokens"], $usuario["Password"], $usuario["Rol"]);
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    function update(int $id,$array)
    {
        $usr = $this->getById($id);
        if(isset($array["Correo"]) && !empty($array["Correo"])) {
            $correo = $array["Correo"];
        } else {
            $correo = $usr->getCorreo();
        }
        if(isset($array["Nombre"]) && !empty($array["Nombre"])) {
            $nombre = $array["Nombre"];
        } else {
            $nombre = $usr->getNombre();
        }
        if(isset($array["Telefono"]) && !empty($array["Telefono"])) {
            $telefono = $array["Telefono"];
        } else {
            $telefono = $usr->getTelefono();
        }
        if(isset($array["Christokens"]) && !empty($array["Christokens"])) {
            $dinero = (float) $array["Christokens"];
        } else {
            $dinero = $usr->getChristokens();
        }
        if(isset($array["Password"]) && !empty($array["Password"])) {
            $password = $array["Password"];
        } else {
            $password = $usr->getPassword();
        }
        if(isset($array["Rol"]) && !empty($array["Rol"])) {
            $rol = $array["Rol"];
        } else {
            $rol = $usr->getRol();
        }
    }

    function delete(int $id)
    {
        $db = Conexion::acceso();
        try {
            $sql = "delete from usuario where Id_Usuario=$id";
            $result = $db->query($sql);
            if (!$result) {
                echo "Error: " . $db->errorInfo();
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

}