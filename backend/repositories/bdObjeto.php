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

    function read()
    {
        $arrayObjetos = [];
        $db = Conexion::acceso();
        try {
            $sql = "select * from objeto";
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
        if (isset($array["Nombre"]) && !empty($array["Nombre"])) {
            $nombre = $array["Nombre"];
        } else {
            $nombre = $obj->getNombre();
        }
        if (isset($array["Precio"]) && !empty($array["Precio"])) {
            $precio = (float)$array["Precio"];
        } else {
            $precio = $obj->getPrecio();
        }
        if (isset($array["Imagen_1"]) && !empty($array["Imagen_1"])) {
            $imagen1 = $array["Imagen_1"];
        } else {
            $imagen1 = $obj->getImagen1();
        }
        if (isset($array["Imagen_2"]) && !empty($array["Imagen_2"])) {
            $imagen2 = $array["Imagen_2"];
        } else {
            $imagen2 = $obj->getImagen2();
        }
        if (isset($array["Imagen_3"]) && !empty($array["Imagen_3"])) {
            $imagen3 = $array["Imagen_3"];
        } else {
            $imagen3 = $obj->getImagen3();
        }
        if (isset($array["Latitud"]) && !empty($array["Latitud"])) {
            $latitud = (float)$array["Latitud"];
        } else {
            $latitud = $obj->getLatitud();
        }
        if (isset($array["Longitud"]) && !empty($array["Longitud"])) {
            $longitud = (float)$array["Longitud"];
        } else {
            $longitud = $obj->getLongitud();
        }
        if (isset($array["Id_Categoria"]) && !empty($array["Id_Categoria"])) {
            $idcat = (int)$array["Id_Categoria"];
        } else {
            $idcat = $obj->getIdCategoria();
        }
        $db = Conexion::acceso();
        try {
            $sql = "update objeto set Nombre='$nombre',Precio=$precio,Imagen_1='$imagen1',Latitud=$latitud,Imagen_2='$imagen2',Imagen_3='$imagen3',Longitud=$longitud,Id_Categoria=$idcat where ID_Producto = $id";
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
}