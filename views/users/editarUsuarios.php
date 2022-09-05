<?php
error_reporting(0);
include_once("../../controllers/UsuariosController.php");

$json = new UsuariosController();

$dataGET = [
    'id' => $_GET['id'],
    'tipoD' => $_GET['tipoD'],
    'numD' => $_GET['numD'],
    'nomU' => $_GET['nomU'],
    'apeU' => $_GET['apeU'],
    'numU' => $_GET['numU'],
    'correoU' => $_GET['correoU'],
    'fotoU' => $_GET['fotoU'],
    'rolID' => $_GET['rolID'],
    'dirU' => $_GET['dirU'],
    'sexoU' => $_GET['sexoU'],
    'passU' => $_GET['passU'],
];

//$host = "http://" + $_SERVER["HTTP_HOST"] + $_SERVER["REQUEST_URI"];

$opciones = $_SERVER['REQUEST_METHOD'];

if ($opciones == 'GET') {

    echo json_encode($json->editarUsuarios($dataGET));
    //echo json_encode($vista->insertarUsuarios());

}
