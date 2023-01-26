<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../../dashboard/template/assets/js/atlantis.min.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Lato:300,400,700,900"]},
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['../../assets/css/fonts.min.css']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link rel="stylesheet" href="../../dashboard/template/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../dashboard/template/assets/css/atlantis.min.css">
    <link rel="stylesheet" href="../../dashboard/template/assets/styles.css">
    <link rel="stylesheet" href="../../dashboard/template/assets/prism.css">
    <link rel="stylesheet" href="../../dashboard/estilos.css">
</head>

<body>
<section class="gradient-custom">

    <div class="container py-5 h-100">
        <?php if (isset($_SESSION["error"])) {
            echo "<div class='alert alert-danger' role='alert'>
            The username and/or the password are incorrect
        </div>";
        } ?>

        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your username and password!</p>
                            <form action="../../index.php/admin/login/process" method="post">
                                <div class="form-outline form-white mb-4">
                                    <input onkeydown="verifyEmail(this)" type="email" id="typeEmailX" class="form-control form-control-lg" name="username"/>
                                    <label class="form-label" for="typeEmailX">Username</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input onkeydown="verifyPassword(this)" type="password" id="typePasswordX" class="form-control form-control-lg" name="password"/>
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>
                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="remember">Forgot
                                        password?</a>
                                </p>
                                <button id="registro" disabled class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function verifyEmail(input) {
        if (input.value === "") {
            input.classList.add("is-invalid");
        } else {
            let regex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
            if (regex.test(input.value)) {
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            } else {
                input.classList.add("is-invalid");
            }
        }
    }
    function verifyPassword(input) {
        if (input.value === "") {
            input.classList.add("is-invalid");
        } else {
            let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
            if (regex.test(input.value)) {
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            } else {
                input.classList.add("is-invalid");
            }
        }
    }
    setInterval(function () {
        let inputs = document.getElementsByTagName("input");
        for (let i = 1; i < inputs.length; i++) {
            if (inputs[i].classList.contains("is-invalid") || !inputs[i].classList.contains("is-valid")) {
                return;
            }
        }
        document.getElementById("registro").removeAttribute("disabled");
    }, 1);

</script>
</body>

</html>