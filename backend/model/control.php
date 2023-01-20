<?php
if(!isset($_SESSION["login"])) {
    header("Location: http://localhost/proyectointegrador/backend/index.php/admin/login");
}