<?php

//namespace App\Controllers;

class CategoriasController
{
    /* métodos que me ofrece categorías */
    public static function list()
    {
        $categoria = new CategoriasModel();
        $cat_list = $categoria->get_one_much("id,categoria");
        return [
            "view" => "/categorias/listado.php",
            "form" => [
                "categorias" => $cat_list,
            ],
        ];
    }

    public static function new()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $categoria = new CategoriasModel();
            $categoria->insert("CATEGORIA=:cat", [
                ":cat" => $_POST["categoria"],
            ]);
            header("location:/categorias");
        }
        return [
            "view" => "/categorias/form.php",
            "form" => [
                "title" => "Alta de categoría",
                "button" => "Alata de categoría",
            ],
        ];
    }

    public static function edit()
    {
        $id = $_GET["id"];
        $categoria = new CategoriasModel();
        $registro = $categoria->get_one_much("id, categoria", [":id" => $id]);

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
    public static function delete()
    {
        $id = $_GET["id"];
        $categoria = new CategoriasModel();
        $replace = [":id" => $id];
        $categoria->delete($replace);
        // header('location: /categorias');
        $cat_list = $categoria->all("id, categoria");
        return [
            "view" => "/categorias/listado.php",
            "form" => [
                "categorias" => $cat_list,
            ],
        ];
    }
}
