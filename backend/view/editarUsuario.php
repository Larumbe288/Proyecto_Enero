<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo $_SERVER["HTTP_HOST"] ?>/../../../view/formulario.css">
<div>
    <form class="form" action="<?php echo $info[0] ?>/processUser" method="post">
        <h2>Editar Usuario</h2>
        <p>
            <label for="idUsr">ID: </label>
            <input id="idUsr" name="idUsr" readonly value="<?php echo $info[0]?>" required>
        </p>
        <p>
            <label for="correo">Correo: </label>
            <input type="email" name="correo" id="correo" placeholder="Indica el e-mail del usuario" value="<?php echo $info[1] ?>">
        </p>
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" placeholder="Indica el nombre del usuario" value="<?php echo $info[2] ?>">
        </p>
        <p>
            <label for="tel">Teléfono: </label>
            <input type="tel" name="tel" id="tel" placeholder="Indica el teléfono del usuario..." value="<?php echo $info[3] ?>">
        </p>
        <p>
            <label for="dinero">Dinero:</label>
            <input type="number" step="any" name="dinero" id="dinero" value="<?php echo $info[4] ?>">
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="password" step="any" name="password" id="password" value="<?php echo $info[5] ?>">
        </p>
        <input type="submit" name="submit" value="Editar"></input>
    </form>

</div>

