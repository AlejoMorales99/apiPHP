<?php
error_reporting(0);
include_once("../../controllers/clientesController.php");

$json = new ClientesController();

$data = [
    'nombreCliente' => $_GET['nomC'],
    'tipoDocumento' => $_GET["tipoD"],
    'numeroDocumento' => $_GET['numD'],
    'numeroCelular' => $_GET['numC'],
    'correoCliente' => $_GET['correoC'],
    'razonSocial' => $_GET['razonS'],
    'fotoCliente' => $_GET['fotoC'],
];


//$host = "http://" + $_SERVER["HTTP_HOST"] + $_SERVER["REQUEST_URI"];

$opciones = $_SERVER['REQUEST_METHOD'];

if ($opciones == 'GET') {

    echo json_encode($json->insertarClientes($data));
    //echo json_encode($vista->insertarUsuarios());

}
