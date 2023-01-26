
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo $_SERVER["HTTP_HOST"] ?>/../../../view/formulario.css">
<div>
    <form id="usr" class="form" action="<?php echo $info[0] ?>/processUser" method="post">
        <h2>Editar Usuario</h2>
        <p>
            <label for="idUsr">ID: </label>
            <input id="idUsr" name="idUsr" readonly value="<?php echo $info[0] ?>" required>
        </p>
        <p>
            <label for="correo">Correo: </label>
            <input onkeydown="verifyEmail(this)" type="email" name="correo" id="correo"
                   placeholder="Indica el e-mail del usuario" value="<?php echo $info[1] ?>">
        </p>
        <p>
            <label for="nombre">Nombre: </label>
            <input onkeydown="verifyName(this)" type="text" name="nombre" id="nombre"
                   placeholder="Indica el nombre del usuario"
                   value="<?php echo $info[2] ?>">
        </p>
        <p>
            <label for="tel">Teléfono: </label>
            <input type="tel" onkeydown="verifyPhone(this)" name="tel" id="tel"
                   placeholder="Indica el teléfono del usuario..."
                   value="<?php echo $info[3] ?>">
        </p>
        <p>
            <label for="dinero">Dinero:</label>
            <input onkeydown="verifyDecimal(this)" type="number" step="any" name="dinero" id="dinero" value="<?php echo $info[4] ?>">
        </p>
        <p>
            <label for="password">Password:</label>
            <input onkeydown="verifyPassword(this)" type="password" step="any" name="password" id="password" value="<?php echo $info[5] ?>">
        </p>
        <input id="registro" disabled type="submit" name="submit" value="Editar"></input>
    </form>

</div>
<script>
    function verifyEmail(input) {
        if (input.value === "") {
            input.style.border = "1px solid red";
        } else {
            let regex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
            if (regex.test(input.value)) {
                input.style.border = "1px solid green";
            } else {
                input.style.border = "1px solid red";
            }
        }
    }

    function verifyPassword(input) {
        if (input.value === "") {
            input.style.border = "1px solid red";
        } else {
            let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
            if (regex.test(input.value)) {
                input.style.border = "1px solid green";
            } else {
                input.style.border = "1px solid red";
            }
        }
    }

    function verifyName(input) {
        if (input.value === "") {
            input.style.border = "1px solid red";
        } else {
            let regex = /^[A-ZÁÉÍÓÚ][a-záéíóú]+$/;
            if (regex.test(input.value)) {
                input.style.border = "1px solid green";
            } else {
                input.style.border = "1px solid red";
            }
        }

    }

    function verifyPhone(input) {
        if (input.value === "") {
            input.style.border = "1px solid red";
        } else {
            let regex = /^\d{8}$/;
            if (regex.test(input.value)) {
                input.style.border = "1px solid green";
            } else {
                input.style.border = "1px solid red";
            }
        }
    }

    function verifyDecimal(input) {
        if (input.value === "") {
            input.style.border = "1px solid red";
        } else {
            let regex = /^(?!0\d|$)\d*(\.\d{1,4})?$/;
            if (regex.test(input.value)) {
                input.style.border = "1px solid green";
            } else {
                input.style.border = "1px solid red";
            }
        }

    }
    setInterval(function() {
        let inputs = document.getElementsByTagName("input");
        for (let i = 1; i < inputs.length; i++) {
            if (inputs[i].style.border="red") {
                return;
            }
        }
        document.getElementById("registro").removeAttribute("disabled");
    })
</script>
