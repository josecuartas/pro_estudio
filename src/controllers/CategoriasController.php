<?php

//namespace App\Controllers;

class CategoriasController
{
    public static function list()
    {
        $listado = CategoriasRepository::all();
        return [
            "view" => "/categorias/listado.php",
            "categorias" => $listado,
        ];
    }

    public static function edit()
    {
        $id = $_GET["id"];
        $categoria = CategoriasRepository::find($id);
        if (!$categoria) {
            header("location: /categorias?error=Categoria a editar, no existe");
            die();
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            CategoriasRepository::set($categoria, $_POST, $id);
            header("location:/categorias");
        }

        return [
            "view" => "/categorias/form.php",
            "form" => [
                "title" => "Actualizar categoría",
                "button" => "Actualizar categoría",
                "registro" => $categoria,
            ],
        ];
    }

    public static function new()
    {
        $categoria = CategoriasRepository::new();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            CategoriasRepository::set($categoria, $_POST);
            header("location:/categorias");
        }
        return [
            "view" => "/categorias/form.php",
            "form" => [
                "title" => "Alta de categoría",
                "button" => "Alata de categoría",
                "registro" => $categoria,
            ],
        ];
    }

    public static function delete()
    {
        $categoria = CategoriasRepository::find($_GET["id"]);
        if (!$categoria) {
            header("location: /categorias?error=Categoría a borrar, no existe");
            die();
        }
        CategoriasRepository::delete($categoria);
        header("location:/categorias");
        die();
    }
}
