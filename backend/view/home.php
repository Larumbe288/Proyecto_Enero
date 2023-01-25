<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../view/home.css">
</head>
<body>
<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="home" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="../dashboard/img/logo.png" class="bi me-2" width="40" height="40">
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="home" class="nav-link px-2 link-dark">Home</a></li>
                <div class="dropdown">
                    <li><a href="#" class="nav-link px-2 link-dark">Categorías</a></li>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Deportes imposibles</a></li>
                        <li><a class="dropdown-item" href="#">Placeres gastronómicos digitales</a></li>
                        <li><a class="dropdown-item" href="#">Viajes virtuales</a></li>
                    </ul>
                </div>
                <li><a href="home/contacto" class="nav-link px-2 link-dark">Contacto</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" method="post" action="home/products">
                <input type="text" name="buscar" class="form-control" placeholder="Search..." aria-label="Search">
            </form>
            <?php if (isset($_SESSION["login"])) {
                echo "<div class='dropdown text-end'>
                <a href='#' class='d-block link-dark text-decoration-none dropdown-toggle' data-bs-toggle='dropdown'
                   aria-expanded='false'>
                    <img src='https://github.com/mdo.png' alt='mdo' width='32' height='32' class='rounded-circle'>
                </a>
                <ul id='perfil' class='dropdown-menu text-small'>
                    <li><a class='dropdown-item' href='#'>Profile</a></li>
                    <li>
                        <hr class='dropdown-divider'>
                    </li>
                    <li><a class='dropdown-item' href='home/logout'>Sign out</a></li>
                </ul>
            </div>";
            } else {
                echo "<a href='home/login' class='btn btn-primary'>Iniciar sesión</a>&nbsp;&nbsp;";
                echo "<a href='home/registro' class='btn btn-light'>Registrarse</a>";
            } ?>
        </div>
    </div>
