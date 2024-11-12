<?php

//namespace App\Controllers;

class ProductosController
{
    /* métodos que me ofrece productos */
    public static function list()
    {
        $productos = new ProductosModel();
        $prod_list = $productos->get_one_much("id,nombre,fecha_alta,estado");
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
            $productos->insert("nombre=:name,estado=:state,fecha_alta=now()", [
                ":name" => $_POST["nombre"],
                ":state" => $_POST["estado"],
            ]);
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
            $columns = "nombre=:name,estado=:state";
            $replace = [
                ":name" => $_POST["nombre"],
                ":state" => $_POST["estado"],
                ":id" => $id,
            ];
            $productos->update($columns, $replace);
            header("location:/productos");
        }
        $columns = "id,nombre,fecha_alta,estado";
        $replace = "':id' => $id";
        $actual = $productos->get_one_much($columns, $replace);
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
        $productos->delete([":id" => $_GET["id"]]);
        $prod_list = $productos->all("id,nombre,fecha_alta,estado");
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
