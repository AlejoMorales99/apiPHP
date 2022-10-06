<?php
error_reporting(0);
include_once("../../controllers/entradaArticuloController.php");

$json = new entradaArticulo();

$dataGET = [
    'nombreProducto' => $_GET['nomP'],
    'cantidadProducto' => $_GET['canP'],
    'codigoProducto' => $_GET['codP'],
    'idDetalle' => $_GET['idDetalle'],
    'tipoProducto' => $_GET['tipoP'],
    'foto' => $_GET['foto'],
    'idProducto' => $_GET['idProducto']
];

//$host = "http://" + $_SERVER["HTTP_HOST"] + $_SERVER["REQUEST_URI"];

$opciones = $_SERVER['REQUEST_METHOD'];

if ($opciones == 'GET') {

    echo json_encode($json->editarEntrada($dataGET));
    //echo json_encode($vista->insertarUsuarios());

}
