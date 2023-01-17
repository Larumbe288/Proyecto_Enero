<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
            </div>
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 id="titulo" class="card-title"><?php echo $_SESSION["tabla"] ?></h4>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                    <tr>
                                        <?php
                                        $columnas = $info[0];
                                        for ($i = 0; $i < count($columnas); $i++) {
                                            echo "<th>" . $columnas[$i][0] . "</th>";
                                        }
                                        ?>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editing</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Name: </label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Description: </label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3"><label for="message-text" class="col-form-label">Image: </label>
                        <input type="file" class="form-control" id="recipient-name"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Edit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>You are about to delete. Do you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
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
                    for (let j = 0; j < valores.length; j++) {
                        let td = document.createElement("td");
                        if (j === valores.length - 1 && accion === "products") {
                            td.innerText = categorias[valores[j] - 1][valores[j]];
                        } else {
                            td.innerHTML = valores[j];
                        }
                        tr.appendChild(td);
                    }
                    let iconoEditar = document.createElement("td");
                    iconoEditar.innerHTML = "<button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fas fa-pencil-alt'></i></button>"
                    tr.appendChild(iconoEditar);
                    let iconoBorrar = document.createElement("td");
                    iconoBorrar.innerHTML = "<button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal'><i class='fas fa-trash-alt'></i></button>";
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
            setTimeout(cargarDatos, 200);
            if (inicio > id - 10) {
                let boton = document.getElementById("siguiente");
                boton.setAttribute("disabled", "");
            }
        } else {
            let boton = document.getElementById("siguiente");
            boton.setAttribute("disabled", "");
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
        setTimeout(cargarDatos, 200);
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
