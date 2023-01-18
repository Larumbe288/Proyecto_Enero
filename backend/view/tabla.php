<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
            </div>
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 id="titulo" class="card-title">
                                <?php echo $_SESSION["tabla"] ?>
                            </h4>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <?php
                                        $columnas = $info[0];
                                        for ($i = 0; $i < count($columnas); $i++) {
                                            echo "<th>" . $columnas[$i][0] . "</th>";
                                        }
                                        ?>
                                        <th>Show</th>
                                        <th>Edit</th>
                                        <th>Erase</th>
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
<div class="modal fade" tabindex="-1" id="show">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Token</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center align-items flex-column"><img
                            src="https://dummyimage.com/300x200/000/fff"></div>
                <h5 class="my-3" style="text-align: center">Título</h5>
                <p class="my-3" style="text-align: center">Descripción</p>
                <p class="my-3" style="text-align: center">Precio</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Listo</button>
            </div>
        </div>
    </div>
</div>
<script>
    var inicio = 0;
    var id;
    var categorias;
    var urlBase = "http://localhost/php/proyectointegrador/backend/index.php/";
    window.onload = function () {
        getMaxId();
        getCategorias();
        cargarDatos();
        if (inicio >= id - 10) {
            let boton = document.getElementById("siguiente");
            boton.setAttribute("disabled", "");
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


    function cargarDatos() {
        let accion = document.getElementById("titulo").innerText.toLowerCase();
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                let productos = JSON.parse(this.response);
                console.log(productos);
                let tabla = document.getElementById("listado");
                for (let i = 0; i < productos.length; i++) {
                    let tr = document.createElement("tr");
                    let valores = Object.values(productos[i]);
                    tr.setAttribute("data-id", valores[0]);
                    for (let j = 0; j < valores.length; j++) {
                        let td = document.createElement("td");
                        if (j === valores.length - 1 && accion === "products") {
                            td.innerText = categorias[valores[j] - 1][valores[j]];
                        } else {
                            td.innerHTML = valores[j];
                        }
                        tr.appendChild(td);
                    }
                    let iconoMostrar = document.createElement("td");
                    iconoMostrar.innerHTML = "<button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#show'><i class='fas fa-eye'></i></button>";
                    tr.appendChild(iconoMostrar);
                    let iconoEditar = document.createElement("td");
                    iconoEditar.innerHTML = "<a href='http://localhost/php/proyectointegrador/backend/index.php/editar<?php echo $_SESSION["tabla"] ?>/"+valores[0]+"' class='btn btn-primary edit'><i class='fas fa-pencil-alt'></i></a>"
                    tr.appendChild(iconoEditar);
                    let iconoBorrar = document.createElement("td");
                    iconoBorrar.innerHTML = "<a href='http://localhost/php/proyectointegrador/backend/index.php/eliminar<?php echo $_SESSION["tabla"] ?>/" + valores[0] + "' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>";
                    tr.appendChild(iconoBorrar);
                    tabla.appendChild(tr);
                }
            }
        }
        var params = "inicio=" + inicio;
        xhttp.open("POST", urlBase + accion, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
    }

    function siguiente() {
        if (inicio < id - 10) {
            inicio += 10;
            document.getElementById("listado").innerHTML = "";
            cargarDatos();

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
        cargarDatos();
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