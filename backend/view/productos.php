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
            <a href="../home" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="../../dashboard/img/logo.png" class="bi me-2" width="40" height="40">
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../home" class="nav-link px-2 link-dark">Home</a></li>
                <div class="dropdown">
                    <li><a href="#" class="nav-link px-2 link-dark">Categorías</a></li>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Deportes imposibles</a></li>
                        <li><a class="dropdown-item" href="#">Placeres gastronómicos digitales</a></li>
                        <li><a class="dropdown-item" href="#">Viajes virtuales</a></li>
                    </ul>
                </div>
                <li><a href="home/contacto" class="nav-link px-2 link-dark">Contacto</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
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
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div id="listado" class="col-md-10">
        </div>
        <div class="my-3">
            <button id="anterior" class="btn btn-primary btn-rounded" disabled onclick="anterior()">
                Anterior
            </button>
            <button id="siguiente" class="btn btn-primary btn-rounded" onclick="siguiente()">
                Siguiente
            </button>
        </div>
    </div>

</div>
<script>
    sessionStorage.setItem("buscar", "");
    window.onload = function () {
        getMaxId();
        cargarDatos();
        if (inicio >= id - 3) {
            let boton = document.getElementById("siguiente");
            boton.setAttribute("disabled", "");
        }
    }
    var urlBase = "http://localhost/web/backend/index.php/";
    var inicio = 0;
    var id;
    // createCard("https://www.consumoteca.com/wp-content/uploads/Enjuague-bucal-Gabriel-Manlake-Unsplash.png", "Enjuage Bucal", 350,
    //     "Higiene Bucal  Dientes Blancos",
    //     "Es un enjuage bucal que permite tener tus dientes limpios y con olor a frescura",
    //     150.1267);
    function getMaxId() {
        let accion = "products/id";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                id = Number.parseInt(this.response);
            }
        }
        xhttp.open("POST", urlBase + accion, true);
        xhttp.send();
    }

    function createCard(imagen, titulo, puntos, descripCat, descripObj, pasta,id) {
        let listado = document.getElementById("listado");
        let fondo = document.createElement("div");
        fondo.classList.add("row", "p-2", "bg-white", "border", "rounded","mb-3");
        let izqda = document.createElement("div");
        izqda.classList.add("col-md-3", "mt-1");
        let img = document.createElement("img");
        img.classList.add("img-fluid", "img-responsive", "rounded", "product-image");
        img.setAttribute("src", imagen);
        izqda.appendChild(img);
        let dcha = document.createElement("div");
        dcha.classList.add("col-md-6", "mt-1");
        let title = document.createElement("h5");
        title.innerText = titulo;
        dcha.appendChild(title);
        let puntuacion = document.createElement("div");
        puntuacion.classList.add("d-flex", "flex-row");
        let span = document.createElement("span");
        span.innerHTML = puntos + "&nbsp;";
        puntuacion.appendChild(span);
        let corazon = document.createElement("div");
        corazon.classList.add("ratings", "mr-2");
        corazon.innerText = "❤";
        puntuacion.appendChild(corazon);
        dcha.appendChild(puntuacion);
        let descripcion = document.createElement("div");
        descripcion.classList.add("mt-2", "mb-1", "spec-1");
        let textoDesc = document.createElement("span");
        textoDesc.innerText = descripCat;
        descripcion.appendChild(textoDesc);
        dcha.appendChild(descripcion);
        let descripcionObj = document.createElement("p");
        descripcionObj.classList.add("text-justify", "para", "mb-0");
        descripcionObj.innerText = descripObj;
        dcha.appendChild(descripcionObj);
        let acordeon = document.createElement("div");
        acordeon.classList.add("d-flex", "flex-column", "mt-4");
        let boton = document.createElement("button");
        boton.type = "button";
        boton.classList.add("accordion-button", "collapsed");
        boton.setAttribute("aria-expanded", "false");
        boton.setAttribute("data-bs-toggle", "collapse");
        boton.setAttribute("data-bs-target", "#collapseThree"+id);
        boton.setAttribute("aria-controls", "collapseThree"+id);
        boton.innerText = "Ver ficha producto";
        acordeon.appendChild(boton);
        let bodyAc = document.createElement("div");
        bodyAc.classList.add("accordion-collapse", "collapse");
        bodyAc.setAttribute("id", "collapseThree"+id);
        bodyAc.setAttribute("aria-labelledby", "headingThree");
        bodyAc.setAttribute("data-bs-parent", "#accordionExample");
        let cuerpo = document.createElement("div");
        cuerpo.classList.add("accordion-body");
        let ficha = document.createElement("a");
        ficha.classList.add("btn", "btn-primary", "my-5");
        ficha.setAttribute("href", "#");
        ficha.innerText = "Ver ficha de producto";
        cuerpo.appendChild(ficha);
        bodyAc.appendChild(cuerpo);
        acordeon.appendChild(bodyAc);
        dcha.appendChild(acordeon);
        let precio = document.createElement("div");
        precio.classList.add("align-items-center", "align-content-center", "col-md-3", "border-left", "mt-1");
        let centrar = document.createElement("div");
        centrar.classList.add("d-flex", "flex-row", "align-items-center");
        let dinero = document.createElement("h4");
        dinero.innerText = pasta + " Christokens";
        centrar.appendChild(dinero);
        precio.appendChild(centrar);
        fondo.appendChild(izqda);
        fondo.appendChild(dcha);
        fondo.appendChild(precio);
        listado.appendChild(fondo);
    }

    function cargarDatos() {
        let accion = "prooductos";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                let productos = JSON.parse(this.response);
                for (let i = 0; i < productos.length; i++) {
                    createCard(productos[i].imagen1,productos[i].nombre,325,"Descripcion Categoría IdCAt akldfja",productos[i].descripcion,productos[i].precio,productos[i].id);
                }
            }
        }
        var params = "buscar=" + sessionStorage.getItem("buscar") + "&inicio=" + inicio;
        xhttp.open("POST", urlBase + accion, true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send(params);
    }

    function siguiente() {
        if (inicio < id - 3) {
            inicio += 3;
            document.getElementById("listado").innerHTML = "";
            cargarDatos();

        } else {
            let boton = document.getElementById("siguiente");
            boton.setAttribute("disabled", "");
        }
        if (inicio >= id - 3) {
            let boton = document.getElementById("siguiente");
            boton.setAttribute("disabled", "");
            return;
        }
        if (inicio > 0) {
            let boton = document.getElementById("anterior");
            boton.removeAttribute("disabled");
        }
    }

    function anterior() {

        if (inicio > 0) {
            inicio -= 3;
        }
        document.getElementById("listado").innerHTML = "";
        cargarDatos();
        if (inicio < id - 3) {
            let boton = document.getElementById("siguiente");
            boton.removeAttribute("disabled");
        }
        if (inicio === 0) {
            let boton = document.getElementById("anterior");
            boton.setAttribute("disabled", "");
        }
    }
</script>
</body>
</html>
