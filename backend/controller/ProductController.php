<?php

/**
 *
 */
class ProductController
{
    /**
     * @return false|string|null
     */
    public function productos()
    {
        $db = new bdObjeto();
        if (isset($_POST["inicio"])) {
            $inicio = (int)$_POST["inicio"];
        } else {
            $inicio = 0;
        }
        if (isset($_POST["campo"])) {
            $campo = $_POST["campo"];
        } else {
            $campo = "ID_Producto";
        }
        return $db->read($campo, $inicio, 10);
    }

    /**
     * @return int|mixed|null
     */
    public function idProd()
    {
        $db = new bdObjeto();
        return $db->getMaxId();
    }

    /**
     * @param $id
     * @return void
     */
    public function eliminarProducto($id)
    {
        $dbObjeto = new bdObjeto();
        $dbObjeto->delete($id);
        header("Location: ../admin/products");

    }

    /**
     * @param $id
     * @return void
     */
    public function showEdit($id)
    {
        $dbObjeto = new bdObjeto();
        $cat = $dbObjeto->getById((int)$id);
        $info = json_decode(json_encode($cat), true);
        $info[10] = $this->maxIdCat();
        $prod = array_values($info);
        require "view/editarProducto.php";
    }

    /**
     * @return array
     */
    public function getDatosTablaObj()
    {
        $dbObjeto = new bdObjeto();
        $cabecera = $dbObjeto->getColumnsName();
        $info = [$cabecera];
        return $info;
    }

    /**
     * @return void
     */
    public function aniadirProd()
    {
        $dbObjeto = new bdObjeto();
        $contenido = $dbObjeto->getIdes();
        $cabecera = $dbObjeto->getMaxIdProd() + 1;
        $info = [$cabecera, $contenido];
        require "view/aniadirProducto.php";
    }

