<?php

include_once("../../model/modelClientes.php");

class ClientesController
{

    private $userJson;
    private $data;

    public function __construct()
    {
        $this->userJson = new Clientes();
    }


    function traerClientes($id)
    {
        if ($id == 0) {
            return $this->userJson->traerClientes(0);
        } else {
            return $this->userJson->traerClientes(1);
        }
    }

    function insertarClientes($data)
    {

        $this->data = $data;

        return $this->userJson->insertarClientes($this->data);
    }

    function eliminarCliente($id)
    {

        $this->data = [
            'id' => $id
        ];

        return $this->userJson->eliminarCliente($this->data);
    }


    function editarClientes($dataGET)
    {

        $this->data = $dataGET;

        return $this->userJson->editarClientes($this->data);
    }
}
