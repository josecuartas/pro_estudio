<?php

//namespace App\Controllers;

class ProductosController
{
    public static function list()
    {
        $listado = ProductosRepository::all();
        echo "<pre>";
        print_r($listado);
        die();
        return [
            "view" => "/productos/listado.php",
            "productos" => $listado,
        ];
    }

    public static function edit()
    {
        $id = $_GET["id"];
        $producto = ProductosRepository::find($id);
        if (!$producto) {
            header("location:/productos?error=No existe el producto a editar");
            die();
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            ProductosRepository::set($producto, $_POST);
            header("location:/productos");
            die();
        }
        return [
            "view" => "/productos/form.php",
            "form" => [
                "title" => "Actualizar producto",
                "button" => "Actualizar producto",
                "action" => "/productos/" . $_GET["id"] . "/edit",
                "value" => $producto,
            ],
        ];
    }

    public static function new()
    {
        $producto = ProductosRepository::new();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            ProductosRepository::set($producto, $_POST);
            header("location:/productos");
        }
        return [
            "view" => "/productos/form.php",
            "form" => [
                "title" => "Alta de producto",
                "button" => "Agregar producto",
                "action" => "/productos/new",
                "value" => $producto,
            ],
        ];
    }

    public static function delete()
    {
        $producto = ProductosRepository::find($_GET["id"]);
        if (!$producto) {
            header(
                "location: /productos?error=No existe el producto a eliminar"
            );
            die();
        }
        ProductosRepository::delete($producto);
        header("location: /productos");
        die();
    }
}
