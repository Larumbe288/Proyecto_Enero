window.onload = function () {
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
    xhttp.open("POST","http://localhost/php/proyectointegrador/backend/index.php/productos" , true);
    xhttp.send();
}
