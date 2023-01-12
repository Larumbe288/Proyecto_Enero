<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Tables - Atlantis Lite Bootstrap 4 Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no'
          name='template/assets/img/icon.ico" type="image/x-icon"/'>
    <link rel="icon"
          href="/php/proyectointegrador/backend/dashboard/template/examples/demo1/index.html"
          type="image/x-icon"/>
    <!-- Fonts and icons -->
    <script src="/php/proyectointegrador/backend/dashboard/template/examples/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Lato:300,400,700,900"]},
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['/php/proyectointegrador/backend/dashboard/template/examples/assets/css/fonts.min.css']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link rel="stylesheet"
          href="/php/proyectointegrador/backend/dashboard/template/examples/assets/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="/php/proyectointegrador/backend/dashboard/template/examples/assets/css/atlantis.min.css">
</head>
<?php
require "cabecera.php";
require "menu.php";
require $contenido;
//require "footer.php";