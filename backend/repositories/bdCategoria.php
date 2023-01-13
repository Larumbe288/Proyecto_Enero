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
        $arrayAtributos = ["Nombre", "Descripcion", "Imagen"];
        foreach ($arrayAtributos as $atr) {
            if (isset($array[$atr]) && !empty($array[$atr])) {
                $metodo = "set" . $atr;
                $cat->$metodo($array[$atr]);
            }
        }
        $db = Conexion::acceso();
        try {
            $sql = "update categoria set Nombre='".$cat->getNombre()."',Descripcion='".$cat->getDescripcion()."',Imagen='".$cat->getImagen()."' where Id_Categoria=$id";
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