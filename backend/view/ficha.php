<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../view/home.css">
</head>
<body>
<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="../../home" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="../../../dashboard/img/logo.png" class="bi me-2" width="40" height="40">
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../home" class="nav-link px-2 link-dark">Home</a></li>
                <li><a href="../home/contacto" class="nav-link px-2 link-dark">Contacto</a></li>
            </ul>

            <form onsubmit="buscador(this.firstElementChild)" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3"
                  role="search" method="post" action="../home/products">
                <input type="text" name="buscar" class="form-control" placeholder="Search..." aria-label="Search">
            </form>
            <?php if (isset($_SESSION["login"])) {
                echo "<div class='dropdown text-end'>
            <a href='#' class='d-block link-dark text-decoration-none dropdown-toggle' data-bs-toggle='dropdown'
               aria-expanded='false'>
                <img src='https://github.com/mdo.png' alt='mdo' width='32' height='32' class='rounded-circle'>
            </a>
            <ul id='perfil' class='dropdown-menu text-small'>
                <li><a class='dropdown-item' href='#'>Profile</a></li>
                <li>
                    <hr class='dropdown-divider'>
                </li>
                <li><a class='dropdown-item' href='home/logout'>Sign out</a></li>
            </ul>
        </div>";
            } else {
                echo "<a href='../home/login' class='btn btn-primary'>Iniciar sesión</a>&nbsp;&nbsp;";
                echo "<a href='../home/registro' class='btn btn-light'>Registrarse</a>";
            } ?>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="card col-md-12 p-3">
            <div class="row">
                <div class="col-md-4">
                    <img class="w-100" src="<?php echo $info->getImagen1(); ?>">
                </div>
                <div class="col-md-8">
                    <div class="card-block">
                        <h6 class="card-title"><?php echo $info->getNombre(); ?></h6>
                        <p class="card-text text-justify">
                        <div>
                            Características:
                            <ul>
                                <li class="list-unstyled"><?php echo $info->getDescripcion(); ?></li>
                                <li class="list-unstyled">Latitud: <?php echo $info->getLatitud(); ?></li>
                                <li class="list-unstyled">Longitud: <?php echo $info->getLongitud(); ?></li>
                                <li class="list-unstyled">Precio: <?php echo $info->getPrecio(); ?> Christokens</li>
                            </ul>
                        </div>
                        <br>

                        <?php if (isset($comentarios) && !empty($comentarios)) {
                            echo '<div>';
                            echo 'Comentarios: ';
                            echo "<ul>";
                            for ($i = 0; $i < count($comentarios); $i++) {
                                echo "<li class='list-unstyled'>" . $comentarios[$i][0] . "</li>";
                            }
                            echo "</ul>";
                        } ?>

                    </div>
                    </p>
                    <?php if (isset($_SESSION["loginU"])) {
                        echo '<a href="../../home" class="btn btn-primary">Comprar</a>';
                    } else {
                        echo '<a href="../../home/login" class="btn btn-primary">Inicia sesión para comprar el producto</a>';
                    } ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>
