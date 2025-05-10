<?php

class ProductosRepository
{
    public static function all()
    {
        $productos = self::new();
        //return $productos->select("id,nombre,fecha_alta,estado");
        return $productos->select();
    }

    public static function find($id)
    {
        $producto = self::new();
        return $producto->select(
            "*",
            [
                "where" => "id=:id",
                "replaces" => [":id" => $id],
            ],
            true
        );
    }

    public static function set($producto, $post)
    {
        $date = date("Y-m-d");
        $producto->setNombre($post["nombre"]);
        $producto->setDescripcion($post["descripcion"]);
        $producto->setPrecio($post["precio"]);
        $producto->setFecha_alta($date);
        //$producto->setFecha_alta($post["fecha"]);
        $producto->setEstado($post["estado"]);
        $producto->setFkproveedor($post["fkproveedor"]);
        is_null($producto->getId()) ? $producto->insert() : $producto->update();
    }

    public static function delete($producto)
    {
        $producto->delete();
    }

    public static function new()
    {
        return new ProductosModel();
    }
}