    /**
     * @return void
     */
    public function processaniadirProd()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && preg_match("/^[A-ZÁÉÍÓÚ][a-záéíóú]+$/", $_POST["nombre"])) {
                    $nombre = $_POST["nombre"];
                } else {
                    header("Location: ../admin/products/aniadirProducts");
                }
                if (isset($_POST["precio"]) && !empty($_POST["precio"]) && preg_match("/^(\d)*(\.)?([0-9]{1,4})?$/", $_POST["precio"])) {
                    $precio = $_POST["precio"];
                } else {
                    header("Location: ../admin/products/aniadirProducts");
                }
                if (isset($_POST["latitud"]) && preg_match("/^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$/", $_POST["latitud"])) {
                    $latitud = (float)$_POST["latitud"];
                } else {
                    $latitud = (float)'';
                }
                if (isset($_POST["longitud"]) && preg_match("/^-?([1]?[1-7][1-9]|[1]?[1-8][0]|[1-9]?[0-9])\.{1}\d{1,6}$/", $_POST["longitud"])) {
                    $longitud = (float)$_POST["longitud"];
                } else {
                    $longitud = (float)'';
                }
                if (isset($_POST["idCat"]) && !empty($_POST["idCat"])) {
                    $idCat = (int)$_POST["idCat"];
                } else {
                    header("Location: ../admin/products/aniadirProducts");
                }
                $dbProd = new bdObjeto();
                $id = $dbProd->getMaxIdProd() + 1;
                $imagen1 = $this->imagenAniadirProd($id, 1);
                $imagen2 = $this->imagenAniadirProd($id, 2);
                $imagen3 = $this->imagenAniadirProd($id, 3);
                $dbProd->create($nombre, $precio, $imagen1, $imagen2, $imagen3, $latitud, $longitud, $idCat);
                header("Location: ../admin/products");
            }
        }
    }

    /**
     * @param $id
     * @param $ide
     * @return string|void
     */
    private function imagenAniadirProd($id, $ide)
    {
        mkdir($_SERVER['DOCUMENT_ROOT'] . "/web/backend/view/imgProducts/" . $id);
        $temporal = $_FILES["imagen" . $ide]["tmp_name"];
        $fileName = $_FILES["imagen" . $ide]["name"];
        $path = $_SERVER['DOCUMENT_ROOT'] . "/web/backend/view/imgProducts/" . $id . "/{$fileName}";
        $absolutePath = __DIR__ . '/' . $path;
        if (!file_exists($absolutePath)) {
            move_uploaded_file($temporal, $path);
            if ($fileName != '') {
                return "http://localhost/web/backend/view/imgProducts/" . $id . "/{$fileName}";
            } else {
                return "";
            }

        }
    }

    /**
     * @return void
     */
    public function processProducto()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                if (isset($_POST['idProd']) && !empty($_POST['idProd'])) {
                    $id = (int)$_POST['idProd'];
                } else {
                    header("Location: ../../admin/products");
                }
                $dir = $_SERVER['DOCUMENT_ROOT'] . "/web/backend/view/imgProducts/" . $_POST['idProd'];
                if (!is_dir($dir)) {
                    mkdir($dir);
                }
                $dbObjeto = new bdObjeto();
                $this->vaciarCarpeta();
                $img = $this->imagen("");
                $img2 = $this->imagen(2);
                $img3 = $this->imagen(3);
                if (isset($_POST["nombre"]) && !empty($_POST['nombre']) && preg_match("/^[A-ZÁÉÍÓÚ][a-záéíóú]+$/", $_POST["nombre"])) {
                    $nombre = $_POST["nombre"];
                } else {
                    header("Location: ../../admin/products/editarProducts/" . $id);
                }
                if (isset($_POST["precio"]) && !empty($_POST["precio"]) && preg_match("/^(\d)*(\.)?([0-9]{1,4})?$/", $_POST["precio"])) {
                    $precio = (float)$_POST["precio"];
                } else {
                    header("Location: ../../admin/products/editarProducts/" . $id);
                }
                if (isset($_POST["latitud"]) && preg_match("/^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$/", $_POST["latitud"])) {
                    $latitud = (float)$_POST["latitud"];
                } else {
                    header("Location: ../../admin/products/editarProducts/" . $id);
                }
                if (isset($_POST["longitud"]) && preg_match("/^-?([1]?[1-7][1-9]|[1]?[1-8][0]|[1-9]?[0-9])\.{1}\d{1,6}$/", $_POST["longitud"])) {
                    $longitud = (float)$_POST["longitud"];
                } else {
                    header("Location: ../../admin/products/editarProducts/" . $id);
                }
                $array = array("Nombre" => $nombre, "Precio" => $precio, "Imagen1" => $img, "Imagen2" => $img2, "Imagen3" => $img3, "Latitud" => $latitud, "Longitud" => $longitud, "IdCategoria" => (int)$_POST["idCat"]);
                $dbObjeto->update($id, $array);
                header("Location: ../../admin/products");
            }
        }
    }

    /**
     * @param $id
     * @return string|void|null
     */
    private function imagen($id)
    {
        if (isset($_FILES["imagen" . $id]["name"]) && !empty($_FILES["imagen" . $id]["name"])) {
            $temporal = $_FILES["imagen" . $id]["tmp_name"];
            $fileName = $_FILES["imagen" . $id]["name"];
            $path = $_SERVER['DOCUMENT_ROOT'] . "/web/backend/view/imgProducts/" . $_POST['idProd'] . "/{$fileName}";
            $absolutePath = __DIR__ . '/' . $path;
            if (!file_exists($absolutePath)) {
                move_uploaded_file($temporal, $path);
                return "http://localhost/web/backend/view/imgProducts/" . $_POST['idProd'] . "/{$fileName}";
            }
        } else {
            return NULL;
        }

    }

    private function vaciarCarpeta()
    {
        $dir = $_SERVER['DOCUMENT_ROOT'] . "/web/backend/view/imgProducts/" . $_POST['idProd'];
        $files = glob($dir . "/*"); //obtenemos todos los nombres de los ficheros
        foreach ($files as $file) {
            if (is_file($file))
                unlink($file); //elimino el fichero
        }
    }

    /**
     * @return int|mixed|null
     */
    public function maxIdCat()
    {
        $db = new bdCategoria();
        return $db->getMaxIdCat();
    }
}