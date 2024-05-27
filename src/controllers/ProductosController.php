<?php

//namespace App\Controllers;

class ProductosController
{
    public static function list()
    {
        return [
            'view' => '/productos/listado.php'
        ];
    }
    public static function alta()
    {
        return [
            'view' => '/productos/form.php',
            'titulo' => 'Alta de producto',
            'boton' => 'Agregar producto'
        ];
    }
    public static function edit()
    {
        return [
            'view' => '/productos/form.php',
            'titulo' => 'Actualizar producto',
            'boton' => 'Actualizar producto'
        ];
    }
    public static function delete()
    {
        echo "Eliminando producto con id";
    }
}
