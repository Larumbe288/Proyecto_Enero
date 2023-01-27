<?php

/**
 *
 */
class bdComentario
{
    /**
     * @param string $texto
     * @param int $idUsuario
     * @param int $idObjeto
     * @param string $fecha
     * @return void
     */
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

    /**
     * @param $campo
     * @param $principio
     * @return false|string|void
     */
    function read($campo, $principio)
    {
        $arrayComentarios = [];
        $db = Conexion::acceso();
        try {
            $sql = "select * from comentario order by $campo asc limit $principio,10";
            $comentarios = $db->query($sql);
            foreach ($comentarios as $comentario) {
                $com = new comentario((int)$comentario["Id_Comentario"], $comentario["Texto"], (int)$comentario["Id_Usuario"], (int)$comentario["Id_Objeto"], $comentario["Fecha"]);
                array_push($arrayComentarios, $com);
            }
            return json_encode($arrayComentarios);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    /**
     * @param int $id
     * @return comentario|void
     */
    function getById(int $id)
    {
        $db = Conexion::acceso();
        try {
            $sql = "select * from comentario where Id_Comentario=$id";
            $resultado = $db->query($sql);
            $comentario = $resultado->fetch();
            if ($comentario) {
                return new comentario((int)$comentario["Id_Comentario"], $comentario["Texto"], (int)$comentario["Id_Usuario"], (int)$comentario["Id_Objeto"], $comentario["Fecha"]);
            }
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

    /**
     * @param int $id
     * @return void
     */
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

    /**
     * @return array|void
     */
    function getColumnsName()
    {
        $columns = [];
        $db = Conexion::acceso();
        try {
            $sql = "SELECT `COLUMN_NAME` FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'comentario' AND TABLE_SCHEMA = 'metaverso'";
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
            $sql = "SELECT COUNT(Id_Comentario) FROM comentario";
            $ides = $db->query($sql);
            $ID = 0;
            foreach ($ides as $id) {
                $ID = $id['COUNT(Id_Comentario)'];
            }
            return $ID;
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    /**
     * @param int $id
     * @return array|false|void
     */
    public function getComentariosPorObjeto(int $id)
    {
        $db = Conexion::acceso();
        try {
            $sql = "select Texto from comentario where Id_Usuario=$id";
            $result = $db->query($sql);
            $mensajes = $result->fetchAll();
            return $mensajes;
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }
}