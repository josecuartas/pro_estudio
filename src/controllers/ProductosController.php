<?php

//namespace App\Controllers;

class ProductosController
{
    public static function list()
    {
        $productos = new ProductosModel();
        $prod_list = $productos->getAll();
        return [
            "view" => "/productos/listado.php",
            "form" => [
                "productos" => $prod_list,
            ],
        ];
    }
    public static function new()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $productos = new ProductosModel();
            $productos->insert($_POST);
            header("location:/productos");
        }
        return [
            "view" => "/productos/form.php",
            "form" => [
                "title" => "Alta de producto",
                "button" => "Agregar producto",
                "action" => "/productos/new",
            ],
        ];
    }
    public static function edit()
    {
        $productos = new ProductosModel();
        $id = $_GET["id"];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $productos = new ProductosModel();
            $productos->update($_POST, $id);
            header("location:/productos");
        }
        $actual = $productos->getOne($id);
        return [
            "view" => "/productos/form.php",
            "form" => [
                "title" => "Actualizar producto",
                "button" => "Actualizar producto",
                "action" => "/productos/" . $_GET["id"] . "/edit",
                "value" => $actual,
            ],
        ];
    }
    public static function delete()
    {
        // echo "Eliminando producto con id " . $_GET['id'];

        $productos = new ProductosModel();
        $productos->delete($_GET["id"]);
        $prod_list = $productos->getAll();
        return [
            "view" => "/productos/listado.php",
            "form" => [
                "productos" => $prod_list,
            ],
        ];
        // header('location: /productos');
        // die();
    }
}
