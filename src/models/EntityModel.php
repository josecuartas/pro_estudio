<?php

class EntityModel
{
    protected $pdo;
    protected $table = "table";
    protected $alias = "t";
    private $query;
    private $replace;

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
        $this->pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    }

    public function select($columns = "*", $filters = null, $onlyOne = false)
    {
        $this->query = "SELECT $columns FROM $this->table AS $this->alias";
        if (isset($filters["join"])) {
            foreach ($filters["join"] as $j) {
                $this->query .=
                    " " . ($j["type"] ?? "") . " JOIN $j[table] ON $j[on] ";
            }
        }
        if (isset($filters["where"])) {
            $this->query .= " WHERE $filters[where]";
        }
        if (isset($filters["group"])) {
            $this->query .= " GROUP BY $filters[group]";
        }
        if (isset($filters["having"])) {
            $this->query .= " HAVING $filters[having]";
        }
        if (isset($filters["order"])) {
            $this->query .= " ORDER BY $filters[order]";
        }
        if (isset($filters["limit"])) {
            $this->query .= " LIMIT $filters[limit]";
        }
        if (isset($filters["sql"])) {
            echo "EN SELECT SQL: ( $this->query ) <br>";
        }
        $this->replace = $filters["replaces"] ?? null;
        echo "EN SELECT: ( $this->query ) <hr>";
        return $this->execute($fetch = true, $onlyOne);
    }

    public function insert()
    {
        $columns = $this->getAttributes();
        $this->query = "INSERT INTO $this->table SET $columns";
        $this->execute();
    }

    public function update()
    {
        $columns = $this->getAttributes();
        $id = $this->getId();
        $this->query = "UPDATE $this->table SET $columns WHERE ID=$id";
        $this->execute();
    }

    public function delete()
    {
        $this->query = "DELETE FROM $this->table WHERE id = :id";
        $this->replace = [":id" => $this->getId()];
        $this->execute();
    }

    public function getAttributes()
    {
        $reflections = new ReflectionClass($this);
        $attributes = $reflections->getProperties();
        $attrs = array_filter($attributes, function ($a) {
            $name = $a->getName();
            $class_origen = $a->getDeclaringClass()->getName();
            $class_actual = get_class($this);
            $is_protected = $a->isProtected();
            $method_to_verify = "set" . ucfirst($name);
            return $class_origen == $class_actual &&
                !$is_protected &&
                method_exists($this, $method_to_verify);
        });
        //$query_array = [];
        foreach ($attrs as $a) {
            $name = $a->getName();
            $metodo = "get" . ucfirst($name);
            $this->replace["$name"] = $this->$metodo();
            $query_array[] = "$name=:$name";
        }
        return implode(",", $query_array);
    }

    private function execute($fetch = null, $onlyOne = null)
    {
        $this->connect();
        $stmt = $this->pdo->prepare($this->query);
        $stmt->execute($this->replace);
        echo "EN EXECUTE: ( $this->query ) ( ONLYONE: ( $onlyOne ) ) <br>";
        if ($fetch) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this));
            if ($onlyOne) {
                $item = $stmt->fetch();
                echo "EN EXECUTE: ( UNO ) <br>";
                //print_r($item);
                echo "<br>";
                return $this->mapRelations($item);
            } else {
                $collection = $stmt->fetchAll();
                echo "EN EXECUTE: ( MUCHOS ) <br>";
                foreach ($collection as $c) {
                    echo "MUCHOS <br>";
                    echo "ID: ";
                    print_r($c->getId());
                    echo "<br>";
                    echo "TABLE: ";
                    print_r($c->getTable());
                    echo "<br>";
                }
                //echo "<hr>";
                echo "<br>";
                return array_map(function ($item) {
                    echo "EN ARRAY_MAP<br>";
                    //echo "EN ARRAY_MAP<br><pre>";
                    //print_r($item);
                    echo "ID: ";
                    print_r($item->getId());
                    echo "<br>";
                    echo "TABLE: ";
                    print_r($item->getTable());
                    echo "<hr>";
                    //echo "</pre><hr>";
                    return $this->mapRelations($item);
                }, $collection);
            }
        }
    }

    private function mapRelations($item)
    {
        echo "EN MAPRELATIONS <br>";
        $id = $item->getId();
        $reflection = new ReflectionClass($item);
        $attributes = $reflection->getProperties();
        foreach ($attributes as $attr) {
            $name = $attr->getName();
            $annotations = $attr->getDocComment();
            if (
                $annotations &&
                preg_match(
                    "/@(ManyToMany|ManyToOne|OneToMany|OneToOne)\((.+)\)/",
                    $annotations,
                    $matches
                )
            ) {
                $relationType = $matches[1];
                $relationAttrs = $matches[2];
                $relationMethod = "get" . $relationType . "Rows";
                $setter = "set" . ucfirst($name);
                echo "En mapRelations antes: $relationType <br>";
                echo "ID: ";
                print_r($item->getId());
                echo "<br>";
                echo "TABLE: ";
                print_r($item->getTable());
                echo "<br>";
                print_r($relationAttrs);
                echo "<br>";
                echo $setter;
                echo "<hr>";
                $item->$setter(
                    $rows = $this->$relationMethod($relationAttrs, $id)
                );
                echo "En mapRelations después rows: <br><pre>";
                print_r($rows);
                echo "</pre><hr>";
            }
        }
        return $item;
    }

    private function getOneToOneRows($relationAttrs, $id)
    {
        $targetEntity = $this->getRelationAttrsValue(
            $relationAttrs,
            "targetEntity"
        );
        $targetObject = new $targetEntity();
        $filters = [];
        return $targetObject->select("*", $filters, true);
    }

    private function getOneToManyRows($relationAttrs, $id)
    {
        $targetEntity = $this->getRelationAttrsValue(
            $relationAttrs,
            "targetEntity"
        );
        $targetObject = new $targetEntity();
        $filters = [];
        echo "En OneToMany: ";
        return $targetObject->select("*", $filters, false);
    }

    private function getManyToOneRows($relationAttrs, $id)
    {
        $targetEntity = $this->getRelationAttrsValue(
            $relationAttrs,
            "targetEntity"
        );
        $targetObject = new $targetEntity();
        $filters = [];
        return $targetObject->select("*", $filters, true);
    }

    private function getManyToManyRows($relationAttrs, $id)
    {
        $targetEntity = $this->getRelationAttrsValue(
            $relationAttrs,
            "targetEntity"
        );
        //$targetNs = "\\App\\Models\\$targetEntity";
        $targetObject = new $targetEntity();

        $targetTable = $targetObject->table;
        $targetAlias = $targetObject->alias;

        $joinTable = $this->getRelationAttrsValue($relationAttrs, "joinTable");
        $joinColumn = $this->getRelationAttrsValue(
            $relationAttrs,
            "joinColumn"
        );
        $inversedJoinColumn = $this->getRelationAttrsValue(
            $relationAttrs,
            "inversedJoinColumn"
        );
        $filters = [
            "join" => [
                [
                    "table" => "$joinTable as __joinTable",
                    "on" => "__joinTable.$joinColumn = $targetAlias.ID",
                ],
            ],
            "where" => "__joinTable.$inversedJoinColumn=:id",
            "replaces" => [":id" => $id],
            "sql" => true,
        ];
        echo "EN MANYTOMANY<br><pre>";
        print_r($targetEntity);
        echo "<br>";
        print_r($targetObject);
        echo "</pre>";
        echo $relationAttrs;
        echo "<br>";
        echo "LLama a SELECT";
        echo "<pre>";
        print_r($filters);
        echo "</pre>";
        echo "<hr>";
        return $targetObject->select("$targetAlias.*", $filters, false);
    }

    private function getRelationAttrsValue($attrs, $attr, $default = null)
    {
        preg_match("/$attr=(\w+)/", $attrs, $matches);
        return $matches[1] ?? $default;
    }
}
