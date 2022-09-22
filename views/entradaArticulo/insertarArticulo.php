<?php
error_reporting(0);
include_once("../../controllers/entradaArticuloController.php");

$json = new entradaArticulo();

$data = [
    'nombreArticulo' => $_GET['nomA'],
    'cantidadArticulo' => $_GET["canA"],
    'codigoArticulo' => $_GET['codArticulo'],
    'idDetalle' => $_GET['idDetalle'],
    'tipoProducto' => $_GET['tipoProducto'],
    'foto' => $_GET['foto']
];


//$host = "http://" + $_SERVER["HTTP_HOST"] + $_SERVER["REQUEST_URI"];

$opciones = $_SERVER['REQUEST_METHOD'];

if ($opciones == 'GET') {

    echo json_encode($json->insertarArticulo($data));
    //echo json_encode($vista->insertarUsuarios());

}
