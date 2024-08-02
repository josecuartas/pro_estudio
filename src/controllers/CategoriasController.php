<?php

//namespace App\Controllers;

class CategoriasController
{
    /* métodos que me ofrece categorías */
    public static function list()
    {
        $categoria = new CategoriasModel();
        $cat_list = $categoria->all();
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
            $categoria->insert($_POST);
            header("location:/categorias");
        }
        return [
            "view" => "/categorias/form.php",
            "form" => [
                "title" => "Alta de categoría",
                "button" => "Agregar categoría",
            ],
        ];
    }

    public static function edit()
    {
        $id = $_GET["id"];
        $categoria = new CategoriasModel();
        $registro = $categoria->getOne($id);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $categoria->update($_POST, $id);
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
        $categoria->delete($id);
        // header('location: /categorias');
        $cat_list = $categoria->all();
        return [
            "view" => "/categorias/listado.php",
            "form" => [
                "categorias" => $cat_list,
            ],
        ];
    }
}
