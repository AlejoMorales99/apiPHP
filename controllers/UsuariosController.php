<?php

include_once("../../model/modelLibros.php");

class UsuariosController
{

    private $userJson;
    private $data;

    public function __construct()
    {
        $this->userJson = new Libros();
    }


    function traerUsuarios($id)
    {
        if ($id == 0) {
            return $this->userJson->traerUsuarios(0);
        } else {
            return $this->userJson->traerUsuarios(1);
        }
    }

    //,$nom,$ape,$num,$correo,$rolID,$dir,$sexo,$pass
    function insertarUsuarios($tipoD, $numD, $nomU, $apeU, $numU, $correoU, $rolID, $dirU, $sexoU, $passU)
    {

        $this->data = [
            'tipoDocumento' => $tipoD,
            'numDocumento' => $numD,
            'nombreUsuario' => $nomU,
            'apellidoUsuario' => $apeU,
            'numeroUsuario' => $numU,
            'correoUsuario' => $correoU,
            'rolID' => $rolID,
            'direccionUsuario' => $dirU,
            'sexoUsuario' => $sexoU,
            'passUsuario' => $passU,
        ];

        return $this->userJson->insertarUsuarios($this->data);
    }

    function eliminarUsuario($id)
    {

        $this->data = [
            'id' => $id
        ];

        return $this->userJson->eliminarUsuario($this->data);
    }

    function editarUsuarios($dataGET)
    {

        $this->data = $dataGET;

        return $this->userJson->editarUsuarios($this->data);
    }


    function validarLogin($dataGET)
    {

        $this->data = $dataGET;

        return $this->userJson->validarLogin($this->data);
    }
}
