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
                    <li><a class='dropdown-item' href='../home/profile'>Profile</a></li>
                    <li>
                        <hr class='dropdown-divider'>
                    </li>
                    <li><a class='dropdown-item' href='home/logout'>Sign out</a></li>
                </ul>
            </div>";
            } else {
                echo "<a href='../home/login' class='btn btn-primary'>Iniciar sesión</a>";
            } ?>
        </div>
    </div>
</header>
<div id="formulario" class="text-center">
    <main class="form-signin w-100 m-auto">
        <form method="post" action="registro/process">
            <img class="mb-4" src="../../dashboard/img/logo.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 fw-normal">Registro</h1>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" onkeydown="verifyEmail(this)" name="user" id="floatingInput"
                       placeholder="name@example.com">
                <label for="floatingInput">Correo electrónico</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" onkeydown="verifyPassword(this)" name="password"
                       id="floatingPassword"
                       placeholder="Password">
                <label for="floatingPassword">Contraseña</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" onkeydown="verifyName(this)" name="nombre" id="floatingInput"
                       placeholder="name@example.com">
                <label for="floatingInput">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="tel" class="form-control" onblur="verifyPhone(this)" name="tel" id="floatingInput"
                       placeholder="name@example.com">
                <label for="floatingInput">Teléfono</label>
            </div>
            <button id="registro" class="w-100 btn btn-lg btn-primary my-3" name="submit" type="submit" disabled>
                Registro
            </button>
            <?php if (isset($_SESSION["errorR"])) {
                echo "<div class='alert alert-danger' role='alert'>" . $_SESSION["errorR"] . "
</div>";
            } ?>
        </form>
    </main>
</div>
<script>
    function verifyEmail(input) {
        if (input.value === "") {
            input.classList.add("is-invalid");
        } else {
            let regex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
            if (regex.test(input.value)) {
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            } else {
                input.classList.add("is-invalid");
            }
        }
    }

    function verifyPassword(input) {
        if (input.value === "") {
            input.classList.add("is-invalid");
        } else {
            let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
            if (regex.test(input.value)) {
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            } else {
                input.classList.add("is-invalid");
            }
        }
    }

    function verifyName(input) {
        if (input.value === "") {
            input.classList.add("is-invalid");
        } else {
            let regex = /^[A-ZÁÉÍÓÚ][a-záéíóú]+$/;
            if (regex.test(input.value)) {
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            } else {
                input.classList.add("is-invalid");
            }
        }

    }

    function verifyPhone(input) {
        if (input.value === "") {
            input.classList.add("is-invalid");
        } else {
            let regex = /^\d{9}$/;
            if (regex.test(input.value)) {
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            } else {
                input.classList.add("is-invalid");
            }
        }
    }

    setInterval(function () {
        let inputs = document.getElementsByTagName("input");
        for (let i = 1; i < inputs.length; i++) {
            if (inputs[i].classList.contains("is-invalid") || !inputs[i].classList.contains("is-valid")) {
                return;
            }
        }
        document.getElementById("registro").removeAttribute("disabled");
    }, 1);

</script>
</body>
</html>
