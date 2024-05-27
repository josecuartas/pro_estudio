<?php

//namespace App\Controllers;

class CategoriasController
{
    /* métodos que me ofrece categorías */
    public static function list()
    {
        $categoria = new CategoriasModel;
        $cat_list = ($categoria->all());
        return [
            'view' => '/categorias/listado.php',
            'categorias' => $cat_list
        ];
    }
    public static function alta()
    {
        return [
            'view' => '/categorias/form.php'
        ];
    }
    public static function edit()
    {
        return ['view' => '/categorias/form.php'];
    }
    public static function delete()
    {
        // echo "Eliminando categoria con id $id";
        echo "Eliminando categoria con id";
        die();
    }
}
