<?php

class CategoriasRepository
{
    public static function all()
    {
        $categorias = self::new();
        return $categorias->select();
    }

    public static function find($id)
    {
        $categoria = self::new();
        return $categoria->select(
            "id,categoria",
            [
                "where" => "id=:id",
                "replaces" => [":id" => $id],
            ],
            true
        );
    }

    public static function new()
    {
        return new CategoriasModel();
    }

    public static function set($categoria, $post)
    {
        $categoria->setCategoria($post["categoria"]);
        is_null($categoria->getId())
            ? $categoria->insert()
            : $categoria->update($id);
    }

    public static function delete($categoria)
    {
        $categoria->delete();
    }
}
