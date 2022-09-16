<?php
error_reporting(0);
include_once("../../controllers/detalleEntradaController.php");

$json = new detalleEntrada();

$data = [
    'fechaDetalle' => $_GET['fechaE'],
    'totalDetalle' => $_GET["total"],
    'clienteID' => $_GET['clientesID'],
    'usuarioID' => $_GET['usuarioID'],
    'idEditar' => $_GET['idEditar']
];


//$host = "http://" + $_SERVER["HTTP_HOST"] + $_SERVER["REQUEST_URI"];

$opciones = $_SERVER['REQUEST_METHOD'];

if ($opciones == 'GET') {

    echo json_encode($json->editarDetalleEntrada($data));
    //echo json_encode($vista->insertarUsuarios());

}
