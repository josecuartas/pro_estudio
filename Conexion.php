<?php
class Conexion
{
    // public $port = '3307';
    public function conectar()
    {
        $dbname = "crud_catalogo";
        $user = 'root';
        $password = 'Succ355';
        try {
            $dsn = "mysql:host=db;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);
            // echo 'Conexión exitosa <br>';
            return $dbh;
        } catch (PDOException $e) {
            echo 'Fallo en la conexión: ' . $e->getMessage();
        }
    }
}
