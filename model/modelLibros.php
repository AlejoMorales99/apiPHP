<?php

include_once 'bd.php';

class Libros extends bd
{
    private $conexion;

    function __construct()
    {
        parent::__construct();
        $this->conexion = $this->conexionBD();
    }

    function traerUsuarios($id)
    {

        if ($id == 1) {

            $consulta = $this->conexion->prepare("CALL PA_TRAER_UN_USUARIO(?)");
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $consulta->execute();

            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else {
            $consulta = $this->conexion->prepare("CALL PA_TRAER_USUARIOS()");
            $consulta->execute();

            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }
}
