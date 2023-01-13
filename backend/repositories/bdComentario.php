<?php

class bdComentario
{
    function create(string $texto, int $idUsuario, int $idObjeto, string $fecha)
    {
        $db = Conexion::acceso();
        try {
            $sql = "insert into comentario(Texto,Id_Usuario,Id_Objeto,Fecha) values('$texto',$idUsuario,$idObjeto,'$fecha')";
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
        $arrayComentarios = [];
        $db = Conexion::acceso();
        try {
            $sql = "select * from comentario";
            $comentarios = $db->query($sql);
            foreach ($comentarios as $comentario) {
                $com = new comentario((int)$comentario["Id_Comentario"], $comentario["Texto"], (int)$comentario["Id_Usuario"], (int)$comentario["UId_Objeto"], $comentario["Fecha"]);
                array_push($arrayComentarios, $com);
            }
            return json_encode($arrayComentarios);
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
            $sql = "select * from comentario where Id_Comentario=$id";
            $resultado = $db->query($sql);
            $comentario = $resultado->fetch();
            if ($com) {
                return new comentario((int)$comentario["Id_Comentario"], $comentario["Texto"], (int)$comentario["Id_Usuario"], (int)$comentario["Id_Objeto"], $comentario["Fecha"]);
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    function update(int $id, $array)
    {
        $comentario = $this->getById($id);
        $arrayAtributos = ["Texto", "IdUsuario", "Fecha", "IdObjeto"];
        foreach ($arrayAtributos as $atr) {
            if (isset($array[$atr]) && !empty($array[$atr])) {
                $metodo = "set" . $atr;
                $comentario->$metodo($array[$atr]);
            }
        }
        $db = Conexion::acceso();
        try {
            $sql = "update comentario set Texto='".$comentario->getTexto()."',Id_Usuario=".$comentario->getIdUsuario().",Id_Objeto=".$comentario->getIdObjeto().",Fecha='".$comentario->getFecha()."' where Id_Comentario=$id";
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
            $sql = "delete from comentario where Id_Comentario=$id";
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