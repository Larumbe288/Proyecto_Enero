<?php
if(!isset($_SESSION["login"])) {
    header("Location: http://localhost/php/proyectointegrador/backend/index.php/admin/login");
}