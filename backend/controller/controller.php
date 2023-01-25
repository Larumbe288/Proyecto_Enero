<?php


class controller
{
    public function showLogin(): void
    {
        require "view/login.php";
    }

    public function autenticacion(): void
    {
        $user = "";
        $password = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                if (isset($_POST["username"]) && !empty($_POST["username"]) && preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", $_POST["username"])) {
                    $user = $_POST["username"];
                }
                if (isset($_POST["password"]) && !empty($_POST["password"]) && preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST["password"])) {
                    $password = $_POST["password"];
                }
                if (isset($_SESSION["login"])) {
                    header("Location:../dashboard");
                } else {
                    $db = new bdUsuario();
                    if ($db->login($user, sha1($password))) {
                        $_SESSION["login"] = $user;
                        header("Location:../dashboard");
                    } else {
                        $_SESSION["error"] = true;
                        header("Location:../login");
                    }
                }
            }
        } else {
            header("Location:../login");
        }


    }

    public function home()
    {
        include "model/control.php";
        require "view/categorias.php";
    }

    public function rememberPassword()
    {
        require "view/recordarpassword.html";
    }

    public function logout()
    {
        session_destroy();
        header("Location: http://localhost/web/backend/index.php/admin/login");
    }

    public function logoutHome()
    {
        session_destroy();
        header("Location: http://localhost/web/backend/index.php/home");
    }

    public function ficha()
    {
        require "view/ficha.html";
    }

    public function admin()
    {
        if (!isset($_SESSION["login"])) {
            header("Location: admin/login");
        } else {
            header("Location: admin/dashboard");
        }
    }

    public function prueba()
    {
        $dbObjecto = new bdObjeto();
        return $dbObjecto->getCategorias();
    }

    public function template($contenido, $plantilla, $info)
    {
        require "view/" . $plantilla;
    }

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

    public function idProd()
    {
        $db = new bdObjeto();
        return $db->getMaxId();
    }

    public function idCat()
    {
        $db = new bdCategoria();
        return $db->getMaxId();
    }

    public function maxIdCat()
    {
        $db = new bdCategoria();
        return $db->getMaxIdCat();
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

    public function eliminarProducto($id)
    {
        $dbObjeto = new bdObjeto();
        $dbObjeto->delete($id);
        header("Location: ../admin/products");

    }

    public function showEdit($info)
    {
        require "view/editarProducto.php";
    }

    public function showEditCat($info)
    {
        require "view/editarCategoria.php";
    }

    public function showEditUsr($info)
    {
        require "view/editarUsuario.php";
    }

    public function aniadirUsrs($info)
    {
        require "view/aniadirUsuario.php";
    }

    public function aniadirCat($info)
    {
        require "view/aniadirCategoria.php";
    }

    public function aniadirProd($info)
    {
        require "view/aniadirProducto.php";
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

    public function processaniadirUsr()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                $correo = $_POST["correo"];
                $nombre = $_POST["nombre"];
                $tel = $_POST["tel"];
                $dinero = (float)$_POST["dinero"];
                if ($_POST["password"] == $_POST["password2"] && preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST["password"])) {
                    $password = sha1($_POST["password"]);
                } else {
                    $_SESSION["error"] = "El usuario no ha podido ser añadido";
                    header("Location: ../admin/users");
                }
                $rol = 'usuario';
                $dbUsuario = new bdUsuario();
                $dbUsuario->create($correo, $password, $nombre, $tel, $dinero, $rol);
                header("Location: ../admin/users");
            }
        }
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

    public function processProducto()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                if (isset($_POST['idProd']) && !empty($_POST['idProd'])) {
                    $id = (int)$_POST['idProd'];
                } else {
                    header("Location: ../../admin/products");
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

    public function users()
    {
        $dbUsers = new bdUsuario();
        if (isset($_POST['inicio'])) {
            $principio = (int)$_POST['inicio'];
        } else {
            $principio = 0;
        }
        if (isset($_POST['campo'])) {
            $campo = $_POST['campo'];
        } else {
            $campo = "Id_Usuario";
        }
        return $dbUsers->read($campo, $principio, 10);
    }

    public function idUser()
    {
        $db = new bdUsuario();
        return $db->getMaxId();
    }

    public function idSales()
    {
        $db = new bdVentas();
        return $db->getMaxId();
    }

    public function sales()
    {
        $dbCategoria = new bdVentas();
        if (isset($_POST["inicio"])) {
            $principio = (int)$_POST["inicio"];
        } else {
            $principio = 0;
        }
        if (isset($_POST["campo"])) {
            $campo = $_POST["campo"];
        } else {
            $campo = "Id_Compra";
        }
        return $dbCategoria->read($campo, $principio, 10);
    }

    public function comments()
    {
        $dbCategoria = new bdComentario();
        if (isset($_POST["inicio"])) {
            $principio = (int)$_POST["inicio"];
        } else {
            $principio = 0;
        }
        if (isset($_POST["campo"])) {
            $campo = $_POST["campo"];
        } else {
            $campo = "Id_Comentario";
        }
        return $dbCategoria->read($campo, $principio);
    }

    public function idComments()
    {
        $db = new bdComentario();
        return $db->getMaxId();
    }

    public function control()
    {
        include "model/control.php";
    }

    public function processUsers()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                if (isset($_POST["idUsr"]) && !empty($_POST["idUsr"])) {
                    $id = (int)$_POST["idUsr"];
                    $dbUsr = new bdUsuario();
                    $array = array("Correo" => $_POST["correo"], "Nombre" => $_POST["nombre"], "Telefono" => $_POST["tel"], "Christokens" => $_POST["dinero"], "Password" => $_POST["password"]);
                    echo $dbUsr->update($id, $array);
                }
                header("Location: ../../admin/users");

            }
        }
    }

    public function deleteUser($id)
    {
        $dbUsers = new bdUsuario();
        $dbUsers->delete($id);
        header("Location: ../admin/users");
    }

    public function homePage($info, $booleano, $productos)
    {
        require "view/home.php";
    }

    public function loginHome()
    {
        require "view/loginHome.php";
    }

    public function showEditCom($info)
    {
        require "view/editarComentario.php";
    }

    public function processComentario()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                $id = (int)$_POST["idCom"];
                $texto = $_POST["nombre"];
                $idusr = (int)$_POST["idUsr"];
                $idProd = (int)$_POST["idProd"];
                $array = array("Texto" => $texto, "IdUsuario" => $idusr, "IdObjeto" => $idProd);
                $dbCom = new bdComentario();
                $dbCom->update($id, $array);
                header("Location: ../../admin/comments");
            }
        }
    }

    public function processLoginHome()
    {
        if (isset($_SESSION["loginU"])) {
            header("Location: ../../home");
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["submit"])) {
                    if (isset($_POST["user"]) && !empty($_POST["user"]) && isset($_POST["password"]) && !empty($_POST["password"]) && preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", $_POST["user"]) && preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST["password"])) {
                        $user = $_POST["user"];
                        $password = sha1($_POST["password"]);
                        $dbUser = new bdUsuario();
                        unset($_SESSION["error"]);
                        $dbUser->loginHome($user, $password);
                        $_SESSION["loginU"] = true;
                        $_SESSION["idUser"]= $dbUser->getIdByCorreo($user);
                        header("Location: ../../home");
                    } else {
                        $_SESSION["error"] = "El usuario y/o la contraseña son incorrectos";
                        header("Location: ../login");
                    }
                }
            }
        }
    }

    public function processRegistro()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                if (isset($_POST["user"]) && !empty($_POST["user"]) && preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", $_POST["user"]) && isset($_POST["password"]) && !empty($_POST["password"]) && preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST["password"]) && isset($_POST["nombre"]) && !empty($_POST["nombre"]) && preg_match("/^[A-ZÁÉÍÓÚ][a-záéíóú]+$/", $_POST["nombre"]) && isset($_POST["tel"]) && !empty($_POST["tel"]) && preg_match("/^\d{9}$/", $_POST["tel"])) {
                    $correo = $_POST["user"];
                    $password = $_POST["password"];
                    $nombre = $_POST["nombre"];
                    $tel = $_POST["tel"];
                    $dbUsuario = new bdUsuario();
                    $dbUsuario->create($correo, $password, $nombre, $tel, "usuario");
                    $_SESSION["loginU"] = true;
                    $_SESSION["idUser"]= $dbUsuario->getIdByCorreo($correo);
                    header("Location: ../../home");
                } else {
                    $_SESSION["errorR"] = "El usuario introducido ya existe";
                    header("Location: ../registro");
                }
            }
        }
    }

    public function getProductosComprados()
    {
        $dbObjeto = new bdObjeto();
        return $dbObjeto->productosMasVendidos();
    }

    public function getProductosComentarios(int $id)
    {
        $dbObjeto = new bdObjeto();
        return $dbObjeto->productosComentados($id);
    }

    public function registro()
    {
        require "view/registro.php";
    }

    public function processBuscador()
    {
        $dbObjeto = new bdObjeto();
        if(isset($_POST["buscar"])) {
            $texto = $_POST["buscar"];
        } else {
            $texto = '';
        }
        if(isset($_POST["inicio"])) {
            $principio = (int) $_POST["inicio"];
        } else {
            $principio=0;
        }
        return $dbObjeto->buscador($texto,$principio);
    }

    public function processContacto()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["comentario"]) && !empty($_POST["comentario"])) {
                    $email = $_POST["email"];
                    $text = $_POST["comentario"];
                    $texto = "Correo: " . $email . "<br>" . "Nombre: " . $_POST["nombre"] . "<br>" . "Mensaje: " . $text;
                    $m = new Mailer\Mailer('alvarolarumbe97@gmail.com', $email, '', '', $texto);
                    $m->enviarEmail();
                    header("Location: ../contacto");
                }
            }
        }
    }

    public function contacto($info, $booleano)
    {
        require "view/contacto.php";
    }

    public function deleteComments(int $id)
    {
        $dbComentarios = new bdComentario();
        $dbComentarios->delete($id);
        header("Location: ../admin/comments");
    }

    public
    function error()
    {
//        require "view/productos.php";
    }
}