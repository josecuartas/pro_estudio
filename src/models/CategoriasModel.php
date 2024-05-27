<?php

//namespace App\Models;

class CategoriasModel
{
    private $pdo;
    private int $id;
    private string $categoria;
    private string $otrapropiedad;

    public function getId()
    {
        return $this->id;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function getOtrapropiedad()
    {
        return $this->otrapropiedad;
    }

    // private function setId($id)
    // {
    //     $this->id = $id;
    // }

    // public function setCategoria($categoria)
    // {
    //     $this->categoria = $categoria;
    // }

    public function connect()
    {
        $dsn = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=' . DBCHARSET;
        $this->pdo = new PDO($dsn, DBUSER, DBPASS);
    }

    /* función que trae todas las categorías, cada una
    como un objeto de tipo categoriasModel*/
    public function all()
    {
        $this->connect();
        $stmt = $this->pdo->prepare('SELECT id,categoria FROM categorias');
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, CategoriasModel::class);
        $resultado = $stmt->fetchAll();
        echo "<pre>";
        print_r($resultado);
        echo "</pre>";
        die();
        return $stmt->fetchAll();
    }

    public function delete($id)
    {
        $this->connect();
        $stmt = $this->pdo->prepare('DELETE FROM categorias WHERE id=?');
    }
}
