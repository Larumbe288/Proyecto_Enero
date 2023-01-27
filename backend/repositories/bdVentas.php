<?php

/**
 *
 */
class bdVentas
{
    /**
     * @param $idusr
     * @param $idprod
     * @return void
     */
    function create($idusr, $idprod)
    {
        $db = Conexion::acceso();
        try {
            $sql = "insert into compras(Id_Compra,Id_Usuario) values($idusr,$idprod)";
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
    function read($campo, $principio, $final)
    {
        $arrayVentas = [];
        $db = Conexion::acceso();
        try {
            $sql = "select * from compras order by $campo asc limit $principio,$final";
            $resultado = $db->query($sql);
            foreach ($resultado as $v) {
                $v = new compra((int)$v['Id_Compra'], (int)$v['Id_Usuario'], (int)$v['Id_Producto'], $v['Fecha']);
                array_push($arrayVentas, $v);
            }
            return json_encode($arrayVentas);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }

    /**
     * @param int $id
     * @return compra|void
     */
    public function getById(int $id)
    {
        $db = Conexion::acceso();
        try {
            $sql = "select * from compras where Id_Compra=$id";
            $compra = $db->query($sql);
            $v = $compra->fetch();
            return new compra((int)$v['Id_Compra'], (int)$v['Id_Usuario'], (int)$v['Id_Producto'], $v['Fecha']);
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
        $venta = $this->getById($id);
        $arrayAtributos = ["IdUsuario", "IdProducto"];
        foreach ($arrayAtributos as $atr) {
            if (isset($array[$atr]) && !empty($array[$atr])) {
                $metodo = "set" . $atr;
                $venta->$metodo($array[$atr]);
            }
        }
        $db = Conexion::acceso();
        try {
            $sql = "update compras set Id_Usuario='" . $venta->getIdusuario() . "',Id_Producto='" . $venta->getIdProducto() . "' where Id_Categoria=$id";
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
            $sql = "delete from compras where Id_Compra=$id";
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
    public function getColumnsName()
    {
        $columns = [];
        $db = Conexion::acceso();
        try {
            $sql = "SELECT `COLUMN_NAME` FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'compras' AND TABLE_SCHEMA = 'metaverso'";
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
            $sql = "SELECT COUNT(Id_Compra) FROM compras";
            $ides = $db->query($sql);
            $ID = 0;
            foreach ($ides as $id) {
                $ID = $id['COUNT(Id_Compra)'];
            }
            return $ID;
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
    }


}