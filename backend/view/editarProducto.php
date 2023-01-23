<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo $_SERVER["HTTP_HOST"] ?>/../../../view/formulario.css">
<div>
    <form class="form" method="post" action="<?php echo $info[0] ?>/processProduct" enctype="multipart/form-data">
        <h2>Editar Producto</h2>
        <p>
            <label for="idProd">Id Producto: </label>
            <input type="text" name="idProd" id="idProd" value="<?php echo $info[0] ?>" readonly>
        </p>
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" placeholder="Indica el nombre de la categoría..." value="<?php echo $info[1] ?>">
        </p>
        <p>
            <label for="descripcion">Precio: </label>
            <input id="desripcion" name="precio" type="number" step="0.0001" placeholder="Indica la descripción de la categoría..." value="<?php echo $info[2] ?>">
        </p>
        <p>
            <label for="imagen">Imagen:</label>
            <input onchange="previewFile(this,1)" name="imagen" type="file" accept="image/*" id="imagen">
        </p>

        <img id="previewImg1" src="<?php echo $info[3] ?>" width="100px" height="100px">
        <p>
            <label for="imagen2">Imagen 2:</label>
            <input onchange="previewFile(this,2)" name="imagen2" type="file" accept="image/*" id="imagen2">
        </p>
        <img id="previewImg2" src="<?php echo $info[5] ?>" width="100px" height="100px">
        <p>
            <label for="imagen3">Imagen 3:</label>
            <input onchange="previewFile(this,3)" name="imagen3" type="file" accept="image/*" id="imagen3">
        </p>
        <img id="previewImg3" src="<?php echo $info[6] ?>" width="100px" height="100px">
        <p>
            <label for="latitud">Latitud:</label>
            <input type="number" step="0.00000000000001" name="latitud" id="latitud" min="-90" max="90" value="<?php echo $info[4] ?>">
        </p>
        <p>
            <label for="longitud">Longitud:</label>
            <input type="number" step="0.00000000000001" name="longitud" id="longitud" min="-180" max="180" value="<?php echo $info[7]?>">
        </p>
        <p>
            <label for="idCat">Id Categoría:</label>
            <input type="number" name="idCat" id="idCat" min="1" max="<?php echo $info[9] ?>" value="<?php echo $info[8]?>">
        </p>
        <input type="submit" name="submit" value="Editar">
    </form>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function previewFile(input,id){
        var file = $("input[type=file]").get(id).files[0];

        if(file){
            var reader = new FileReader();

            reader.onload = function(){
                $("#previewImg"+id).attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
</script>