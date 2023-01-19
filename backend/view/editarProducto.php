<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo $_SERVER["HTTP_HOST"] ?>/../../../view/formulario.css">
<div>
    <form class="form">
        <h2>Editar Producto</h2>
        <p>
            <label for="idCat">ID: </label>
            <input id="idCat" readonly value="<?php echo $info[0]?>">
        </p>
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" placeholder="Indica el nombre de la categoría..." value="<?php echo $info[1] ?>">
        </p>
        <p>
            <label for="descripcion">Precio: </label>
            <input id="desripcion" type="number" step="0.0001" placeholder="Indica la descripción de la categoría..." value="<?php echo $info[2] ?>">
        </p>
        <p>
            <label for="imagen">Imagen:</label>
            <input onchange="previewFile(this)" type="file" accept="image/*" id="imagen">
        </p>

        <img id="previewImg" src="<?php echo $info[3] ?>" width="100px" height="100px">
        <p>
            <label for="imagen2">Imagen 2:</label>
            <input onchange="previewFile(this)" type="file" accept="image/*" id="imagen2">
        </p>
        <img id="previewImg" src="<?php echo $info[5] ?>" width="100px" height="100px">
        <p>
            <label for="imagen3">Imagen 3:</label>
            <input onchange="previewFile(this)" type="file" accept="image/*" id="imagen3">
        </p>
        <img id="previewImg" src="<?php echo $info[6] ?>" width="100px" height="100px">
        <a href="#">Editar</a>
    </form>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];

        if(file){
            var reader = new FileReader();

            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
</script>