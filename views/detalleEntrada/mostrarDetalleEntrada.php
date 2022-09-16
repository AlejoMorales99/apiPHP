<?php
error_reporting(0);
include_once("../../controllers/detalleEntradaController.php");

$json = new detalleEntrada();
//$host = $_SERVER["HTTP_HOST"];
//$url = $_SERVER["REQUEST_URI"];

$opciones = $_SERVER['REQUEST_METHOD'];

if ($opciones == 'GET') {

    if (isset($_GET['detalle'])) {
        echo json_encode($json->traerDetalleEntrada(1));
    } else {
        echo json_encode($json->traerDetalleEntrada(0));
    }
}
