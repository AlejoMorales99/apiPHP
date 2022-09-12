<?php

include_once("../../controllers/clientesController.php");

$json = new ClientesController();

$dataGET = [
    'idCliente' => $_GET['id'],
    'nombreCliente' => $_GET['nomC'],
    'tipoDocumento' => $_GET['docu'],
    'numeroDocumento' => $_GET['numD'],
    'celularCliente' => $_GET['cel'],
    'correoCliente' => $_GET['correo'],
    'razonSocial' => $_GET['razon'],
    'foto' => $_GET['foto']
];

//$host = "http://" + $_SERVER["HTTP_HOST"] + $_SERVER["REQUEST_URI"];

$opciones = $_SERVER['REQUEST_METHOD'];

if ($opciones == 'GET') {

    echo json_encode($json->editarClientes($dataGET));
    //echo json_encode($vista->insertarUsuarios());

}
