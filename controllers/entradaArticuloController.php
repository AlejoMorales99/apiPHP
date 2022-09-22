<?php

include_once("../../model/modelEntradaArticulo.php");

class entradaArticulo
{

    private $userJson;
    private $data;

    public function __construct()
    {
        $this->userJson = new modelEntradaArticulo();
    }

    function traerArticulos($id)
    {
        if ($id == 0) {
            return $this->userJson->traerEntradaArticulo(0);
        } else {
            return $this->userJson->traerEntradaArticulo(1);
        }
    }


    function insertarArticulo($data)
    {

        $this->data = $data;

        return $this->userJson->insertarArticulo($this->data);
    }

    function editarDetalleEntrada($dataGET)
    {

        $this->data = $dataGET;

        return $this->userJson->editarDetalleEntrada($this->data);
    }
}
