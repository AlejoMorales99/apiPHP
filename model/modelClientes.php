<?php

include_once 'bd.php';

class Clientes extends bd
{
    private $conexion;

    function __construct()
    {
        parent::__construct();
        $this->conexion = $this->conexionBD();
    }

    function traerClientes($id)
    {

        if ($id == 1) {

            $consulta = $this->conexion->prepare("CALL PA_TRAER_UN_CLIENTE(?)");
            $consulta->bindParam(1, $_GET['cliente'], PDO::PARAM_INT);
            $consulta->execute();

            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else {
            $consulta = $this->conexion->prepare("CALL PA_TRAER_CLIENTES()");
            $consulta->execute();

            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    function insertarClientes($data)
    {
        $null = NULL;

        try {
            $consulta = $this->conexion->prepare("CALL PA_GUARDAR_CLIENTE(?,?,?,?,?,?,?)");
            $consulta->bindParam(1, $data['nombreCliente'], PDO::PARAM_STR);
            $consulta->bindParam(2, $data['tipoDocumento'], PDO::PARAM_STR);
            $consulta->bindParam(3, $data['numeroDocumento'], PDO::PARAM_STR);
            $consulta->bindParam(4, $data['numeroCelular'], PDO::PARAM_STR);
            $consulta->bindParam(5, $data['correoCliente'], PDO::PARAM_STR);
            $consulta->bindParam(6, $data['razonSocial'], PDO::PARAM_STR);
            $consulta->bindParam(7, $data['fotoCliente'], PDO::PARAM_STR);
            $consulta->execute();

            return "Registro insertado con exito";
        } catch (PDOException $e) {
            return "error al insertar en " . $e->getMessage() . "En la linea " . $e->getLine();
        }
    }


    function eliminarCliente($data)
    {

        try {
            $consulta = $this->conexion->prepare("CALL PA_ELIMINAR_CLIENTE(?)");
            $consulta->bindParam(1, $data['id'], PDO::PARAM_INT);
            $consulta->execute();


            return "Registro Eliminado con exito";
        } catch (PDOException $e) {
            return "error al Eliminar  en " . $e->getMessage() . "En la linea " . $e->getLine();
        }
    }

    function editarClientes($data)
    {

        try {
            $consulta = $this->conexion->prepare("CALL PA_EDITAR_CLIENTE(?,?,?,?,?,?,?,?)");
            $consulta->bindParam(1, $data['nombreCliente'], PDO::PARAM_STR);
            $consulta->bindParam(2, $data['tipoDocumento'], PDO::PARAM_STR);
            $consulta->bindParam(3, $data['numeroDocumento'], PDO::PARAM_STR);
            $consulta->bindParam(4, $data['celularCliente'], PDO::PARAM_STR);
            $consulta->bindParam(5, $data['correoCliente'], PDO::PARAM_STR);
            $consulta->bindParam(6, $data['razonSocial'], PDO::PARAM_STR);
            $consulta->bindParam(7, $data['foto'], PDO::PARAM_STR);
            $consulta->bindParam(8, $data['idCliente'], PDO::PARAM_INT);
            $consulta->execute();

            return "Registro Actualizado con exito";
        } catch (PDOException $e) {
            return "error al Actualizar  en " . $e->getMessage() . "En la linea " . $e->getLine();
        }
    }
}
