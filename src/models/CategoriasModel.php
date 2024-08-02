<?php

//namespace App\Models;

class CategoriasModel
{
    private $pdo;
    private int $id;
    private string $categoria;

    public function getId()
    {
        return $this->id;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function connect()
    {
        $dsn =
            "mysql:host=" .
            DBHOST .
            ";dbname=" .
            DBNAME .
            ";charset=" .
            DBCHARSET;
        $this->pdo = new PDO($dsn, DBUSER, DBPASS);
    }

    /* función que trae todas las categorías, cada una
     como un objeto de tipo categoriasModel*/
    public function all()
    {
        $this->connect();
        $stmt = $this->pdo->prepare("SELECT id,categoria FROM categorias");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, CategoriasModel::class);
        return $stmt->fetchAll();
    }

    public function getOne($id)
    {
        $this->connect();
        $stmt = $this->pdo->prepare(
            "SELECT id, categoria FROM categorias WHERE ID=:id"
        );
        $stmt->execute([":id" => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, CategoriasModel::class);
        return $stmt->fetch();
    }

    public function update($post, $id)
    {
        $this->connect();
        $stmt = $this->pdo->prepare(
            "UPDATE categorias SET CATEGORIA=:cat WHERE ID=:id"
        );
        $stmt->execute([
            ":cat" => $post["categoria"],
            ":id" => $id,
        ]);
    }

    public function insert($post)
    {
        $this->connect();
        $stmt = $this->pdo->prepare(
            "INSERT INTO categorias SET CATEGORIA=:cat"
        );
        $stmt->execute([
            ":cat" => $post["categoria"],
        ]);
    }

    public function delete($id)
    {
        $this->connect();
        $stmt = $this->pdo->prepare("DELETE FROM categorias WHERE id = :id");
        $stmt->execute([":id" => $id]);
    }
}
