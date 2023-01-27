<?php

/**
 *
 */
class CategoryController
{
    /**
     * @return array|null
     */
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

    /**
     * @return false|string|null
     */
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

    /**
     * @return false|string|null
     */
    public function categorias2()
    {
        $dbObjecto = new bdObjeto();
        return $dbObjecto->getCategorias2();
    }

    /**
     * @return int|mixed|null
     */
    public function idCat()
    {
        $db = new bdCategoria();
        return $db->getMaxId();
    }

    /**
     * @return false|string|null
     */
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

    /**
     * @param $id
     * @return void
     */
    public function eliminarCategoria($id)
    {
        $dbCategoria = new bdCategoria();
        if ($dbCategoria->delete($id)) {
            header("Location: ../admin/categories");
        }
    }

    /**
     * @return array
     */
    public function getDatosTablaCat()
    {
        $dbUser = new bdCategoria();
        $cabecera2 = $dbUser->getColumnsName();
        $info = [$cabecera2];
        return $info;
    }

    /**
     * @param $info
     * @return void
     */
    public function showEditCat($info)
    {
        $dbCategoria = new bdCategoria();
        $cat = $dbCategoria->getById((int)$info);
        $info = array_values(json_decode(json_encode($cat), true));
        require "view/editarCategoria.php";
    }

    /**
     * @return void
     */
    public function aniadirCat()
    {
        $dbCategoria = new bdCategoria();
        $info = $dbCategoria->getMaxIdCat() + 1;
        require "view/aniadirCategoria.php";
    }

    /**
     * @return void
     */
    public function processaniadirCat()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && preg_match("/^[A-ZÁÉÍÓÚ][a-záéíóú]+$/", $_POST["nombre"])) {
                    $nombre = $_POST["nombre"];
                } else {
                    header("Location: ../admin/products/aniadirCategories");
                }
                if (isset($_POST["descripcion"]) && !empty($_POST["descripcion"]) && preg_match("/^[a-zA-Z0-9]+(?:[\s.]+[a-zA-Z0-9]+)*$/g", $_POST["descripcion"])) {
                    $descripcion = $_POST["descripcion"];
                } else {
                    header("Location: ../admin/products/aniadirCategories");
                }
                $dbCategoria = new bdCategoria();
                $id = $dbCategoria->getMaxIdCat() + 1;
                mkdir($_SERVER['DOCUMENT_ROOT'] . "/web/backend/view/imgCategories/" . $id);
                if (isset($_FILES["imagen"]["name"]) && !empty($_FILES["imagen"]["name"])) {
                    $temporal = $_FILES["imagen"]["tmp_name"];
                    $fileName = $_FILES["imagen"]["name"];
                    $path = $_SERVER['DOCUMENT_ROOT'] . "/web/backend/view/imgCategories/" . $id . "/{$fileName}";
                    $absolutePath = __DIR__ . '/' . $path;
                    if (!file_exists($absolutePath)) {
                        move_uploaded_file($temporal, $path);
                        $imagen = "http://localhost/web/backend/view/imgCategories/" . $id . "/{$fileName}";
                    }
                } else {
                    $imagen = NULL;
                }

                $dbCategoria->create($nombre, $descripcion, $imagen);
                header("Location: ../admin/categories");
            }
        }
    }

    /**
     * @return void
     */
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
                if (isset($_FILES["imagen"]["name"]) && !empty($_FILES["imagen"]["name"])) {
                    $temporal = $_FILES["imagen"]["tmp_name"];
                    $fileName = $_FILES["imagen"]["name"];
                    $path = $_SERVER['DOCUMENT_ROOT'] . "/web/backend/view/imgCategories/" . $_POST['idCat'] . "/{$fileName}";

                    $absolutePath = __DIR__ . '/' . $path;
                    $dir = $_SERVER['DOCUMENT_ROOT'] . "/web/backend/view/imgCategories/" . $_POST['idCat'];
                    if (!is_dir($dir)) {
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
                } else {
                    $categoryImg = NULL;
                }
                if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && preg_match("/^[A-ZÁÉÍÓÚ][a-záéíóú]+$/", $_POST["nombre"])) {
                    $nombre = $_POST["nombre"];
                } else {
                    header("Location: ../admin/products/aniadirCategories");
                }
                if (isset($_POST["descripcion"]) && !empty($_POST["descripcion"]) && preg_match("/^[a-zA-Z0-9]+(?:[\s.]+[a-zA-Z0-9]+)*$/g", $_POST["descripcion"])) {
                    $descripcion = $_POST["descripcion"];
                } else {
                    header("Location: ../admin/products/aniadirCategories");
                }
                $array = array("Nombre" => $nombre, "Descripcion" => $descripcion, "Imagen" => $categoryImg,);
                $dbCategoria->update($id, $array);
                header("Location: ../../admin/categories");
            }
        }
    }
}