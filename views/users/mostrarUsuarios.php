<?php
error_reporting(0);
include_once("../../controllers/UsuariosController.php");

$json = new UsuariosController();
//$host = $_SERVER["HTTP_HOST"];
//$url = $_SERVER["REQUEST_URI"];

$opciones = $_SERVER['REQUEST_METHOD'];

if ($opciones == 'GET') {

    if (isset($_GET['usuarios'])) {
        echo json_encode($json->traerUsuarios(1));
    } else {
        echo json_encode($json->traerUsuarios(0));
    }
}
