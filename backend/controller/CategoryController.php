<?php
class CategoryController
{
    public function categorias()
    {
        if (isset($_POST["cantidad"])) {
            $cantidad = (int)$_POST["cantidad"];
        } else {
            $cantidad = 4;
        }
        $dbObjecto = new bdObjeto();
        return $dbObjecto->getCategorias($cantidad);
    }
    public function categoriasJSON()
    {
        $dbObjeto = new bdObjeto();
        if (isset($_POST["cantidad"])) {
            $cantidad = (int)$_POST["cantidad"];
        } else {
            $cantidad = 4;
        }
        return $dbObjeto->getCategoriasJSON($cantidad);
    }
    public function categorias2()
    {
        $dbObjecto = new bdObjeto();
        return $dbObjecto->getCategorias2();
    }
    public function idCat()
    {
        $db = new bdCategoria();
        return $db->getMaxId();
    }
    public function categories()
    {
        $dbCategoria = new bdCategoria();
        if (isset($_POST["inicio"])) {
            $principio = (int)$_POST["inicio"];
        } else {
            $principio = 0;
        }
        if (isset($_POST["campo"])) {
            $campo = $_POST["campo"];
        } else {
            $campo = "Id_Categoria";
        }
        return $dbCategoria->read($campo, $principio, 10);
    }
    public function eliminarCategoria($id)
    {
        $dbCategoria = new bdCategoria();
        if ($dbCategoria->delete($id)) {
            header("Location: ../admin/categories");
        }
    }
    public function getDatosTablaCat()
    {
        $dbUser = new bdCategoria();
        $cabecera2 = $dbUser->getColumnsName();
        $info = [$cabecera2];
        return $info;
    }
    public function showEditCat($info)
    {
        $dbCategoria = new bdCategoria();
        $cat = $dbCategoria->getById((int)$info);
        $info = array_values(json_decode(json_encode($cat), true));
        require "view/editarCategoria.php";
    }
    public function aniadirCat()
    {
        $dbCategoria = new bdCategoria();
        $info = $dbCategoria->getMaxIdCat() + 1;
        require "view/aniadirCategoria.php";
    }
    public function processaniadirCat()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                $nombre = $_POST["nombre"];
                $descripcion = $_POST["descripcion"];
                $dbCategoria = new bdCategoria();
                $id = $dbCategoria->getMaxIdCat() + 1;
                mkdir($_SERVER['DOCUMENT_ROOT'] . "/web/backend/view/imgCategories/" . $id);
                $temporal = $_FILES["imagen"]["tmp_name"];
                $fileName = $_FILES["imagen"]["name"];
                $path = $_SERVER['DOCUMENT_ROOT'] . "/web/backend/view/imgCategories/" . $id . "/{$fileName}";
                $absolutePath = __DIR__ . '/' . $path;
                if (!file_exists($absolutePath)) {
                    move_uploaded_file($temporal, $path);
                    $imagen = "http://localhost/web/backend/view/imgCategories/" . $id . "/{$fileName}";
                }
                $dbCategoria->create($nombre, $descripcion, $imagen);
                header("Location: ../admin/categories");
            }
        }
    }
    public function processCategoria()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['submit'])) {
                if (isset($_POST['idCat']) && !empty($_POST['idCat'])) {
                    $id = (int)$_POST['idCat'];
                } else {
                    header("Location: ../../admin/categories");
                }
                $dbCategoria = new bdCategoria();
                $temporal = $_FILES["imagen"]["tmp_name"];
                $fileName = $_FILES["imagen"]["name"];
                $path = $_SERVER['DOCUMENT_ROOT'] . "/web/backend/view/imgCategories/" . $_POST['idCat'] . "/{$fileName}";

                $absolutePath = __DIR__ . '/' . $path;
                $dir = $_SERVER['DOCUMENT_ROOT'] . "/web/backend/view/imgCategories/" . $_POST['idCat'];
                if(!is_dir($dir)) {
                    mkdir($dir);
                }
                if (!file_exists($absolutePath)) {
                    $files = glob($dir . "/*"); //obtenemos todos los nombres de los ficheros
                    foreach ($files as $file) {
                        if (is_file($file))
                            unlink($file); //elimino el fichero
                    }
                    move_uploaded_file($temporal, $path);
                    $categoryImg = "http://localhost/web/backend/view/imgCategories/" . $_POST['idCat'] . "/{$fileName}";
                }
                $array = array("Nombre" => $_POST["nombre"], "Descripcion" => $_POST["descripcion"], "Imagen" => $categoryImg,);
                $dbCategoria->update($id, $array);
                header("Location: ../../admin/categories");
            }
        }
    }
}