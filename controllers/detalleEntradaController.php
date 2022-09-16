<?php

include_once("../../model/modelDetalleEntrada.php");

class detalleEntrada
{

    private $userJson;
    private $data;

    public function __construct()
    {
        $this->userJson = new modelDetalleEntrada();
    }

    function traerDetalleEntrada($id)
    {
        if ($id == 0) {
            return $this->userJson->traerDetalleEntrada(0);
        } else {
            return $this->userJson->traerDetalleEntrada(1);
        }
    }


    function insertarDetalleEntrada($data)
    {

        $this->data = $data;

        return $this->userJson->insertarDetalleEntrada($this->data);
    }

    function editarDetalleEntrada($dataGET)
    {

        $this->data = $dataGET;

        return $this->userJson->editarDetalleEntrada($this->data);
    }
}
