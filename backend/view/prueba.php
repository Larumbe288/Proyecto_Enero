<?php
$id = 1;
$array = array (
    "Nombre" => "Panas",
    "Precio" => 125.1245,
    "Imagen1" => "holasas.png",
    "Imagen2" => "quetal.png",
    "Imagen3" => "adios.png",
    "Latitud" => 0.2457,
    "Longitud" => 0.1498,
    "IdCategoria" => 1
);
$db = new bdObjeto();
$principio=0;
$final=1;
$array = $db->read(0,10);
echo $array;