</header>
<script src="../view/js/jssor.slider-28.1.0.min.js" type="text/javascript"></script>
<script type="text/javascript">
    var cantidad = 4;
    var urlBase = "http://localhost/web/backend/index.php/";
    var id;

    function getMaxId() {
        let accion = "categories/id";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                id = Number.parseInt(this.response);
            }
        }
        xhttp.open("POST", urlBase + accion, true);
        xhttp.send();
    }

    getMaxId();

    function cargar() {
        let accion = "categoorias";
        cantidad += 4;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                let categorias = JSON.parse(this.response);
                let lista = document.getElementById("cats");
                lista.innerHTML = "";
                let valores = Object.values(categorias);
                for (let i = 0; i < valores.length; i++) {
                    let ul = document.createElement("li");
                    let a = document.createElement("a");
                    a.classList.add("dropdown-item");
                    a.href = "#";
                    a.innerText = valores[i];
                    ul.appendChild(a);
                    lista.appendChild(ul);
                }
                if (valores.length < id) {
                    let li = document.createElement("li");
                    let boton = document.createElement("button");
                    boton.classList.add("dropdown-item");
                    boton.onclick = cargar;
                    boton.innerHTML = ".&nbsp;.&nbsp;.";
                    li.appendChild(boton);
                    lista.appendChild(li);
                }
            }
        }
        var params = "cantidad=" + cantidad;
        xhttp.open("POST", urlBase + accion, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
    }

    window.jssor_1_slider_init = function () {

        var jssor_1_SlideoTransitions = [
            [{b: 500, d: 1000, x: 0, e: {x: 6}}],
            [{b: -1, d: 1, x: 100, p: {x: {d: 1, dO: 9}}}, {b: 0, d: 2000, x: 0, e: {x: 6}, p: {x: {dl: 0.1}}}],
            [{b: -1, d: 1, x: 200, p: {x: {d: 1, dO: 9}}}, {b: 0, d: 2000, x: 0, e: {x: 6}, p: {x: {dl: 0.1}}}],
            [{b: -1, d: 1, rX: 20, rY: 90}, {b: 0, d: 4000, rX: 0, e: {rX: 1}}],
            [{b: -1, d: 1, rY: -20}, {b: 0, d: 4000, rY: -90, e: {rY: 7}}],
            [{b: -1, d: 1, sX: 2, sY: 2}, {b: 1000, d: 3000, sX: 1, sY: 1, e: {sX: 1, sY: 1}}],
            [{b: -1, d: 1, sX: 2, sY: 2}, {b: 1000, d: 5000, sX: 1, sY: 1, e: {sX: 3, sY: 3}}],
            [{b: -1, d: 1, tZ: 300}, {b: 0, d: 2000, o: 1}, {b: 3500, d: 3500, tZ: 0, e: {tZ: 1}}],
            [{b: -1, d: 1, x: 20, p: {x: {o: 33, r: 0.5}}}, {
                b: 0,
                d: 1000,
                x: 0,
                o: 0.5,
                e: {x: 3, o: 1},
                p: {x: {dl: 0.05, o: 33}, o: {dl: 0.02, o: 68, rd: 2}}
            }, {b: 1000, d: 1000, o: 1, e: {o: 1}, p: {o: {dl: 0.05, o: 68, rd: 2}}}],
            [{b: -1, d: 1, da: [0, 700]}, {b: 0, d: 600, da: [700, 700], e: {da: 1}}],
            [{b: 600, d: 1000, o: 0.4}],
            [{b: -1, d: 1, da: [0, 400]}, {b: 200, d: 600, da: [400, 400], e: {da: 1}}],
            [{b: 800, d: 1000, o: 0.4}],
            [{b: -1, d: 1, sX: 1.1, sY: 1.1}, {b: 0, d: 1600, o: 1}, {
                b: 1600,
                d: 5000,
                sX: 0.9,
                sY: 0.9,
                e: {sX: 1, sY: 1}
            }],
            [{b: 0, d: 1000, o: 1, p: {o: {o: 4}}}],
            [{b: 1000, d: 1000, o: 1, p: {o: {o: 4}}}]
        ];

        var jssor_1_options = {
            $AutoPlay: 1,
            $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 16,
                $SpacingY: 16
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 980;

        function ScaleSlider() {
            var containerElement = jssor_1_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_1_slider.$ScaleWidth(expectedWidth);
            } else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        /*#endregion responsive code end*/
    };
</script>
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin-ext,cyrillic-ext,vietnamese,latin,cyrillic"
      rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,regular,italic,700,700italic&subset=latin-ext,greek-ext,cyrillic-ext,greek,vietnamese,latin,cyrillic"
      rel="stylesheet" type="text/css"/>
<div id="jssor_1" class="my-5">
    <!-- Loading Screen -->
    <div data-u="loading" class="jssorl-004-double-tail-spin cargando">
        <img src="../dashboard/img/double-tail-spin.svg"/>
    </div>
    <div data-u="slides" class="slides">
            <?php
            for ($i = 0; $i <count($productos);$i++) {
                if($i==0) {
                    echo '<div class="slide">';
                   echo '<img data-u="image" src="'.$productos[$i]->getImagen1().'"/>';
                   echo '</div>';
                } else {
                    echo "<div>";
                    echo '<img data-u="image" src="'.$productos[$i]->getImagen1().'"/>';
                    echo "</div>";
                }
            }
            ?>
    </div>
    <!-- Bullet Navigator -->
    <div data-u="navigator" class="jssorb031" data-autocenter="1"
         data-scale="0.5" data-scale-bottom="0.75">
        <div data-u="prototype" class="i">
            <svg viewbox="0 0 16000 16000">
                <circle class="b" cx="8000" cy="8000" r="5800"></circle>
            </svg>
        </div>
    </div>
    <!-- Arrow Navigator -->
    <div data-u="arrowleft" class="jssora051 jssora051i" data-autocenter="2"
         data-scale="0.75" data-scale-left="0.75">
        <svg viewbox="0 0 16000 16000">
            <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
        </svg>
    </div>
    <div data-u="arrowright" class="jssora051 jssora051d" data-autocenter="2"
         data-scale="0.75" data-scale-right="0.75">
        <svg viewbox="0 0 16000 16000">
            <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
        </svg>
    </div>
</div>
<script type="text/javascript">jssor_1_slider_init();
</script>
<div id="descripcion" class="py-5 container d-flex justify-content-center flex-column">
    <h1>Welcome to Christies and Meta's</h1>
    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ut turpis consectetur, rhoncus est consectetur,
        euismod ex. Phasellus nibh nibh, tincidunt non placerat non, semper eget enim. Mauris sagittis augue eget magna
        ultrices laoreet. Ut venenatis ante ac lacus interdum luctus. Fusce mattis aliquam ligula, gravida efficitur
        nisi efficitur in.</h3>
</div>
</body>
</html>
