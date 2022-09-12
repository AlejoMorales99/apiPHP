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
            $consulta->bindParam(1, $_GET['usuarios'], PDO::PARAM_INT);
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

    function insertarUsuarios($data)
    {
        $null = NULL;

        try {
            $consulta = $this->conexion->prepare("CALL PA_GUARDAR_USUARIO(?,?,?,?,?,?,?,?,?,?,?)");
            $consulta->bindParam(1, $data['tipoDocumento'], PDO::PARAM_STR);
            $consulta->bindParam(2, $data['numDocumento'], PDO::PARAM_STR);
            $consulta->bindParam(3, $data['nombreUsuario'], PDO::PARAM_STR);
            $consulta->bindParam(4, $data['apellidoUsuario'], PDO::PARAM_STR);
            $consulta->bindParam(5, $data['numeroUsuario'], PDO::PARAM_STR);
            $consulta->bindParam(6, $data['correoUsuario'], PDO::PARAM_STR);
            $consulta->bindParam(7, $null, PDO::PARAM_STR);
            $consulta->bindParam(8, $data['rolID'], PDO::PARAM_INT);
            $consulta->bindParam(9, $data['direccionUsuario'], PDO::PARAM_STR);
            $consulta->bindParam(10, $data['sexoUsuario'], PDO::PARAM_STR);
            $consulta->bindParam(11, $data['passUsuario'], PDO::PARAM_STR);
            $consulta->execute();

            return "Registro insertado con exito";
        } catch (PDOException $e) {
            return "error al insertar en " . $e->getMessage() . "En la linea " . $e->getLine();
        }
    }


    function eliminarUsuario($data)
    {

        try {
            $consulta = $this->conexion->prepare("CALL PA_ELIMINAR_USUARIO(?)");
            $consulta->bindParam(1, $data['id'], PDO::PARAM_INT);
            $consulta->execute();

            return "Registro Eliminado con exito";
        } catch (PDOException $e) {
            return "error al Eliminar  en " . $e->getMessage() . "En la linea " . $e->getLine();
        }
    }


    function editarUsuarios($data)
    {

        try {
            $consulta = $this->conexion->prepare("CALL PA_EDITAR_USUARIO(?,?,?,?,?,?,?,?,?,?,?,?)");
            $consulta->bindParam(1, $data['tipoD'], PDO::PARAM_STR);
            $consulta->bindParam(2, $data['numD'], PDO::PARAM_STR);
            $consulta->bindParam(3, $data['nomU'], PDO::PARAM_STR);
            $consulta->bindParam(4, $data['apeU'], PDO::PARAM_STR);
            $consulta->bindParam(5, $data['numU'], PDO::PARAM_STR);
            $consulta->bindParam(6, $data['correoU'], PDO::PARAM_STR);
            $consulta->bindParam(7, $data['fotoU'], PDO::PARAM_STR);
            $consulta->bindParam(8, $data['rolID'], PDO::PARAM_INT);
            $consulta->bindParam(9, $data['dirU'], PDO::PARAM_STR);
            $consulta->bindParam(10, $data['sexoU'], PDO::PARAM_STR);
            $consulta->bindParam(11, $data['passU'], PDO::PARAM_STR);
            $consulta->bindParam(12, $data['id'], PDO::PARAM_INT);
            $consulta->execute();

            return "Registro Actualizado con exito";
        } catch (PDOException $e) {
            return "error al Actualizar  en " . $e->getMessage() . "En la linea " . $e->getLine();
        }
    }

    function validarLogin($data)
    {

        try {
            $consulta = $this->conexion->prepare("SELECT * FROM `usuario` WHERE NumeroDocu = ? AND Contraseña = ?");
            $consulta->bindParam(1, $data['user'], PDO::PARAM_STR);
            $consulta->bindParam(2, $data['pass'], PDO::PARAM_STR);

            $consulta->execute();

            $data = $consulta->fetch(pdo::FETCH_ASSOC);


            return $data;
        } catch (PDOException $e) {
            return "error al ingresar  en " . $e->getMessage() . "En la linea " . $e->getLine();
        }
    }
}
