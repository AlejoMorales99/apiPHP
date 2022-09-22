<?php

include_once 'bd.php';

class modelEntradaArticulo extends bd
{
    private $conexion;

    function __construct()
    {
        parent::__construct();
        $this->conexion = $this->conexionBD();
    }

    function traerEntradaArticulo($id)
    {

        if ($id == 1) {

            $consulta = $this->conexion->prepare("CALL PA_TRAER_UNA_ENTRADAARTICULO(?)");
            $consulta->bindParam(1, $_GET['usuarios'], PDO::PARAM_INT);
            $consulta->execute();

            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else {
            $consulta = $this->conexion->prepare("CALL PA_TRAER_ENTRADAARTICULO()");
            $consulta->execute();

            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    function insertarArticulo($data)
    {


        try {
            $consulta = $this->conexion->prepare("CALL PA_GUARDAR_ENTRADAARTICULO(?,?,?,?,?,?)");
            $consulta->bindParam(1, $data['nombreArticulo'], PDO::PARAM_STR);
            $consulta->bindParam(2, $data['cantidadArticulo'], PDO::PARAM_INT);
            $consulta->bindParam(3, $data['codigoArticulo'], PDO::PARAM_STR);
            $consulta->bindParam(4, $data['idDetalle'], PDO::PARAM_INT);
            $consulta->bindParam(5, $data['tipoProducto'], PDO::PARAM_INT);
            $consulta->bindParam(6, $data['foto'], PDO::PARAM_STR);
            $consulta->execute();

            return "Registro insertado con exito";
        } catch (PDOException $e) {
            return "error al insertar en " . $e->getMessage() . "En la linea " . $e->getLine();
        }
    }

    function editarDetalleEntrada($data)
    {

        try {
            $consulta = $this->conexion->prepare("CALL PA_EDITAR_DETALLEENTRADA(?,?,?,?,?,?)");
            $consulta->bindParam(1, $data['fechaDetalle'], PDO::PARAM_STR);
            $consulta->bindParam(2, $data['totalDetalle'], PDO::PARAM_STR);
            $consulta->bindParam(3, $data['clienteID'], PDO::PARAM_INT);
            $consulta->bindParam(4, $data['usuarioID'], PDO::PARAM_INT);
            $consulta->bindParam(5, $data['idEditar'], PDO::PARAM_INT);
            $consulta->bindParam(6, $data['bodega'], PDO::PARAM_STR);
            $consulta->execute();

            return "Registro Actualizado con exito";
        } catch (PDOException $e) {
            return "error al Actualizar  en " . $e->getMessage() . "En la linea " . $e->getLine();
        }
    }
}
