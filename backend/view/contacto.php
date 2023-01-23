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
    <link rel="stylesheet" href="../../view/sign-in.css">
</head>

<body>
<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="../home" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="../../dashboard/img/logo.png" class="bi me-2" width="40" height="40">
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../home" class="nav-link px-2 link-dark">Home</a></li>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="outline: none">
                        Categorías
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Deportes imposibles</a></li>
                        <li><a class="dropdown-item" href="#">Placeres gastronómicos digitales</a></li>
                        <li><a class="dropdown-item" href="#">Viajes virtuales</a></li>
                    </ul>
                </div>
                <li><a href="../home/contacto" class="nav-link px-2 link-dark">Contacto</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>
            <?php if (isset($_SESSION["loginU"])) {
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
                    <li><a class='dropdown-item' href='../home/logout'>Sign out</a></li>
                </ul>
            </div>";
            } else {
                echo "<a href='../home/login' class='btn btn-primary'>Iniciar sesión</a>";
            } ?>
        </div>
    </div>
</header>
<div id="formularioMovil" class="text-center d-block d-sm-none">
    <main class="form-signin w-100 m-auto">
        <form method="post" action="login/process">
            <img class="mb-4" src="../../dashboard/img/logo.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 fw-normal">Contacta con nosotros</h1>

            <div class="form-floating">
                <input type="email" class="form-control mb-3" name="user" id="floatingInput"
                       placeholder="name@example.com">
                <label for="floatingInput">Correo electrónico</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control mb-3" name="nombre" id="floatingPassword"
                       placeholder="Nombre">
                <label for="floatingPassword">Nombre</label>
            </div>
            <div class="form-floating">
                <textarea class="form-control mb-3" placeholder="Leave a comment here" id="floatingTextarea2"
                          style="height: 300px;width: 300px"></textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary my-3" name="submit" type="submit">Enviar</button>
        </form>
    </main>
</div>
<div id="formulario" class="container d-none d-sm-block d-md-block d-lg-block d-xl-block d-xxl-block">
    <form class="m-auto w-75" method="post" action="contacto/process">
        <img class="mb-4" src="../../dashboard/img/logo.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 fw-normal">Contacta con nosotros</h1>
        <div class="form-floating mb-3 col-12">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">E-mail</label>
        </div>
        <div class="form-floating col-12 mb-3">
            <input type="text" class="form-control" name="nombre" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Name</label>
        </div>
        <div id="comments" class="form-floating mb-3 col-12">
            <textarea class="form-control" name="comentario" placeholder="Leave a comment here"
                      id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Comments</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary my-3" name="submit" type="submit">Enviar</button>
    </form>
</div>
</body>
</html>
