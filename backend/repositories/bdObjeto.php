<?php

class bdObjeto
{
    function create(string $nombre, float $precio, string $imagen1, string $imagen2 = null, string $imagen3 = null, float $latitud = null, float $longitud = null, int $idCategoria)
    {
        $db = Conexion::acceso();
        try {
            $sql = "insert into objeto(Nombre,Precio,Imagen_1,Latitud,Imagen_2,Imagen_3,Longitud,Id_Categoria) values('$nombre',$precio,'$imagen1',$latitud,'$imagen2','$imagen3',$longitud,$idCategoria)";
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

    function read($principio, $final)
    {
        $arrayObjetos = [];
        $db = Conexion::acceso();
        try {
            $sql = "select * from objeto limit $principio,$final";
            $objetos = $db->query($sql);
            foreach ($objetos as $obj) {
                $ob = new objeto((int)$obj["ID_Producto"], $obj["Nombre"], (float)$obj["Precio"], $obj["Imagen_1"], $obj["Imagen_2"], $obj["Imagen_3"], (float)$obj["Latitud"], (float)$obj["Longitud"], (int)$obj["Id_Categoria"]);
                array_push($arrayObjetos, $ob);
            }
            return json_encode($arrayObjetos);
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
            $sql = "select * from objeto where ID_Producto=$id";
            $resultado = $db->query($sql);
            $obj = $resultado->fetch();
            if ($obj) {
                return new objeto((int)$obj["ID_Producto"], $obj["Nombre"], (float)$obj["Precio"], $obj["Imagen_1"], $obj["Imagen_2"], $obj["Imagen_3"], (float)$obj["Latitud"], (float)$obj["Longitud"], (int)$obj["Id_Categoria"]);
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    function update(int $id, $array)
    {
        $obj = $this->getById($id);
        $arrayAtributos = ["Nombre", "Precio", "Imagen1", "Imagen2", "Imagen3", "Latitud", "Longitud", "IdCategoria"];
        foreach ($arrayAtributos as $atr) {
            if (isset($array[$atr]) && !empty($array[$atr])) {
                $metodo = "set" . $atr;
                $obj->$metodo($array[$atr]);
            }
        }
        $db = Conexion::acceso();
        try {
            $sql = "update objeto set Nombre='" . $obj->getNombre() . "',Precio=" . $obj->getPrecio() . ",Imagen_1='" . $obj->getImagen1() . "',Latitud=" . $obj->getLatitud() . ",Imagen_2='" . $obj->getImagen2() . "',Imagen_3='" . $obj->getImagen3() . "',Longitud=" . $obj->getLongitud() . ",Id_Categoria=" . $obj->getIdCategoria() . " where ID_Producto = $id";
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

    function delete($id)
    {
        $db = Conexion::acceso();
        try {
            $sql = "delete from objeto where ID_Producto=$id";
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

    function getColumnsName()
    {
        $columns = [];
        $db = Conexion::acceso();
        try {
            $sql = "SELECT `COLUMN_NAME` FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'objeto'";
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
}