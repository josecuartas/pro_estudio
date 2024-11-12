<?php
//namespace App\Models;
class ProductosModel extends EntityModel
{
    private int $id;
    private string $nombre;
    private string $estado;
    private string $fecha_alta;
    protected $tbl = "productos";

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getFechaAlta()
    {
        return $this->fecha_alta;
    }
}
