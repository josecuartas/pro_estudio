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

    public function select(
        $columns = "*",
        $replace = "",
        $where = "",
        $onlyOne = false
    ) {
        $this->connect();
        $query = "SELECT $columns FROM $this->tbl";
        if ($where != "") {
            $query .= " WHERE $where";
        }
        // if ($where != "") {
        //     $query .= " WHERE ID=:id";
        // }
        $stmt = $this->pdo->prepare($query);
        if ($replace != "") {
            $stmt->execute($replace);
        } else {
            $stmt->execute();
        }
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        //$stmt->setFetchMode(PDO::FETCH_CLASS, CategoriasModel::class);
        return $onlyOne ? $stmt->fetch() : $stmt->fetchAll();
    }

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
