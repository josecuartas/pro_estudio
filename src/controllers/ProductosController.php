<?php

//namespace App\Controllers;

class ProductosController
{
    public static function list()
    {
        $productos = new ProductosModel();
        $prod_list = $productos->select("id,nombre,fecha_alta,estado");
        return [
            "view" => "/productos/listado.php",
            "form" => [
                "productos" => $prod_list,
            ],
        ];
    }

    public static function edit()
    {
        $id = $_GET["id"];
        $productos = new ProductosModel();
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
        $where = "ID=:id";
        $replace = [":id" => $id];
        $actual = $productos->select($columns, $replace, $where, true);
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

    public static function delete()
    {
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
