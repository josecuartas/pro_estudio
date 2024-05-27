<?php
class configurar
{
    private $host = "db";
    private $dbname = "pruebadb";
    private $user = "root";
    private $password = "Succ355";

    public function conexion()
    {
        try {
            $PDO = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->password);
            return $PDO;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

// $obj = new configurar;
// print_r($obj->conexion());
