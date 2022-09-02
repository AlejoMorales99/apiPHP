<?php

include_once("../model/modelLibros.php");

class UsuariosController
{

    private $libros;

    public function __construct()
    {
        $this->libros = new Libros();
    }


    function traerUsuarios($id)
    {
        if ($id == 0) {
            return $this->libros->traerUsuarios(0);
        } else {
            return $this->libros->traerUsuarios(1);
        }
    }
}
