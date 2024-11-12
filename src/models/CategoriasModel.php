<?php
//namespace App\Models;
class CategoriasModel extends EntityModel
{
    private int $id;
    private string $categoria;
    protected $tbl = "categorias";

    public function getId()
    {
        return $this->id;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }
}
