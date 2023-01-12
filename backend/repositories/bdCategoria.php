<?php

class bdCategoria
{
    public function create(string $nombre, string $descripcion, string $imagen)
    {
        $db = Conexion::acceso();
        try {
            $sql = "insert into categoria (Nombre,Descripcion,Imagen) values($nombre,$descripcion,$imagen)";
            $resultado = $db->query($sql);
            if (!$resultado) {
                echo $db->errorInfo();
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }

    }

    public function read()
    {
        $arrayCat = [];
        $db = Conexion::acceso();
        try {
            $sql = "select * from categoria";
            $resultado = $db->query($sql);
            foreach ($resultado as $cat) {
                $c = new Categoria((int)$cat["Id_Categoria"], $cat["Nombre"], $cat["Descripcion"], $cat["Imagen"]);
                array_push($arrayCat, $c);
            }
            return $arrayCat;
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    public function getById(int $id)
    {
        $db = Conexion::acceso();
        try {
            $sql = "select * from categoria where id=$id";
            $cat = $db->query($sql);
            if ($cat->fetch()) {
                return new Categoria((int)$cat["Id_Categoria"], $cat["Nombre"], $cat["Descripcion"], $cat["Imagen"]);
            } else {
                echo "Error:" . $db->errorInfo();
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }


    public function update(int $id, $array)
    {
        $cat = $this->getById($id);
        if (isset($array["nombre"]) && !empty($array["nombre"])) {
            $nombre = $array["nombre"];
        } else {
            $nombre = $cat->getNombre();
        }
        if (isset($array["descripcion"]) && !empty($array["descripcion"])) {
            $descripcion = $array["descripcion"];
        } else {
            $descripcion = $cat->getDescripcion();
        }
        if (isset($array["imagen"]) && !empty($array["imagen"])) {
            $imagen = $array["imagen"];
        } else {
            $imagen = $cat->getImagen();
        }
        $db = Conexion::acceso();
        try {
            $sql = "update categoria set Nombre='$nombre',Descripcion='$descripcion',Imagen='$imagen' where Id_Categoria=$id";
            $result = $db->query($sql);
            if (!$result) {
                echo $db->errorInfo();
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    public function delete(int $id)
    {
        $db = Conexion::acceso();
        try {
            $sql = "delete from categoria where id=$id";
            $result = $db->query($sql);
            if (!$result) {
                echo "Error:" . $db->errorInfo();
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }
}