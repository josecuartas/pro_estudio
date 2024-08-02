<?php

//namespace App\Models;

class ProductosModel
{
    private $pdo;
    private int $id;
    private string $nombre;
    private string $estado;
    private string $fecha_alta;

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getFechaAlta()
    {
        return $this->fecha_alta;
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

    public function getAll()
    {
        $this->connect();
        $stmt = $this->pdo->prepare(
            "SELECT id,nombre,fecha_alta,estado FROM productos"
        );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, ProductosModel::class);
        return $stmt->fetchAll();
    }

    public function getOne($id)
    {
        $this->connect();
        $stmt = $this->pdo->prepare(
            "SELECT id,nombre,fecha_alta,estado FROM productos WHERE id=:id"
        );
        $stmt->execute([":id" => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, ProductosModel::class);
        return $stmt->fetch();
    }

    public function delete($id)
    {
        $this->connect();
        $stmt = $this->pdo->prepare("DELETE FROM productos WHERE ID=:id");
        $stmt->execute([":id" => $id]);
    }

    public function insert($post)
    {
        $this->connect();
        $stmt = $this->pdo->prepare(
            "INSERT INTO productos SET nombre=:name,estado=:state,fecha_alta=now()"
        );
        $stmt->execute([
            ":name" => $post["nombre"],
            ":state" => $post["estado"],
        ]);
    }

    public function update($post, $id)
    {
        $this->connect();
        $stmt = $this->pdo->prepare(
            "UPDATE productos SET nombre=:name,estado=:state WHERE id=:id"
        );
        $stmt->execute([
            ":name" => $post["nombre"],
            ":state" => $post["estado"],
            ":id" => $id,
        ]);
    }
}
