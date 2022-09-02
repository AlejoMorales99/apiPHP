<?php
error_reporting(0);
include_once("../controllers/UsuariosController.php");

$vista = new UsuariosController();

$opciones = $_SERVER['REQUEST_METHOD'];

if ($opciones == 'GET') {

    if (isset($_GET['id'])) {

        echo json_encode($vista->traerUsuarios($_GET['id']));
    } else {
        echo json_encode($vista->traerUsuarios($_GET['id']));
    }
} else {
}
