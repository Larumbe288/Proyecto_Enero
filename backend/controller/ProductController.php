<?php
class ProductController
{
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
    public function idProd()
    {
        $db = new bdObjeto();
        return $db->getMaxId();
    }
    public function eliminarProducto($id)
    {
        $dbObjeto = new bdObjeto();
        $dbObjeto->delete($id);
        header("Location: ../admin/products");

    }
    public function showEdit($id)
    {
        $dbObjeto = new bdObjeto();
        $cat = $dbObjeto->getById((int)$id);
        $info = json_decode(json_encode($cat), true);
        $info[10] = $this->maxIdCat();
        $prod = array_values($info);
        require "view/editarProducto.php";
    }
    public function getDatosTablaObj()
    {
        $dbObjeto = new bdObjeto();
        $cabecera = $dbObjeto->getColumnsName();
        $info = [$cabecera];
        return $info;
    }
    public function aniadirProd()
    {
        $dbObjeto = new bdObjeto();
        $contenido = $dbObjeto->getIdes();
        $cabecera = $dbObjeto->getMaxIdProd() + 1;
        $info = [$cabecera, $contenido];
        require "view/aniadirProducto.php";
    }
    public function processaniadirProd()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                if (isset($_POST["nombre"]) && !empty($_POST["nombre"])) {
                    $nombre = $_POST["nombre"];
                } else {
                    $nombre = '';
                }
                if (isset($_POST["precio"]) && !empty($_POST["precio"])) {
                    $precio = $_POST["precio"];
                } else {
                    $precio = '';
                }
                if (isset($_POST["latitud"]) && !empty($_POST["latitud"])) {
                    $latitud = (float)$_POST["latitud"];
                } else {
                    $latitud = (float)'';
                }
                if (isset($_POST["longitud"]) && !empty($_POST["longitud"])) {
                    $longitud = (float)$_POST["longitud"];
                } else {
                    $longitud = (float)'';
                }
                if (isset($_POST["idCat"]) && !empty($_POST["idCat"])) {
                    $idCat = (int)$_POST["idCat"];
                } else {
                    $idCat = '';
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
                if(!is_dir($dir)) {
                    mkdir($dir);
                }
                $dbObjeto = new bdObjeto();
                $this->vaciarCarpeta();
                $img = $this->imagen("");
                $img2 = $this->imagen(2);
                $img3 = $this->imagen(3);
                $array = array("Nombre" => $_POST["nombre"], "Precio" => (float)$_POST["precio"], "Imagen1" => $img, "Imagen2" => $img2, "Imagen3" => $img3, "Latitud" => (float)$_POST["latitud"], "Longitud" => (float)$_POST["longitud"], "IdCategoria" => (int)$_POST["idCat"]);
                $dbObjeto->update($id, $array);
                header("Location: ../../admin/products");
            }
        }
    }
    private function imagen($id)
    {
        $temporal = $_FILES["imagen" . $id]["tmp_name"];
        $fileName = $_FILES["imagen" . $id]["name"];
        $path = $_SERVER['DOCUMENT_ROOT'] . "/web/backend/view/imgProducts/" . $_POST['idProd'] . "/{$fileName}";
        $absolutePath = __DIR__ . '/' . $path;
        if (!file_exists($absolutePath)) {
            move_uploaded_file($temporal, $path);
            return "http://localhost/web/backend/view/imgProducts/" . $_POST['idProd'] . "/{$fileName}";
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
    public function maxIdCat()
    {
        $db = new bdCategoria();
        return $db->getMaxIdCat();
    }
}