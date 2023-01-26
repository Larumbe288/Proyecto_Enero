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

    function loginHome($user, $password)
    {
        $db = Conexion::acceso();
        try {
            $sql = "select Correo,Nombre from usuario where Correo='$user' and Password='$password'";
            $usuarios = $db->query($sql);
            return $usuarios->fetch();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    function create($user, $password, $nombre, $telefono, $rol)
    {
        $db = Conexion::acceso();
        try {
            $sql = "insert into usuario(Correo,Nombre,Telefono,Christokens,Password,Rol) values ('$user', '$nombre','$telefono',100,'$password','$rol')";
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

    function read($campo, $principio, $final)
    {
        $arrayUsuarios = [];
        $db = Conexion::acceso();
        try {
            $sql = "select * from usuario order by $campo asc limit $principio,$final";
            $usuarios = $db->query($sql);
            foreach ($usuarios as $usuario) {
                $usr = new usuario((int)$usuario["Id_Usuario"], $usuario["Correo"], $usuario["Nombre"], $usuario["Telefono"], (float)$usuario["Christokens"], $usuario["Password"], $usuario["Rol"]);
                array_push($arrayUsuarios, $usr);
            }
            return json_encode($arrayUsuarios);
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

    function getIdByCorreo($correo) {
        $db = Conexion::acceso();
        try {
            $sql = "select Id_Usuario from usuario where Correo='$correo'";
            $res = $db->query($sql);
            $result = $res->fetch();
            if($result) {
                return $result["Id_Usuario"];
            }
        } catch(\PDOException $e) {
        echo "Error: ".$e->getMessage();
        } finally {
        $db=null;
        }
    }

    function update(int $id, $array)
    {
        $usr = $this->getById($id);
        $arrayAtributos = ["Correo", "Nombre", "Telefono", "Christokens", "Password"];
        foreach ($arrayAtributos as $atr) {
            if (isset($array[$atr]) && !empty($array[$atr])) {
                $metodo = "set" . $atr;
                $usr->$metodo($array[$atr]);
            }
        }
        $db = Conexion::acceso();
        try {
            $sql = "update usuario set Correo='" . $usr->getCorreo() . "',Nombre='" . $usr->getNombre() . "',Telefono='" . $usr->getTelefono() . "',Christokens=" . $usr->getChristokens() . ",Password='" . $usr->getPassword() . "' where Id_Usuario=$id";
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

    function getColumnsName()
    {
        $columns = [];
        $db = Conexion::acceso();
        try {
            $sql = "SELECT `COLUMN_NAME` FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'usuario' AND TABLE_SCHEMA = 'metaverso'";
            $columnas = $db->query($sql);
            foreach ($columnas as $col) {
                array_push($columns, $col);
            }
            return $columns;
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    function getMaxId()
    {
        $db = Conexion::acceso();
        try {
            $sql = "SELECT COUNT(Id_Usuario) FROM usuario";
            $ides = $db->query($sql);
            $ID = 0;
            foreach ($ides as $id) {
                $ID = $id['COUNT(Id_Usuario)'];
            }
            return $ID;
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }

    }

    public function maxId()
    {
        $db = Conexion::acceso();
        try {
            $sql = "SELECT MAX(Id_Usuario) FROM usuario";
            $ides = $db->query($sql);
            $ID = 0;
            foreach ($ides as $id) {
                $ID = $id['MAX(Id_Usuario)'];
            }
            return $ID;
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }

    }

}