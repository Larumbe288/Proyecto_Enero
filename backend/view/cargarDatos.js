var urlBase = "http://localhost/php/proyectointegrador/backend/index.php/";
let accion = "productos";
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
        let productos = JSON.parse(this.response);
        console.log(productos);
    }
}
xhttp.open("POST", "http://localhost/php/proyectointegrador/backend/index.php/productos", true);
xhttp.send();

