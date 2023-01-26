<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header flotar">
                            <h4 id="titulo" class="card-title"><?php echo $_SESSION["tabla"] ?></h4>
                            <?php
                            $arrayTitulos = ["Categories", "Products", "Users"];
                            if (in_array($_SESSION["tabla"], $arrayTitulos)) {
                                echo "<a href='http://localhost/web/backend/index.php/aniadir" . $_SESSION['tabla'] . "'class='btn btn-primary float-right'><i class='fas fa-plus'></i></a>";
                            }
                            ?>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <?php
                                        $columnas = $info[0];
                                        for ($i = 0; $i < count($columnas); $i++) {
                                            echo "<th class='colun'>" . $columnas[$i][0] . "</th>";
                                        }
                                        if (in_array($_SESSION["tabla"], $arrayTitulos)) {
                                            echo "<th>Show</th>";
                                        } ?>
                                        <?php if ($_SESSION["tabla"] != 'Sales') {
                                            echo "<th>Edit</th>" . "<br>";
                                            echo "<th>Erase</th>";
                                        } ?>

                                    </tr>
                                    </thead>
                                    <tbody id="listado" onchange="cargarDatos()">
                                    </tbody>
                                </table>
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
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modales"></div>
<script>
    var inicio = 0;
    var id;
    var categorias;
    var campo;
    var urlBase = "http://localhost/web/backend/index.php/";
    window.onload = function () {
        getMaxId();
        getCategorias();
        let th = document.getElementsByClassName("colun");
        campo = th[0].innerText;
        cargarDatos(campo);
        if (inicio >= id - 10) {
            let boton = document.getElementById("siguiente");
            boton.setAttribute("disabled", "");
        }
        for (let i = 0; i < th.length; i++) {
            th[i].onclick = function () {
                if (document.getElementById("flecha") !== null) {
                    document.getElementById("flecha").parentElement.firstElementChild.remove();
                }
                inicio = 0;
                let boton = document.getElementById("anterior");
                boton.setAttribute("disabled", "");
                let botonSiguiente = document.getElementById("siguiente");
                botonSiguiente.removeAttribute("disabled");
                document.getElementById("listado").innerHTML = "";
                cargarDatos(th[i].innerText);
                campo = th[i].innerText;
                th[i].innerHTML += " <i id='flecha' class='fas fa-arrow-up'></i>";
            }
        }
    }

    function ordenar() {
        let accion = "productos/ordenar";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {

            }
        }
    }

    function getMaxId() {
        let accion = document.getElementById("titulo").innerText.toLowerCase() + "/id";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                id = Number.parseInt(this.response);
            }
        }
        xhttp.open("POST", urlBase + accion, true);
        xhttp.send();
    }

    function getCategorias() {
        let accion = "categorias";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                categorias = JSON.parse(this.response);
            }
        }
        xhttp.open("POST", urlBase + accion, true);
        xhttp.send();
    }

    function createModal(id, titulo, foto, descripcion) {
        let div = document.createElement("div");
        div.classList.add("modal");
        div.classList.add("fade");
        div.tabIndex = -1;
        div.id = "show" + id;
        let dialog = document.createElement("div");
        dialog.classList.add("modal-dialog");
        let content = document.createElement("div");
        content.classList.add("modal-content");
        let header = document.createElement("div");
        header.classList.add("modal-header");
        let tituloo = document.createElement("h4");
        tituloo.classList.add("modal-title");
        tituloo.innerText = "Ficha";
        let close = document.createElement("button");
        close.type = "button";
        close.classList.add("btn-close");
        close.setAttribute("data-bs-dismiss", "modal");
        close.setAttribute("aria-label", "Close");
        header.appendChild(tituloo);
        header.appendChild(close);
        let body = document.createElement("div");
        body.classList.add("modal-body");
        let contenedorImg = document.createElement("div");
        contenedorImg.classList.add("d-flex");
        contenedorImg.classList.add("justify-content-center");
        contenedorImg.classList.add("align-items");
        contenedorImg.classList.add("flex-column");
        let imagen = document.createElement("img");
        imagen.src = foto;
        contenedorImg.appendChild(imagen);
        let subtitulo = document.createElement("h5");
        subtitulo.innerText = titulo;
        subtitulo.classList.add("my-3");
        subtitulo.classList.add("text-center");
        let precio = document.createElement("p");
        precio.innerText = descripcion;
        precio.classList.add("my-3");
        precio.classList.add("text-center");
        body.appendChild(contenedorImg);
        body.appendChild(subtitulo);
        body.appendChild(precio);
        let footer = document.createElement("div");
        footer.classList.add("modal-footer");
        let boton = document.createElement("button");
        boton.classList.add("btn");
        boton.classList.add("btn-primary");
        boton.type = "button";
        boton.setAttribute("data-bs-dismiss", "modal");
        boton.innerText = "Listo";
        footer.appendChild(boton);
        content.appendChild(header);
        content.appendChild(body);
        content.appendChild(footer);
        dialog.appendChild(content);
        div.appendChild(dialog);
        document.getElementById("modales").appendChild(div);
    }

    function cargarDatos(campo) {
        let accion = document.getElementById("titulo").innerText.toLowerCase();
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                let productos = JSON.parse(this.response);
                console.log(productos);
                if (categorias === undefined || categorias === null) {
                    getCategorias();
                }
                let tabla = document.getElementById("listado");
                document.getElementById("modales").innerHTML = "";
                for (let i = 0; i < productos.length; i++) {
                    let tr = document.createElement("tr");
                    let valores = Object.values(productos[i]);
                    tr.setAttribute("data-id", valores[0]);
                    for (let j = 0; j < valores.length; j++) {
                        let td = document.createElement("td");
                        if (j === valores.length - 1 && accion === "products") {
                            td.innerText = categorias[valores[j]][0];
                        } else {
                            if (accion === "products" && j === 3) {
                                if (valores[j].length > 15) {
                                    valores[j] = valores[j].substring(0, 12) + "...";
                                }
                            }
                            td.innerHTML = valores[j];
                        }
                        tr.appendChild(td);
                    }
                    let arrayTabla = ["categories", "products", "users"];
                    if (arrayTabla.includes(accion)) {
                        let iconoMostrar = document.createElement("td");
                        iconoMostrar.innerHTML = "<button class='btn btn-success'  itemid='" + valores[0] + "' data-bs-toggle='modal' data-bs-target='#show" + valores[0] + "'><i class='fas fa-eye'></i></button>";
                        tr.appendChild(iconoMostrar);
                    }
                    if (accion != "sales") {
                        let iconoEditar = document.createElement("td");
                        iconoEditar.innerHTML = "<a href='http://localhost/web/backend/index.php/editar<?php echo $_SESSION["tabla"] ?>/" + valores[0] + "' class='btn btn-primary edit'><i class='fas fa-pencil-alt'></i></a>"
                        tr.appendChild(iconoEditar);
                        let iconoBorrar = document.createElement("td");
                        iconoBorrar.innerHTML = "<a href='http://localhost/web/backend/index.php/eliminar<?php echo $_SESSION["tabla"] ?>/" + valores[0] + "' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>";
                        tr.appendChild(iconoBorrar);
                    }

                    tabla.appendChild(tr);
                    if (accion === "products") {
                        createModal(valores[0], valores[1], valores[4], valores[2] + " Christokens");
                    } else if (accion === "categories") {
                        createModal(valores[0], valores[1], valores[3], valores[2]);
                    } else if (accion === "users") {
                        let rol = valores[6].charAt(0).toUpperCase() + valores[6].slice(1);
                        let foto;
                        if (rol === "Admin") {
                            foto = "http://localhost/web/backend/view/imgUsers/admin.png";
                        } else {
                            foto = "http://localhost/web/backend/view/imgUsers/user.webp";
                        }
                        createModal(valores[0], valores[1], foto, rol);
                    } else {

                    }

                }
            }
        }
        var params = "inicio=" + inicio + "&campo=" + campo;
        xhttp.open("POST", urlBase + accion, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
    }

    function siguiente() {
        if (inicio < id - 10) {
            inicio += 10;
            document.getElementById("listado").innerHTML = "";
            cargarDatos(campo);

        } else {
            let boton = document.getElementById("siguiente");
            boton.setAttribute("disabled", "");
        }
        if (inicio >= id - 10) {
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
            inicio -= 10;
        }
        document.getElementById("listado").innerHTML = "";
        cargarDatos(campo);
        if (inicio < id - 10) {
            let boton = document.getElementById("siguiente");
            boton.removeAttribute("disabled");
        }
        if (inicio === 0) {
            let boton = document.getElementById("anterior");
            boton.setAttribute("disabled", "");
        }
    }

</script>