<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
            </div>
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Products</h4>
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
                                    </tr>
                                    </thead>
                                    <tbody id="listado">
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
<script>
    var inicio = 0;
    var id;
    var categorias;
    var urlBase = "http://localhost/php/proyectointegrador/backend/index.php/";
    window.onload = function () {
        getMaxId();
        getCategorias();
        cargarDatos();
    }

    function getMaxId() {
        let accion = "idProd";
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
        let accion = "productos";
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
                        if (j === valores.length - 1) {
                            td.innerText = categorias[valores[j] - 1][valores[j]];
                        } else {
                            td.innerHTML = valores[j];
                        }
                        tr.appendChild(td);
                    }
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
        if (inicio <= id - 10) {
            inicio += 10;
        }
        if (inicio > 0) {
            let boton = document.getElementById("anterior");
            boton.removeAttribute("disabled");
        }
        document.getElementById("listado").innerHTML = "";
        cargarDatos();
        if (inicio >= id-9) {
            let boton = document.getElementById("siguiente");
            boton.setAttribute("disabled", "");
        }
    }

    function anterior() {
        if (inicio > 0) {
            inicio -= 10;
        }
        document.getElementById("listado").innerHTML = "";
        cargarDatos();
        if (inicio === 0) {
            let boton = document.getElementById("anterior");
            boton.setAttribute("disabled", "");
            let bototn = document.getElementById("siguiente");
            bototn.removeAttribute("disabled");
        }
    }
</script>
