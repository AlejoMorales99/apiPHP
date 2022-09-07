<?php
error_reporting(0);
include_once("../../controllers/UsuariosController.php");

$json = new UsuariosController();

$usuario = $_GET['user'];
$pass = $_GET['pass'];

$data = [

    'user' => $usuario,
    'pass' => $pass

];

//$host = $_SERVER["HTTP_HOST"];
//$url = $_SERVER["REQUEST_URI"];

$opciones = $_SERVER['REQUEST_METHOD'];

if ($opciones == 'GET') {

    echo json_encode($json->validarLogin($data));
}
