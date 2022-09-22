<?php
error_reporting(0);
include_once("../../controllers/entradaArticuloController.php");

$json = new entradaArticulo();
//$host = $_SERVER["HTTP_HOST"];
//$url = $_SERVER["REQUEST_URI"];

$opciones = $_SERVER['REQUEST_METHOD'];

if ($opciones == 'GET') {

    if (isset($_GET['detalle'])) {
        echo json_encode($json->traerArticulos(1));
    } else {
        echo json_encode($json->traerArticulos(0));
    }
}
