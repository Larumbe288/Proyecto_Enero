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
                                <table>
                                    <thead>
                                    <tr>
                                        <?php
                                        $columnas = $info[0];
                                        for ($i = 0; $i < count($columnas); $i++) {
                                            echo "<th>" . $columnas[$i][0] . "</th>";
                                        }
                                        var_dump($info);
                                        ?>

                                    </tr>
                                    </thead>
                                    <tbody id="listado">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var urlBase = "http://localhost/php/proyectointegrador/backend/index.php/";
    let accion = "productos";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let productos = JSON.parse(this.response);
            console.log(productos);
            let tabla = document.getElementById("listado");
            for (let i = 0; i < productos.length; i++) {
                let tr = document.createElement("tr");
                let td = document.createElement("td");
                td.innerText = i + 1;
                tr.appendChild(td);
                let nombre = document.createElement("td");
                nombre.innerText = productos[i].nombre;
                tr.appendChild(nombre);
                
                tabla.appendChild(tr);
            }


        }
    }
    xhttp.open("POST", "http://localhost/php/proyectointegrador/backend/index.php/productos", true);
    xhttp.send();

</script>
