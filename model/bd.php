<?php

class bd
{

    private $host;
    private $db;
    private $user;
    private $password;

    public function __construct()
    {
        $this->host = "localhost";
        $this->db = "bdproyecto";
        $this->user = "root";
        $this->password = "";
    }

    function conexionBD()
    {
        try {

            $con = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->password);
            return $con;
        } catch (PDOException $e) {
            echo "error en la conexion en " . $e->getMessage();
        }
    }
}
