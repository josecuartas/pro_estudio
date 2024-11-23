<?php

//namespace App\Controllers;

class CategoriasController
{
    public static function list()
    {
        $categorias = new CategoriasModel();
        $cat_list = $categorias->select("id,categoria");
        return [
            "view" => "/categorias/listado.php",
            "form" => [
                "categorias" => $cat_list,
            ],
        ];
    }

    public static function edit()
    {
        $id = $_GET["id"];
        $categorias = new CategoriasModel();
        $columns = "id,categoria";
        $replace = [":id" => $id];
        $where = "ID=:id";
        $registro = $categorias->select($columns, $replace, $where, true);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //$categoria->update($_POST, $id);
            $columns = "CATEGORIA=:cat";
            $replace = [":cat" => $_POST["categoria"], ":id" => $id];
            $categoria->update($columns, $replace);
            header("location:/categorias");
        }
        return [
            "view" => "/categorias/form.php",
            "form" => [
                "title" => "Actualizar categoría",
                "button" => "Actualizar categoría",
                "registro" => $registro,
            ],
        ];
    }

    public static function new()
    {
        $categorias = new CategoriasModel();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $categorias->insert("CATEGORIA=:cat", [
                ":cat" => $_POST["categoria"],
            ]);
            header("location:/categorias");
        }
        return [
            "view" => "/categorias/form.php",
            "form" => [
                "title" => "Alta de categoría",
                "button" => "Alata de categoría",
                "registro" => $categorias,
            ],
        ];
    }

    public static function delete()
    {
        $id = $_GET["id"];
        $categorias = new CategoriasModel();
        $replace = [":id" => $id];
        $categorias->delete($replace);
        // header('location: /categorias');
        $cat_list = $categorias->all("id, categoria");
        return [
            "view" => "/categorias/listado.php",
            "form" => [
                "categorias" => $cat_list,
            ],
        ];
    }
}
