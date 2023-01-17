window.onload = function () {
    console.log("onload");
}
var urlBase = "http://localhost/php/proyectointegrador/backend/index.php/";
let accion = "cargarFicha/producto";
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {


    }
}
var params = "id=" + "obtenerIdDeLaTablaConJQuery";
xhttp.open("POST", urlBase + accion, true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send(params);
let img = document.getElementById("imagen");
img.src = "https://dummyimage.com/600x400/000/fff";