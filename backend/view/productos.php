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

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
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
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <div class="row p-2 bg-white border rounded">
                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image"
                                                src="../dashboard/img/cascos.jpg" width="300" height="300"></div>
                <div class="col-md-6 mt-1">
                    <h5>Quant olap shirts</h5>
                    <div class="d-flex flex-row">
                        <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i></div>
                        <span>310</span>
                    </div>
                    <div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span
                                class="dot"></span><span>Light weight</span><span
                                class="dot"></span><span>Best finish<br></span></div>
                    <div class="mt-1 mb-1 spec-1"><span>Unique design</span><span
                                class="dot"></span><span>For men</span><span class="dot"></span><span>Casual<br></span>
                    </div>
                    <p class="text-justify text-truncate para mb-0">There are many variations of passages of Lorem Ipsum
                        available, but the majority have suffered alteration in some form, by injected humour, or
                        randomised words which don't look even slightly believable.</p>
                    <div class="d-flex flex-column mt-4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Comprar
                        </button>

                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until
                                the collapse
                                plugin adds the appropriate classes that we use to style each element. These classes
                                control the overall
                                appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                this with
                                custom CSS or overriding our default variables. It's also worth noting that just about
                                any HTML can go
                                within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1">$13.99</h4>
                    </div>

                </div>
            </div>
            <div class="row p-2 bg-white border rounded mt-2">
                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image"
                                                src="https://i.imgur.com/JvPeqEF.jpg"></div>
                <div class="col-md-6 mt-1">
                    <h5>Quant trident shirts</h5>
                    <div class="d-flex flex-row">
                        <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i></div>
                        <span>310</span>
                    </div>
                    <div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span
                                class="dot"></span><span>Light weight</span><span
                                class="dot"></span><span>Best finish<br></span></div>
                    <div class="mt-1 mb-1 spec-1"><span>Unique design</span><span
                                class="dot"></span><span>For men</span><span
                                class="dot"></span><span>Casual<br></span></div>
                    <p class="text-justify text-truncate para mb-0">There are many variations of passages of Lorem
                        Ipsum available, but the majority have suffered alteration in some form, by injected humour,
                        or randomised words which don't look even slightly believable.<br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1">$14.99</h4><span class="strike-text">$20.99</span>
                    </div>
                    <h6 class="text-success">Free shipping</h6>
                    <div class="d-flex flex-column mt-4">
                        <button class="btn btn-primary btn-sm" type="button">Details</button>
                        <button class="btn btn-outline-primary btn-sm mt-2" type="button">Add to wishlist</button>
                    </div>
                </div>
            </div>
            <div class="row p-2 bg-white border rounded mt-2">
                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image"
                                                src="https://i.imgur.com/Bf4dIaN.jpg"></div>
                <div class="col-md-6 mt-1">
                    <h5>Quant ruybi shirts</h5>
                    <div class="d-flex flex-row">
                        <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i></div>
                        <span>123</span>
                    </div>
                    <div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span
                                class="dot"></span><span>Light weight</span><span
                                class="dot"></span><span>Best finish<br></span></div>
                    <div class="mt-1 mb-1 spec-1"><span>Unique design</span><span
                                class="dot"></span><span>For men</span><span
                                class="dot"></span><span>Casual<br></span></div>
                    <p class="text-justify text-truncate para mb-0">There are many variations of passages of Lorem
                        Ipsum available, but the majority have suffered alteration in some form, by injected humour,
                        or randomised words which don't look even slightly believable.<br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1">$13.99</h4><span class="strike-text">$20.99</span>
                    </div>
                    <h6 class="text-success">Free shipping</h6>
                    <div class="d-flex flex-column mt-4">
                        <button class="btn btn-primary btn-sm" type="button">Details</button>
                        <button class="btn btn-outline-primary btn-sm mt-2" type="button">Add to wishlist</button>
                    </div>
                </div>
            </div>
            <div class="row p-2 bg-white border rounded mt-2">
                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image"
                                                src="https://i.imgur.com/HO8e9b8.jpg"></div>
                <div class="col-md-6 mt-1">
                    <h5>Quant tinor shirts</h5>
                    <div class="d-flex flex-row">
                        <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i></div>
                        <span>110</span>
                    </div>
                    <div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span
                                class="dot"></span><span>Light weight</span><span
                                class="dot"></span><span>Best finish<br></span></div>
                    <div class="mt-1 mb-1 spec-1"><span>Unique design</span><span
                                class="dot"></span><span>For men</span><span
                                class="dot"></span><span>Casual<br></span></div>
                    <p class="text-justify text-truncate para mb-0">There are many variations of passages of Lorem
                        Ipsum available, but the majority have suffered alteration in some form, by injected humour,
                        or randomised words which don't look even slightly believable.<br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1">$15.99</h4><span class="strike-text">$21.99</span>
                    </div>
                    <h6 class="text-success">Free shipping</h6>
                    <div class="d-flex flex-column mt-4">
                        <button class="btn btn-primary btn-sm" type="button">Details</button>
                        <button class="btn btn-outline-primary btn-sm mt-2" type="button">Add to wishlist</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
