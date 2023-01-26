<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../view/home.css">
</head>
<body>
<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="../../home" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="../../dashboard/img/logo.png" class="bi me-2" width="40" height="40">
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../home" class="nav-link px-2 link-dark">Home</a></li>
                <li><a href="../home/contacto" class="nav-link px-2 link-dark">Contacto</a></li>
            </ul>
            <?php if (isset($_SESSION["loginU"])) {
                echo "<div class='dropdown text-end'>
            <a href='#' class='d-block link-dark text-decoration-none dropdown-toggle' data-bs-toggle='dropdown'
               aria-expanded='false'>
                <img src='https://github.com/mdo.png' alt='mdo' width='32' height='32' class='rounded-circle'>
            </a>
            <ul id='perfil' class='dropdown-menu text-small'>
                <li><a class='dropdown-item' href=../profile>Profile</a></li>
                <li>
                    <hr class='dropdown-divider'>
                </li>
                <li><a class='dropdown-item' href='../home/logout'>Sign out</a></li>
            </ul>
        </div>";
            } else {
                echo "<a href='../home/login' class='btn btn-primary'>Iniciar sesión</a>&nbsp;&nbsp;";
                echo "<a href='../home/registro' class='btn btn-light'>Registrarse</a>";
            } ?>
        </div>
    </div>
</header>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px"
                     src="http://localhost/web/backend/view/imgUsers/user.webp">
                <span class="font-weight-bold"><?php echo $info->getNombre(); ?></span>
                <span class="text-black-50"><?php echo $info->getCorreo(); ?></span>
            </div>
        </div>
        <div class="col-md-9 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Perfil</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels">Nombre</label>
                        <input type="text" class="form-control" placeholder="Nombre..."
                               value="<?php echo $info->getNombre(); ?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Teléfono</label>
                        <input type="tel" class="form-control" placeholder="Teléfono..."
                               value="<?php echo $info->getTelefono(); ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Christokens</label>
                        <input readonly type="number" class="form-control"
                               value="<?php echo $info->getChristokens(); ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Contraseña</label>
                        <input type="password" class="form-control" placeholder="Introducir contraseña"
                               value="<?php echo $info->getPassword(); ?>">
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" disabled type="button">Guardar perfil</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>
