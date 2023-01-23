<?php

class bdCategoria
{
    public function create(string $nombre, string $descripcion, string $imagen)
    {
        $db = Conexion::acceso();
        try {
            $sql = "insert into categoria (Nombre,Descripcion,Imagen) values('$nombre','$descripcion','$imagen')";
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

    public function read($campo,$principio, $final)
    {
        $arrayCat = [];
        $db = Conexion::acceso();
        try {
            $sql = "select * from categoria order by $campo asc limit $principio,$final";
            $resultado = $db->query($sql);
            foreach ($resultado as $cat) {
                $c = new Categoria((int)$cat["Id_Categoria"], $cat["Nombre"], $cat["Descripcion"], $cat["Imagen"]);
                array_push($arrayCat, $c);
            }
            return json_encode($arrayCat);
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
            $sql = "select * from categoria where Id_Categoria=$id";
            $cat = $db->query($sql);
            $c = $cat->fetch();
            return new categoria((int)$c["Id_Categoria"], $c["Nombre"], $c["Descripcion"], $c["Imagen"]);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }


    public function update(int $id, $array)
    {
        $cat = $this->getById($id);
        $arrayAtributos = ["Nombre", "Descripcion", "Imagen"];
        foreach ($arrayAtributos as $atr) {
            if (isset($array[$atr]) && !empty($array[$atr])) {
                $metodo = "set" . $atr;
                $cat->$metodo($array[$atr]);
            }
        }
        $db = Conexion::acceso();
        try {
            $sql = "update categoria set Nombre='" . $cat->getNombre() . "',Descripcion='" . $cat->getDescripcion() . "',Imagen='" . $cat->getImagen() . "' where Id_Categoria=$id";
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
            $sql = "delete from categoria where Id_Categoria=$id";
            $result = $db->query($sql);
            if (!$result) {
                echo "Error:" . $db->errorInfo();
                return false;
            } else {
                return true;
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
            $sql = "SELECT `COLUMN_NAME` FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'categoria' AND TABLE_SCHEMA = 'metaverso'";
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
            $sql = "SELECT COUNT(Id_Categoria) FROM categoria";
            $ides = $db->query($sql);
            $ID = 0;
            foreach ($ides as $id) {
                $ID = $id['COUNT(Id_Categoria)'];
            }
            return $ID;
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    function getMaxIdCat()
    {
        $db = Conexion::acceso();
        try {
            $sql = "SELECT MAX(Id_Categoria) FROM categoria";
            $ides = $db->query($sql);
            $ID = 0;
            foreach ($ides as $id) {
                $ID = $id['MAX(Id_Categoria)'];
            }
            return $ID;
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }
}