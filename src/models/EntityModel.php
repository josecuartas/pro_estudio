<?php

class EntityModel
{
    protected $pdo;
    protected $tbl = "table";

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

    public function get_one_much($columns = "*", $replace = "")
    {
        $this->connect();
        echo $replace;
        $query = "SELECT $columns FROM $this->tbl";
        if (!($replace = "")) {
            $query .= " WHERE ID=:id";
        }
        echo $query;
        $stmt = $this->pdo->prepare($query);
        if (!($repalce = " ")) {
            $stmt->execute($replace);
        } else {
            $stmt->execute();
        }
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        //$stmt->setFetchMode(PDO::FETCH_CLASS, CategoriasModel::class);
        if (!($replace = " ")) {
            return $stmt->fetch();
        } else {
            return $stmt->fetchAll();
        }
    }

    /*public function getOne($columns, $replace)
    {
        $this->connect();
        $query = "SELECT $columns FROM $this->tbl WHERE ID=:id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($replace);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $stmt->fetch();
        }*/

    public function update($columns, $replace)
    {
        $this->connect();
        $stmt = $this->pdo->prepare(
            "UPDATE $this->tbl SET $columns WHERE ID=:id"
        );
        $stmt->execute($replace);
    }

    public function insert($columns, $replace)
    {
        $this->connect();
        $stmt = $this->pdo->prepare("INSERT INTO $this->tbl SET $columns");
        $stmt->execute($replace);
    }

    public function delete($replace)
    {
        $this->connect();
        $query = "DELETE FROM $this->tbl WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($replace);
        //$stmt->execute([":id" => $id]);
    }
}
