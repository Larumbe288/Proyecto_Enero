<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo $_SERVER["HTTP_HOST"] ?>/../../../view/formulario.css">
<div>
    <form class="form" method="post" action="<?php echo $info[0] ?>/processComment" enctype="multipart/form-data">
        <h2>Editar Comentario</h2>
        <p>
            <label for="idCom">Id Comentario: </label>
            <input type="text" name="idCom" id="idCom" value="<?php echo $info[0] ?>" readonly>
        </p>
        <p>
            <label for="nombre">Texto: </label>
            <textarea name="nombre" id="nombre" rows="5" cols="15"
                      placeholder="Indica el texto del comentario..."><?php echo $info[1] ?></textarea>
        </p>
        <p>
            <label for="idUsr">Id Usuario: </label>
            <input type="number" name="idUsr" id="idUsr" value="<?php echo $info[2] ?>">
        </p>
        <p>
            <label for="idProd">Id Producto: </label>
            <input type="number" name="idProd" id="idProd" value="<?php echo $info[3] ?>">
        </p>
        <input type="submit" name="submit" value="Editar">
    </form>

</div>
<script>
    let b = document.getElementsByTagName("textarea")[0];
</script>
