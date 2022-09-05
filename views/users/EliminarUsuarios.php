<?php
error_reporting(0);
include_once("../../controllers/UsuariosController.php");

$json = new UsuariosController();

$id = $_GET["id"];

//$host = "http://" + $_SERVER["HTTP_HOST"] + $_SERVER["REQUEST_URI"];

$opciones = $_SERVER['REQUEST_METHOD'];

if ($opciones == 'GET') {

    echo json_encode($json->eliminarUsuario($id));
    //echo json_encode($vista->insertarUsuarios());

}
