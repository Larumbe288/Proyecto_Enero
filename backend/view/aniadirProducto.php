<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo $_SERVER["HTTP_HOST"] ?>/../../view/formulario.css">
<div>
    <form id="obj2" class="form" method="post" action="<?php echo $info[0] ?>/processProduct" enctype="multipart/form-data">
        <h2>Añadir Producto</h2>
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" placeholder="Indica el nombre de la categoría..." required>
        </p>
        <p>
            <label for="precio">Precio: </label>
            <input id="precio" name="precio" type="number" step="any"
                   placeholder="Indica el precio del producto..." required>
        </p>
        <p>
            <label for="imagen">Imagen:</label>
            <input onchange="previewFile(this,1)" name="imagen1" type="file" accept="image/*" id="imagen" required>
        </p>
        <p>
            <label for="imagen2">Imagen 2:</label>
            <input name="imagen2" type="file" accept="image/*" id="imagen2">
        </p>
        <p>
            <label for="imagen3">Imagen 3:</label>
            <input name="imagen3" type="file" accept="image/*" id="imagen3">
        </p>
        <p>
            <label for="latitud">Latitud:</label>
            <input type="number" step="any" name="latitud" id="latitud" min="-90" max="90">
        </p>
        <p>
            <label for="longitud">Longitud:</label>
            <input type="number" step="any" name="longitud" id="longitud" min="-180" max="180">
        </p>
        <p>
            <label for="idCat">Id Categoría:</label>
            <select name="idCat" id="idCat" required>
                <option value="empty" selected></option>
                <?php
                for ($i = 0; $i < count($info[1]); $i++) {
                    echo "<option value='" . $info[1][$i] . "'>" . $info[1][$i] . "</option>";
                }
                ?>
            </select>
        </p>
        <input type="submit" name="submit" value="Editar">
    </form>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function previewFile(input, id) {
        var file = $("input[type=file]").get(id).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function () {
                $("#previewImg" + id).attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
</script>