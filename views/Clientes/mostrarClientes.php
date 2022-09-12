<?php

include_once("../../controllers/clientesController.php");

$json = new ClientesController();
//$host = $_SERVER["HTTP_HOST"];
//$url = $_SERVER["REQUEST_URI"];

$opciones = $_SERVER['REQUEST_METHOD'];

if ($opciones == 'GET') {

    if (isset($_GET['cliente'])) {
        echo json_encode($json->traerClientes(1));
    } else {
        echo json_encode($json->traerClientes(0));
    }
}
