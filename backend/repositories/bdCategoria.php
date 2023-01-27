<?php

/**
 *
 */
class bdCategoria
{
    /**
     * @param string $nombre
     * @param string $descripcion
     * @param string $imagen
     * @return void
     */
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

    /**
     * @param $campo
     * @param $principio
     * @param $final
     * @return false|string|void
     */
    public function read($campo, $principio, $final)
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

    /**
     * @return false|string|void
     */
    public function readAll()
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
            return json_encode($arrayCat);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    /**
     * @param int $id
     * @return categoria|void
     */
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


    /**
     * @param int $id
     * @param $array
     * @return void
     */
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

    /**
     * @param int $id
     * @return bool|void
     */
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

    /**
     * @return array|void
     */
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

    /**
     * @return int|mixed|void
     */
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

    /**
     * @return int|mixed|void
     */
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