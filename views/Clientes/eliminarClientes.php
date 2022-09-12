<?php
error_reporting(0);
include_once("../../controllers/clientesController.php");

$json = new ClientesController();

$id = $_GET["id"];

//$host = "http://" + $_SERVER["HTTP_HOST"] + $_SERVER["REQUEST_URI"];

$opciones = $_SERVER['REQUEST_METHOD'];

if ($opciones == 'GET') {

    echo json_encode($json->eliminarCliente($id));
    //echo json_encode($vista->insertarUsuarios());

}
