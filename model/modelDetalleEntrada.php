<?php

include_once 'bd.php';

class modelDetalleEntrada extends bd
{
    private $conexion;

    function __construct()
    {
        parent::__construct();
        $this->conexion = $this->conexionBD();
    }

    function traerDetalleEntrada($id)
    {

        if ($id == 1) {

            $consulta = $this->conexion->prepare("CALL PA_TRAER_UN_USUARIO(?)");
            $consulta->bindParam(1, $_GET['usuarios'], PDO::PARAM_INT);
            $consulta->execute();

            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else {
            $consulta = $this->conexion->prepare("CALL PA_TRAER_DETALLEENTRADA()");
            $consulta->execute();

            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    function insertarDetalleEntrada($data)
    {


        try {
            $consulta = $this->conexion->prepare("CALL PA_GUARDAR_DETALLEENTRADA(?,?,?,?)");
            $consulta->bindParam(1, $data['fechaDetalle'], PDO::PARAM_STR);
            $consulta->bindParam(2, $data['totalDetalle'], PDO::PARAM_STR);
            $consulta->bindParam(3, $data['clienteID'], PDO::PARAM_INT);
            $consulta->bindParam(4, $data['usuarioID'], PDO::PARAM_INT);;
            $consulta->execute();

            return "Registro insertado con exito";
        } catch (PDOException $e) {
            return "error al insertar en " . $e->getMessage() . "En la linea " . $e->getLine();
        }
    }
}
